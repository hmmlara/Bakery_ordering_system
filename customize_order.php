<?php
ob_start();
include_once "layout/header.php";

include_once "controller/ingredients_controller.php";
include_once "controller/product_controller.php";
$ingredientController=new IngredientController();
$productController=new ProductController();

// include_once "controller/user_controller.php";
// $email=$_SESSION['customer']['email'];
// $userController=new UserController($email);
// $customer_id=$userController->getCustomerId($email);
//var_dump( $customer_id);

   // echo ($_GET['cart_item']);
   // echo ($_GET['cream']);
   // echo ($_GET['size']);
   // echo ($_GET['doll']);
   // echo ($_GET['discription']);

   $cream=$_GET['cream'];
   $size=$_GET['size'];
   $doll=$_GET['doll'];
   $discription=$_GET['discription'];
   $product_id=$_GET['cart_item'];
   $quantity=$_GET['quantity'];
   $customize_data=[$cream,$size,$doll,$discription,$product_id];
   array_push($_SESSION["customize"],$customize_data) ;
   $allCustomizeData=$_SESSION["customize"];

   $product_name=$productController->getProductName($product_id);
   //var_dump($product_name);
   $name=$product_name['name'];
   $price=$product_name['price'];

   echo $product_id;

      $cream_price=$ingredientController->getCreamPrice($cream);
      var_dump( $cream_price);
      echo $cream_price[0]['price'];

      $doll_price=$ingredientController->getDollPrice($doll);
      var_dump( $doll_price);
      echo $doll_price[0]['price'];

      $size_price=$ingredientController->getSizePrice($size);
      var_dump( $size_price);
      echo $size_price[0]['price'];

      $total_price=$price+$cream_price[0]['price']+$doll_price[0]['price']+$size_price[0]['price'];
      echo $total_price;
      echo "</br>";

      $_SESSION['cart'][]=array('productId' => $product_id ,
                            'productName' => $name,
                            'productPrice' => $total_price,
                            'productQty' => $quantity);

                            
   
   echo "<pre>";
      var_dump ($_SESSION['cart']);
   echo "</pre>";

   
   header("location:shoping-cart.php");
   
   
   echo "<pre>";
      var_dump ($_SESSION['customize']);
   echo "</pre>";
   
?>