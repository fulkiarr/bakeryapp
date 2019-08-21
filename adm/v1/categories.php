<?php 
require_once("../../config/auth.php"); 
require("../../config/Connection.php");
if(isset($_POST['simpan']))
{
  $conn = new Connection();
    
  $sql = "insert into categories(category_name) values('".$_POST['category_name']."')";
  $query = mysqli_query($conn->getconnect(), $sql);

  if($query){
    $msg = "Berhasil menyimpan data";
    header("Location: categories.php?message=".$msg);
  }else{
    $msg = "Gagal menyimpan data";
    header("Location: categories.php?message=".$msg);
  }
}

if(isset($_POST['update']))
{
    $conn = new Connection();
    $sql = "update categories set category_name='".$_POST['category_name']."' where id = '".$_POST['id']."'";
    $query = mysqli_query($conn->getconnect(), $sql);

    if($query){
      $msg = "Berhasil mengupdate data";
      header("Location: categories.php?message=".$msg);
    }else{
      $msg = "Gagal mengupdate data";
      header("Location: categories.php?message=".$msg);
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
            Categories
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
          <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#addcategory"><i class="fa fa-plus" aria-hidden="true"></i> Add Categories</button>
          <a href="categories.php" class="btn btn-sm btn-secondary float-right mr-2"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh Cache</a>
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
                data-url="json/categoriesapi.php"
                data-pagination="true">
                <thead>
                    <tr>
                    <th data-field="id" data-visible="false" data-sortable="true" data-sort-name="id" data-sort-order="desc">ID</th>
                    <th data-field="category_name">Categories Name</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="category_name" class="form-control form-control-sm" placeholder="Category name">
                <small class="form-text text-muted">Category name should 10 - 40 character.</small>
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
                <label>Category Name</label>
                <input type="text" name="category_name" class="form-control form-control-sm" placeholder="Category name">
                <small class="form-text text-muted">Category name should 10 - 40 character.</small>
                <input type="hidden" name="id">
</div>
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
        '<a class="edit" href="#editcategory" data-toggle="modal" category_name="'+row.category_name+'" id_cat="'+row.id+'" title="Edit" style="margin-right:10px;">',
        '<i class="fa fa-pencil"></i>',
        '</a>  ',
        '<a class="remove" href="action/deletecategories.php?id='+row.id+'" title="Remove">',
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
  // get information to update quickly to modal view as loading begins
  var opener=e.relatedTarget;//this holds the element who called the modal
   
   //we get details from attributes
  var catname=$(opener).attr('category_name');
  var id=$(opener).attr('id_cat');

//set what we got to our form
  $('#editform').find('[name="category_name"]').val(catname);
  $('#editform').find('[name="id"]').val(id);
});
</script>
</body>
</html>

