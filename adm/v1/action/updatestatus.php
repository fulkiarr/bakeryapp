<?php
require_once("../../../config/auth.php");
require "../../../config/Connection.php";
$id = $_GET['ordernumber'];

$conn = new Connection();
$query = mysqli_query($conn->getconnect(), "UPDATE transaction set status = 1 WHERE order_number = $id");
if($query){
    $msg = "Berhasil merubah data";
    header("Location: ../dashboard.php?message=".$msg);
  }else{
    $msg = "Gagal merubah data";
    header("Location: ../dashboard.php?message=".$msg);
  }
?>