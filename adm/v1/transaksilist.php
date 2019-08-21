<?php 
require_once("../../config/auth.php"); 
require("../../config/Connection.php");
if(isset($_POST['simpan']))
{
  $conn = new Connection();
    
  $sql = "insert into product(product_name, product_price,product_detail,category_id) values('".$_POST['product_name']."', '".$_POST['product_price']."', '".$_POST['product_detail']."' ,'".$_POST['category_id']."')";
  $query = mysqli_query($conn->getconnect(), $sql);

  if($query){
    $msg = "Berhasil menyimpan data";
    header("Location: product.php?message=".$msg);
  }else{
    $msg = "Gagal menyimpan data";
    header("Location: product.php?message=".$msg);
  }
}

if(isset($_POST['update']))
{
    $conn = new Connection();
    $sql = "update product set product_name='".$_POST['product_name']."', product_price='".$_POST['product_price']."', product_detail = '".$_POST['product_detail']."', category_id = '".$_POST['category_id']."' where id = '".$_POST['id']."'";
    $query = mysqli_query($conn->getconnect(), $sql);

    if($query){
      $msg = "Berhasil mengupdate data";
      header("Location: product.php?message=".$msg);
    }else{
      $msg = "Gagal mengupdate data";
      header("Location: product.php?message=".$msg);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - BakeryKing</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/offcanvas.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap-table.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand mr-auto mr-lg-0" href="#">BakeryKing</a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline navbar-nav my-2 my-lg-0">
        <a class="nav-link">Welcome : <?php echo $_SESSION['user'] ?></a>
    </form>
  </div>
</nav>

<?php
require("../../partials/header.php");
?>

<main role="main" class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-12">
        <h3>
            Product
        </h3>
        <hr>
        </div>
    </div>
    <div class="row">
      <div class="col-md-8 offset-md-2">
    <?php
    if( !empty( $_REQUEST['message'] ) )
    {
        echo '<div class="alert alert-dark alert-dismissible fade show" role="alert">'.$_REQUEST['message'].'.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>';
    }
    ?>
    </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2 pb-3"><a href="transaksilist.php" class="btn btn-sm btn-secondary float-right mr-2"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh Cache</a>
        </div>
        <div class="col-md-8 offset-md-2">
            <table
              id="table"
              data-toggle="table"
                    data-search="true"
                                            data-search-align="left"
                                            data-pagination="true"
                                            data-id-field="date_start"
                                            data-show-export="true"
                                            data-show-columns="true"
                                            trimOnSearch="false"
                                            data-auto-refresh="true"
                                            data-export-data-type="all"
                                            data-buttons-align="left"
                                            data-toolbar-align="left"
                                            data-page-size=5
                                            data-page-list="[5, 10, 20, 25, 50, 100, 200, 300]"
                data-url="json/transaksiapi.php"
                data-pagination="true" style="font-size:12px;">
                <thead>
                    <tr>
                    <th data-field="order_number" data-sortable="true">Order Number</th>
                    <th data-field="order_detail">Order Detail</th>
                    <th data-field="total_price">Total pembelanjaan</th>
                    <th data-field="order_time">Category Product</th>
                    <th data-field="status" data-formatter="operateFormatter" data-events="eventTable" data-align="center">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</main>



<script src="../../assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="../../assets/js/offcanvas.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/bootstrap-table.min.js"></script>
<script>
function operateFormatter(value, row, index) {

    if(row.status == "0"){
    return [
            '<a class="remove badge badge-danger" href="action/deletetransaksi.php?ordernumber='+row.order_number+'" title="Remove">',
            '<i class="fa fa-trash"></i> Hapus</a>',
            ].join('')
        }else{
            return [
            '<span class="badge badge-success">Order Success</span>',
            ].join('')
        }
    
}

window.eventTable = {
        'click .edit': function (e, value, row, index) {
        },
        'click .remove': function (e, value, row, index) {

        }
      }
</script>
</body>
</html>

