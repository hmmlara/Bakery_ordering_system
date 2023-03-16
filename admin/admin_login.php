<?php
ob_start();
session_start();
include_once __DIR__."/../controller/admin_controller.php";

$adminController=new AdminController();
$admins=$adminController->getAdmins();

//var_dump($admins);
$username=$admins[0]["username"];
$password=$admins[0]["password"];

if(isset($_GET["ok"]))
{
    if($_GET['username']==$username && md5(trim($_GET['password']))==$password)
    {
        //header("location:admin_template.php");
        $_SESSION['user'] = ['username' => $username];
        header('location:admin_template.php');
    }
    else
    {
        header('location:index.php');
    }
    
}

?>