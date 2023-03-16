<?php
session_start();
unset( $_SESSION['customer']);
unset( $_SESSION['cart'] );
unset( $_SESSION['product'] );
unset( $_SESSION['customize']);
header('location:index.php');
?>