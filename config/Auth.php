<?php

session_start();
if(!isset($_SESSION["user"])) header("Location: /bakeryweb/adm/v1/login.php");