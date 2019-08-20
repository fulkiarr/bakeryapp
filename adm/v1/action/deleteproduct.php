<?php
require_once("../../../config/auth.php");
require "../../../config/Connection.php";
$id = $_GET['id'];

$conn = new Connection();
$query = mysqli_query($conn->getconnect(), "DELETE FROM product WHERE id = $id");
if($query){
    $msg = "Berhasil menghapus data";
    header("Location: ../product.php?message=".$msg);
  }else{
    $msg = "Gagal menghapus data";
    header("Location: ../product.php?message=".$msg);
  }
?>