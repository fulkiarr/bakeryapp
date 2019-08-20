<div class="nav-scroller bg-white shadow-sm">
  <nav class="nav nav-underline">
  <?php
  if($_SERVER['REQUEST_URI'] == "/bakeryweb/adm/v1/dashboard.php"){
    echo '<a class="nav-link active" href="#"><i class="fa fa-dashboard"></i> Dashboard</a>
    <a class="nav-link" href="product.php"><i class="fa fa-cubes"></i> Product</a>
    <a class="nav-link" href="categories.php"><i class="fa fa-glass" aria-hidden="true"></i> Categories</a>
    <a class="nav-link" href="transaksilist.php"><i class="fa fa-calculator" aria-hidden="true"></i> Transaction History</a>
    <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>';
    }elseif($_SERVER['REQUEST_URI'] == "/bakeryweb/adm/v1/categories.php"){
    echo '<a class="nav-link" href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
    <a class="nav-link" href="product.php"><i class="fa fa-cubes"></i> Product</a>
    <a class="nav-link active" href="#"><i class="fa fa-glass" aria-hidden="true"></i> Categories</a>
    <a class="nav-link" href="transaksilist.php"><i class="fa fa-calculator" aria-hidden="true"></i> Transaction History</a>
    <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>';
    }elseif($_SERVER['REQUEST_URI'] == "/bakeryweb/adm/v1/product.php"){
    echo '<a class="nav-link" href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
    <a class="nav-link active" href="#"><i class="fa fa-cubes"></i> Product</a>
    <a class="nav-link" href="categories.php"><i class="fa fa-glass" aria-hidden="true"></i> Categories</a>
    <a class="nav-link" href="transaksilist.php"><i class="fa fa-calculator" aria-hidden="true"></i> Transaction History</a>
    <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>';
    }elseif($_SERVER['REQUEST_URI'] == "/bakeryweb/adm/v1/transaksilist.php"){
    echo '<a class="nav-link" href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
    <a class="nav-link active" href="product.php"><i class="fa fa-cubes"></i> Product</a>
    <a class="nav-link" href="categories.php"><i class="fa fa-glass" aria-hidden="true"></i> Categories</a>
    <a class="nav-link" href="#"><i class="fa fa-calculator" aria-hidden="true"></i> Transaction History</a>
    <a class="nav-link" href="logout.php"><i class="fa fa-door-open" aria-hidden="true"></i> Log out</a>';
    }else{
        echo '<a class="nav-link" href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
        <a class="nav-link" href="product.php"><i class="fa fa-cubes"></i> Product</a>
        <a class="nav-link" href="categories.php"><i class="fa fa-glass" aria-hidden="true"></i> Categories</a>
        <a class="nav-link" href="transaksilist.php"><i class="fa fa-calculator" aria-hidden="true"></i> Transaction History</a>
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>'; 
    }
    ?>
  </nav>
</div>