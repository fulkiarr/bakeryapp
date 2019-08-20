<?php 
session_start();

//cek apakah session terdaftar
if($_SESSION['user']){

//session terdaftar, saatnya logout
session_unset();
session_destroy();

header("Location: login.php");
}