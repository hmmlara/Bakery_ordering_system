<?php
session_start();
$id = $_GET['id'];
$_SESSION['cart']++;
echo "added";
header("location: index.php");

?>