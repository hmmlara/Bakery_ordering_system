<?php
ob_start();

include_once "layout/header.php";
include_once "controller/ingredients_controller.php";
include_once "controller/product_controller.php";
include_once "controller/category_controller.php";

$ingredientController=new IngredientController();
$creams=$ingredientController->getCreams();
$dolls=$ingredientController->getDolls();
$sizes=$ingredientController->getSizes();

$productController=new ProductController();
$images=$productController->getProducts();

if(!isset($_POST['product_id']))
{
    header('location:customize.php');
}
$item=$_POST['product_id'];
$productController=new ProductController();
$product=$productController->getProductData($item);
//var_dump($product);

$category_id=$product['category_id'];
$categoryController=new CategoryController();
$category=$categoryController->getCategoryName($category_id);
//echo($category[0]['name']);

$email=$_SESSION['customer']['email'];
$userController=new userController();
$result=$userController->getUser($email);

?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Customize Order</h2>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>  Customize </span>
                        
                    </div>
                </div>
            </div>          
                    
            </div>    

        </div>
            

    </div>
    <!-- Breadcrumb End -->



<div class="mt-5">

</div>
    <!-- Shop Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__img">
                        <div class="product__details__big__img">
                            <?php
                            echo "<img class='big_img' src='admin/uploads/".$product['image']."' alt=''>"
                            ?>
                        </div>                        
                    </div>
                </div>

                <div class="col-lg-6">
                <form action="customize_order.php" method="get" class="">
                    <div class="product__details__text">
                        <?php
                        echo '<div class="product__label">'.$category[0]['name'].'</div>
                        <h4>'.$product['name'].'</h4>
                        <h6>The price will be changed depending on your choices!</h6>
                        <h5 class="mt-3">Base Cake Price  :  '.$product['price'].' MMK</h5>';
                        ?>
                        <ul>
                            <li>
                                <div>
                                    <select name="cream" id="" class="form-select" required>
                                        <option value="" class="form-select-label">Choose Cream</option>
                                        <?php                                
                                        for($j=0;$j<count($creams);$j++)
                                        {
                                            echo "<option value='".$creams[$j]['id']."'>".$creams[$j]['name']." => ".$creams[$j]['price']." MMK</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </li>

                            <li>
                                <div>
                                    <select name="size" id="" class="form-select mt-4" required>
                                        <option value="">Choose Size</option>
                                        <?php
                                        for($k=0;$k<count($sizes);$k++)
                                        {
                                            echo "<option value='".$sizes[$k]['id']."'>".$sizes[$k]['size']." inches => ".$sizes[$k]['price']." MMK</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </li>

                            <li>
                                <div>
                                        <select name="doll" id="" class="form-select mt-4 mb-4" required>
                                            <option value="">Choose Doll</option>
                                            <?php
                                            for($k=0;$k<count($dolls);$k++)
                                            {
                                                echo "<option value='".$dolls[$k]['id']."'> ".$dolls[$k]['type']." => ".$dolls[$k]['price']." MMK</option>";
                                            }
                                            ?>
                                        </select>
                                </div>
                            </li>

                            <li>
                                <input type="text" name="discription" class="form-control" placeholder="Description for cake!!" required>
                            </li>

                            <input type="hidden" name="cart_item" value="<?php echo $item ?>">
                        </ul>
                        
                        <div class="product__details__option">
                            <div class="quantity">
                                <!-- <div class="pro-qty"> -->
                                    <input type="number" min="1" name="quantity" placeholder="Quantity" class="form-control" value="1" max='20' style="cursor:pointer;caret-color:transparent" onkeydown="return false;">
                                <!-- </div> -->
                            </div>
                            <div>
                                <button class="primary-btn">Confirm</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            
        </div>
    </section>
    <!-- Shop Details Section End -->

<div class="mt-5"></div>

<?php
   include_once "layout/footer.php";
?>