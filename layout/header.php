<?php
ob_start();
session_start();

include_once "controller/user_controller.php";
$userController=new userController();


if(!isset($_SESSION['auth_user'])){
    $_SESSION['auth_user'] = [];
}
// echo $db_session;;
if(count($_SESSION['auth_user']) > 0){
    $db_session = $userController->getSessionId($_SESSION['auth_user']['id']);
    if($db_session != $_SESSION['auth_user']['_token']){
        session_destroy();
        // echo 'hello';
        header('location:user_logout.php');
    }
}


    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"] = array();
    }
    if(isset($_GET["cart_item"])){
        //array_push($_SESSION["cart"],$_GET["cart_item"]);
    }

    // if(!isset($_SESSION['product'])){
    //     $_SESSION['product']=array();
    //    }

    if(!isset($_SESSION['customize'])){
        $_SESSION['customize']=array();
    }

    if(isset($_SESSION['customer']))
    {
        $email=$_SESSION['customer']['email'];
        $result=$userController->getUser($email);
        //var_dump($result);
    }

    if(!isset($_SESSION['count'])){
        $_SESSION['count']=0;
    }
    
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <link rel="icon" href="img/logo.webp" type="image/png" sizes="16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Bakery</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__cart">

            <div class="offcanvas__cart__links">
                <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                <img src="img/icon/heart.png" alt="">
            </div>

            <div class="offcanvas__cart__item">
                <a href="shopping-cart.php"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
                <div class="cart__price">Cart: <span>$0.00</span></div>
            </div>
        </div>

        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>

        <div id="mobile-menu-wrap"></div>
        <!-- <div class="offcanvas__option">
            <ul>
                <li>USD <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>EUR</li>
                        <li>USD</li>
                    </ul>
                </li>
                <li>ENG <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>Spanish</li>
                        <li>ENG</li>
                    </ul>
                </li>
                <li><a href="shop.php">Sign in</a> </li>
            </ul>
        </div> -->
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">
                             <div class="header__top__left">
                                <ul>
                                 
                                    <li><a href="user_login_form.php">SignIn</a> <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li><a href="user_login_form.php">SignIn</a> <span class="arrow_carrot-down"></span></li>
                                            <li><a href="user_signup_form.php">SignUp</a> <span class="arrow_carrot-down"></span></li>
                                            <li><a href="user_logout.php">SignOut</a> <span class="arrow_carrot-down"></span></li>
                                        </ul>
                                    </li>

                                    <?php
                                    if(isset($_SESSION['customer'])) 
                                    {
                                        echo '<button class="btn btn-light">';
                                        echo '<a href="customer_profile.php">';
                                        echo (' '.$result[0]['name']);
                                        echo '</a></button>';
                                    }
                                    ?>

                                </ul> 
                            </div>
                            <div class="header__logo">
                                <a href="./index.php"><img src="img/logo.png" alt=""></a>
                            </div>
                            <div class="header__top__right">
                                <!-- <div class="header__top__right__links">
                                    <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                                    <a href="#"><img src="img/icon/heart.png" alt=""></a>
                                </div> -->
                                <div class="header__top__right__cart">
                                    <a href="shoping-cart.php"><img src="img/icon/cart.png" alt="">
                                        <span>
                                            
                                            <?php
                                                echo "<pre>";
                                                echo count($_SESSION["cart"]);
                                                echo "</pre>";                
                                            ?>

                                        </span>
                                    </a>
                                    <!-- <div class="cart__price">Cart: <span>$0.00</span></div> -->
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <?php
                         $active=$_SERVER["PHP_SELF"];
                        //    var_dump($active);
                        ?>
                        <ul>
                            <li class="<?php  echo ($active == '/bakery_online_store/index.php')? 'active':''; ?>"><a href="./index.php">Home</a></li>
                            <li class="<?php echo ($active == '/bakery_online_store/about.php')? 'active':''; ?>"><a href='./about.php'>About</a></li>
                            <li class="<?php echo ($active == '/bakery_online_store/shop.php' ? 'active' :'') ?>"><a href="./shop.php">Shop</a></li>
                            <li class="<?php echo ($active == '/bakery_online_store/customize.php' ? 'active' :'') ?>"><a href="./customize.php">Customize</a></li>
                            <!-- <li class="<?php echo ($active == '/bakery_online_store/shop-detials.php'?'active':'') ?>"><a href="./shop-details.php">Shop Details</a></li> -->
                            <li class="<?php  echo($active == '/bakery_online_store/shoping-cart.php'?'active':'')  ?>"><a href="./shoping-cart.php">Shoping Cart</a></li>
                            <li class="<?php echo($active == '/bakery_online_store/contact.php')?'active':''  ?>"><a href="./contact.php">Contact</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->