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
        <div class="col-md-8 offset-md-2 pb-3">
          <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#addcategory"><i class="fa fa-plus" aria-hidden="true"></i> Add Product</button>
          <a href="product.php" class="btn btn-sm btn-secondary float-right mr-2"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh Cache</a>
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
                                            data-page-size=10
                                            data-page-list="[5, 10, 20, 25, 50, 100, 200, 300]"
                data-url="json/productapi.php"
                data-pagination="true">
                <thead>
                    <tr>
                    <th data-field="id" data-visible="false" data-sortable="true" data-sort-name="id" data-sort-order="desc">ID</th>
                    <th data-field="product_name" data-sortable="true">Product Name</th>
                    <th data-field="product_price">Product Price</th>
                    <th data-field="product_detail">Product Detail</th>
                    <th data-field="category_id" data-visible="false">Category ID</th>
                    <th data-field="category_name">Category Product</th>
                    <th data-field="operate" data-formatter="operateFormatter" data-events="eventTable" data-align="center">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</main>

<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
              <div class="form-group">
                <label>Product Name*</label>
                <input type="text" name="product_name" class="form-control form-control-sm" placeholder="Product name" required>
                <small class="form-text text-muted">Product name should 10 - 40 character.</small>
              </div>
              <div class="form-group">
                <label>Category Product*</label>
                <select class="form-control form-control-sm" name="category_id" required> 
                    <option value="">Pilih category product</option>
                    <?php
                        $conn = new Connection();
                        $sql = "select * from categories";
                        $result = mysqli_query($conn->getconnect(), $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<option value="'.$row["id"].'">'.$row["category_name"].'</option>';
                        }
                    ?>
                </select>
              </div>
              <div class="form-group">
                <label>Product Price*</label>
                <input type="number" name="product_price" class="form-control form-control-sm" placeholder="Product price" min="0" required>
                <small class="form-text text-muted">In Rupiah</small>
              </div>
              <div class="form-group">
                <label>Product Detail*</label>
                  <textarea class="form-control" name="product_detail" id="" rows="3" required></textarea>
              </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="simpan">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editcategory" tabindex="-1" role="dialog"aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" id="editform" method="POST">
      <div class="modal-body">
      <div class="form-group">
                <label>Product Name*</label>
                <input type="text" name="product_name" class="form-control form-control-sm" placeholder="Product name" required>
                <small class="form-text text-muted">Product name should 10 - 40 character.</small>
              </div>
              <div class="form-group">
                <label>Category Product*</label>
                <select class="form-control form-control-sm" name="category_id" required> 
                    <option value="">Pilih category product</option>
                    <?php
                        $conn = new Connection();
                        $sql = "select * from categories";
                        $result = mysqli_query($conn->getconnect(), $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<option value="'.$row["id"].'">'.$row["category_name"].'</option>';
                        }
                    ?>
                </select>
              </div>
              <div class="form-group">
                <label>Product Price*</label>
                <input type="number" name="product_price" class="form-control form-control-sm" placeholder="Product price" min="0" required>
                <small class="form-text text-muted">In Rupiah</small>
              </div>
              <div class="form-group">
                <label>Product Detail*</label>
                  <textarea class="form-control" name="product_detail" id="" rows="3"></textarea>
              </div>
              <input type="hidden" name="id">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="update">Update changes</button>
      </div>
      </form>
    </div>
  </div>
</div>



<script src="../../assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="../../assets/js/offcanvas.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/bootstrap-table.min.js"></script>
<script>
function operateFormatter(value, row, index) {
    return [
        '<a class="edit" href="#editcategory" data-toggle="modal" product_name="'+row.product_name+'" prod_detail="'+row.product_detail+'" id_prod="'+row.id+'" id_cat="'+row.category_id+'" prod_price="'+row.product_price+'" title="Edit" style="margin-right:10px;">',
        '<i class="fa fa-pencil"></i>',
        '</a>  ',
        '<a class="remove" href="action/deleteproduct.php?id='+row.id+'" title="Remove">',
        '<i class="fa fa-trash"></i>',
        '</a>'
    ].join('')
}

window.eventTable = {
        'click .edit': function (e, value, row, index) {
        },
        'click .remove': function (e, value, row, index) {

        }
      }

  $('#editcategory').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;
   
  var prodname=$(opener).attr('product_name');
  var id=$(opener).attr('id_prod');
  var id_cat = $(opener).attr('id_cat');
  var prodprice = $(opener).attr('prod_price');
  var proddetail = $(opener).attr('prod_detail');

  $('#editform').find('[name="product_name"]').val(prodname);
  $('#editform').find('[name="product_price"]').val(prodprice);
  $('#editform').find('[name="product_detail"]').val(proddetail);
  $('#editform').find('[name="id"]').val(id);
  $('#editform').find('[name="category_id"]').val(id_cat);
});
</script>
</body>
</html>

