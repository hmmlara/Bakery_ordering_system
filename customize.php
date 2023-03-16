<?php
ob_start();

include_once "layout/header.php";

include_once "controller/ingredients_controller.php";
include_once "controller/product_controller.php";

$ingredientController=new IngredientController();
$creams=$ingredientController->getCreams();
$dolls=$ingredientController->getDolls();
$sizes=$ingredientController->getSizes();

$productController=new ProductController();
$images=$productController->getCustomize();

// echo "<pre>";
// var_dump($images);
// echo "</pre>";

if(isset($_POST["add"])){
    $error=false;

    if(!empty($_POST["name"]))
    {
        $name=$_POST["name"];
    }
    else{
        $error=true;
    }
    
    $cream=$_POST["cream"];
    $size=$_POST["size"];
    $doll=$_POST["doll"];
    $discription=$_POST["discription"];
    
    if(!$error)
    {
        //$result=$categoryController->addCategory($name,$parent);
        //if($result)
        {
            header("location:index.php");
        }
    }
}
   
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
                    <span> Customize </span>

                </div>
            </div>
        </div>

        <?php
                        //var_dump($images);
                        echo '<div class="row mt-5">';
                        
                            for($i=0;$i<count($images);$i++)
                                {
                                    //echo $images[$i]['id'];
                                    echo '<div class="col-lg-4 col-md-6 mt-5">';
                                    echo '<form action="customize_choosing.php" method="post">';
                                        echo "<input type='text' value='".$images[$i]["id"]."'  name='product_id' hidden/>";
                                    
                                        echo "<img src='admin/uploads/".$images[$i]['image']."' height='250px' width='250px'>";  
                                        echo '<div class="mt-3 ">
                                        '.$images[$i]['price'].'<b> MMK</b>
                                        </div> ';                                     
                                        if(isset($_SESSION['customer'])) 
                                            {
                                            echo '
                                            <div class="mt-3">
                                                <button name="add" class="btn w-30 mt-3 cart" style="background-color:#f08632">Choosing Ingredients</button>
                                            </div>';
                                            }
                                        if(!isset($_SESSION['customer'])) 
                                            {
                                            echo '
                                            <div class="mt-3">
                                                <a href="user_login_form.php" name="add" class="btn w-30 mt-3 cart" style="background-color:#f08632">Choosing Ingredients</a>
                                            </div>';
                                            }
                                    
                                    echo '</form>'; 
                                    echo '</div>';
                                }               
                        echo '</div>';
                    ?>
    </div>

</div>
<!-- Breadcrumb End -->



<div class="mt-5">

</div>


<script src="js/bootstrap.bundle.min.js"></script>
<!-- <script src="js/shop.js"></script> -->

<script>
let addtocart = document.querySelectorAll('.cart');
</script>

<?php
    if(isset($_SESSION['customer'])) 
    {
    ?>
<script>
for (let i = 0; i < addtocart.length; i++) {
    addtocart[i].onclick = function() {

        //$_SESSION['cart']++;
        //console.log("hi");
        //$_SESSION['customize']=array();
        //$_SESSION['customize']['img_id']=$images[$i]["id"];
    }
}
</script>
<?php
    }
    ?>

<!--useless-->
<!-- <?php
    if(!isset($_SESSION['customer'])) 
    {
    ?>
        <script>
            for(let i=0;i<addtocart.length;i++){
                //console.log(addtocart[i]);
                addtocart[i].onclick = function(){
                    window.location.replace("http://localhost/Bakery_Online_Store/user_login_form.php");
                }
            }
        </script>
    <?php
    }
    ?> -->



<?php
   include_once "layout/footer.php";
?>