<?php
require_once("../../../config/auth.php");
require "../../../config/Connection.php";
$id = $_GET['ordernumber'];

$conn = new Connection();
$query = mysqli_query($conn->getconnect(), "DELETE FROM transaction WHERE order_number = $id");
if($query){
    $msg = "Berhasil menghapus data";
    header("Location: ../transaksilist.php?message=".$msg);
  }else{
    $msg = "Gagal menghapus data";
    header("Location: ../transaksilist.php?message=".$msg);
  }
?>