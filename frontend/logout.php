<?php
include('db.php');
unset($_SESSION["ADMINLOGIN"]);
header("Location:login.php");
die();
?>