<?php
include_once "layout/header.php"; 

        $product_quantity=$_POST['qty'];
        $product_id=$_POST['id'];
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['productId']=== $product_id)
            {
                //unset($_SESSION['cart'][$key]);
                $_SESSION['cart'][$key]=array('productId' => $product_id ,
                'productName' => $value['productName'],
                'productPrice' => $value['productPrice'],
                'productQty' => $product_quantity);
                                              
            }
        }
?>