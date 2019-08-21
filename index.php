<?php
require "config/Connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Order Makanan - BakeryKing</title>

	<link rel="stylesheet" href="assets/css/linearicons.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">							
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/jquery-ui.css">	
	<link rel="stylesheet" href="assets/css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
</head>
<style>
	.popupbutton {
		position: fixed;
        bottom: 0;
        right: 0;
        z-index:9999;
	}
    .content {
        position: fixed;
        bottom: 0;
        right: 0;
        width:450px;
        height:700px;
        background-color:white;
        z-index:9999;
        border: 1px solid rgba(0,0,0, 0.1);
        overflow:scroll;
    }

    .headmenu {
        height:30px;
        border-bottom:1px solid rgba(0,0,0, 0.1);
        padding: 0px 10px;
    }

    .headmenu .labels {
        float:left;
        font-weight:bold;
        padding-top:3px;
    }
    .headmenu .tools {
        float:right;
        padding-top:3px;
    }

    .menus {
        padding: 20px 20px;
        font-size:12px;
    }

    .menus .form-control {
        font-size:14px !important;
    }
</style>
<body>
	<button id="popupshow" class="popupbutton btn btn-success" onclick="showcontents()" style="display:none">Form Pemesanan</button>
    <div class="content" id="contents" style="display:block">
            <div class="headmenu">
                <div class="labels">
                    Form Pemesanan
                </div>
                <div class="tools" onclick="btnminimize()" id="minimize">
                    <i class="fa fa-close"></i>
                </div>
            </div>
            <div class="menus">
				<form action="simpanorder.php" method="POST">
                <div class="form-group">
                        <label class="font-weight-bold">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="customer" placeholder="Masukkan nama anda.." required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Nomor Telpon</label>
                        <input type="tel" class="form-control" name="phonenumber" placeholder="Masukkan nomor telpon anda.." required>
                    </div>

                <h3 class="pt-3">Pesanan Anda</h3>
                    <div class="row pt-3">
                        <div class="col-md-6 font-weight-bold">
                                Nama pesanan
                        </div>
                        <div class="col-md-2 font-weight-bold">
                                Qty
                        </div>
                        <div class="col-md-4 font-weight-bold">
                                Harga Satuan
                        </div>
                    </div>
								<div id="content">
					</div>
					<div class="row pt-3">
					<div class="col-md-4 font-weight-bold">
                                <button type="button" onclick="kalkulasi()" class="col-md-12 btn btn-secondary btn-sm">Kalkulasi</button>
                        </div>
                        <div class="col-md-2 offset-md-2 font-weight-bold">
							Total
                        </div>
                        <div class="col-md-4 font-weight-bold">
                                <input type="text" class="col-md-12" id="total" name="total" value="" readonly>
                        </div>
					</div>
                    <div class="row pt-3">
                        <div class="col-md-12">
                            <input type="submit" name="submit" value="Pesan" class="btn btn-success col-md-12">
                        </div>
                    </div>
				</div>
				</form>
    </div>
			<section class="banner-area relative about-banner" id="home" style="background-repeat:no-repeat;background-size:cover;">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12" style="margin-top:80px !important;margin-bottom:80px;">
							<h1 class="text-white">
								Welcome to BakeryKing				
							</h1>	
						</div>	
					</div>
				</div>
			</section>
			<input type="hidden" id="totalclick" value="0">
			<!-- End banner Area -->	

			<!-- Start menu-list Area -->
			<section class="menu-list-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center mb-5">
							<h2>Menu</h2>
						</div>
					</div>
					<div id="pills-tabContent" class="tab-content absolute">
						<div class="tab-pane fade show active" id="pizza" role="tabpanel">
								<?php
									$conn = new Connection();
									$sql = "select product.id, product.product_name,product.product_price, product.category_id,product.product_detail, categories.category_name from product left join categories on product.category_id = categories.id";
									$query = mysqli_query($conn->getconnect(), $sql);
									$getrow = mysqli_num_rows($query);
									$keys = 0;
									while($row = mysqli_fetch_assoc($query)){
										$keys++;
										echo '
										<div class="single-menu-list row justify-content-between align-items-center"><div class="col-lg-6">
										<a href="#"><h4>'.$row["product_name"].'</h4></a>

										<input type="hidden" id="productname'.$keys.'" value="'.$row['product_name'].'">
										<p>
										'.$row["product_detail"].'.
										</p>
									</div>
									<div class="col-lg-6 flex-row d-flex price-size">
										<div class="s-price col">
											<h4>Jenis</h4>
											<span>'.$row["category_name"].'</span>
										</div>		
										<div class="s-price col">
											<h4>Harga</h4>
											<span>Rp. '.$row["product_price"].'</span>
											<input type="hidden" id="productprice'.$keys.'" value="'.$row['product_price'].'">
										</div>
										<div class="s-price col">
												<span><button class="btn btn-secondary mt-3" type="button" onclick="reserve(this.id)" id="'.$keys.'"> Pesan</button></span>
										</div>															
									</div>
									</div>';
									}
								?>
                </div>	
            </section>
		    <!-- End menu-list Area -->						
			<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="assets/js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
			<script src="assets/js/easing.min.js"></script>			
			<script src="assets/js/hoverIntent.js"></script>
			<script src="assets/js/superfish.min.js"></script>	
			<script src="assets/js/jquery.magnific-popup.min.js"></script>	
			<script src="assets/js/jquery-ui.js"></script>							
			<script src="assets/js/jquery.nice-select.min.js"></script>		
			<script src="assets/js/main.js"></script>	

    <script>

		function reserve(id) {
		const div = document.createElement('div');
		div.className = "row pt-3";
		buttonclicked= true;
		var getcat = $("#productname"+id).val();
		var getprice = $("#productprice"+id).val();	
		var click = $('#totalclick').val();
		var countid = parseInt(click) + 1;
		div.innerHTML = '<div class="col-md-6 font-weight-bold"><input type="text" class="col-md-12" name="productname[]" value="'+getcat+'" readonly></div><div class="col-md-2 font-weight-bold"><input type="number" name="qty[]" id="qty'+countid+'" value="0" min="0" max="20"></div><div class="col-md-4 font-weight-bold"><input type="text" class="col-md-12" name="price[]" id="price'+countid+'" value="'+getprice+'" disabled></div>';
		$('#totalclick').val(parseInt(click)+1);
		$('#'+id).prop('disabled', true);
		document.getElementById('content').appendChild(div);
		}

		function kalkulasi()
		{
			var click = $('#totalclick').val();
			var indent = 0;
			var gettotal = 0;
			while(indent < parseInt(click) + 1){
				indent++;
				console.log(indent);
				if(indent !== parseInt(click) + 1){
				var getqty = $('#qty'+indent).val();
				var getprice = $('#price'+indent).val();
				gets = parseInt(getqty) * parseInt(getprice);
				console.log(parseInt(getqty) + " " +parseInt(getprice));
				gettotal += gets;
				}
			}
			$('#total').val(gettotal);
		}
		
		function btnminimize()
		{
			$('#contents').css('display', 'none');	
			$('#popupshow').css('display', 'block');
		}

		function showcontents()
		{
			$('#contents').css('display', 'block');	
			$('#popupshow').css('display', 'none');
		}
    </script>
</body>
</html>