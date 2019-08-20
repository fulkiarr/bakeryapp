<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once('../../partials/admincss.php');
    ?>
</head>
<body class="text-center" data-gr-c-s-loaded="true">

<form class="form-signin" method="POST" action="">
<?php

require "../../config/Connection.php";
  if(isset($_POST['login'])){
    $conn = new Connection();
    
    $sql = "select * from users where username ='".$_POST['username']."' and password = '".md5($_POST['password'])."'";
    $result = mysqli_query($conn->getconnect(), $sql);
    $row = mysqli_fetch_assoc($result);

    if($row !== null){
      session_start();
      $_SESSION["user"] = $row['fullname'];
      header("Location: dashboard.php");
    }else{
      echo '<div class="alert alert-danger" role="alert">
      Data tidak ditemukan!
    </div>';
    }
  }
?>
  <img class="mb-4" src="../../assets/img/login.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputUsername" class="sr-only">Email address</label>
  <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" class="form-control" placeholder="Password" required>
  <input type="submit" class="btn btn-lg btn-primary btn-block" name="login" value="Sign in">
  <p class="mt-5 mb-3 text-muted">&copy; 2017-<?php echo date("Y"); ?></p>
</form>
</body>
</html>