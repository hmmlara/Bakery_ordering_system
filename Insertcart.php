
<?php
ob_start();

include_once "layout/header.php";
if(isset($_POST['addCart']))
{
    if(!isset($_SESSION["customer"])){
        header('location:user_login_form.php');
    }
    else
{
    $product_id=$_POST['Pindex'];   
    $product_name=$_POST['Pname'];
    $product_quantity=$_POST['Pquantity'];
    $product_price=$_POST['Pprice'];

    $check_product=array_column($_SESSION['cart'],'productName');
    if(in_array($product_name,$check_product))
    {
        header('location:shop.php');
    }
    else{

        $_SESSION['cart'][]=array('productId' => $product_id ,
                            'productName' => $product_name,
                            'productPrice' => $product_price,
                            'productQty' => $product_quantity);
                            
    var_dump($_SESSION['cart']);
        header("location:shop.php");

    }

}
}
   
//    $_SESSION['cart'][]=array('productId' => $product_id ,
//                             'productName' => $product_name,
//                             'productPrice' => $product_price,
//                             'productQty' => $product_quantity);
//     header("location:shop.php");                        


//remove product

    if(isset($_POST['remove']))
    {
        $_SESSION['count']+=1;
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['productId']=== $_POST['item'])
            {
                unset($_SESSION['cart'][$key]);
                //$_SESSION['cart']=array_values($_SESSION['cart']);
                //header('location:shoping-cart.php');
            }
        }
        header('location:shoping-cart.php');

    }

    // if(isset($_POST['update']))
    // {
    //     $product_id=$_POST['Pindex'];
    //     $product_name=$_POST['Pname'];
    //     $product_quantity=$_POST['Pquantity'];
    //     $product_price=$_POST['Pprice'];
    //     foreach($_SESSION['cart'] as $key=>$value)
    //     {
    //         if($value['productId']=== $_POST['item'])
    //         {
    //             //unset($_SESSION['cart'][$key]);
    //             $_SESSION['cart'][$key]=array('productId' => $product_id ,
    //                                           'productName' => $product_name,
    //                                           'productPrice' => $product_price,
    //                                           'productQty' => $product_quantity);
    //             header("location:shoping-cart.php");
    //         }
    //     }
    // }


// echo "<pre>";
// var_dump( $_SESSION['cart']);
// echo "</pre>";
?>