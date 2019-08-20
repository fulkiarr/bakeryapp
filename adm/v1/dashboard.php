<?php 
require_once("../../config/auth.php"); 
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
    <link rel="stylesheet" href="../../assets/css/bootstrap-table.css">
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
        <a href="logout.php" class="nav-link">Welcome : <?php echo $_SESSION['user'] ?></a>
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
            Order Transaction
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
    <div class="col-md-10 offset-md-2 pb-3">
         <a href="dashboard.php" class="btn btn-sm btn-secondary float-right mr-2"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh Cache</a>
        </div>
        <div class="col-md-12">
            <table style="font-size:15px;"
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
                data-url="json/transaksiapiqueue.php"
                data-pagination="true">
                <thead>
                    <tr>
                    <th data-field="order_number">Order number</th>
                    <th data-field="order_detail">Detail</th>
                    <th data-field="operate" data-formatter="operateFormatter" data-events="eventTable" data-align="center">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</main>
<script src="../../assets/js/offcanvas.js"></script>
<script src="../../assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="../../assets/js/bootstrap-table.min.js"></script>
<script>
function operateFormatter(value, row, index) {
    return [
        '<a class="edit btn btn-warning" href="action/updatestatus.php?ordernumber='+row.order_number+'">',
        'Selesai</a> ',
    ].join('')
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

