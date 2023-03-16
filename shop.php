<?php
//   session_start();
   include_once "layout/header.php";
   include_once "controller/category_controller.php";
   include_once "controller/product_controller.php";
   $prodctsController=new ProductController();
   $products=$prodctsController->getProductsForSale();

   $categoriesController=new categoryController();
   $get_categories=$categoriesController->getCategory();


   //var_dump ($get_categories);
?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shop</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>  Shop </span>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="shop__option">
                <div class="row">
                    <div class="col-lg-9 col-md-9">
                        <div class="shop__option__search">
                        
                            <form action="Insertcart.php" method="post">
                                <select class="form-select" id='fetchval'>
                                    <option value="0">All</option>
                                   <?php
                                   
                                      for($index=0;$index<count($get_categories);$index++)
                                      {
                                        echo "<option value='".$get_categories[$index]['id']."'>";
                                        echo " <a class='nav-link active' id='pills-home-tab' data-bs-toggle='pill' aria-selected='false'>";
                                        echo "<div>".$get_categories[$index]['name']. "</div>";
                                        echo "</a>";
                                        echo "</option>";
                                      }

                                    //   .$get_categories[$index]['name'].
                                    ?>
                                </select>
                                <input type="" placeholder="                            Making your life sweeter one bite at a time!               " style="cursor:pointer;caret-color:transparent" >
                                <!-- <button type="submit"></button> -->
                            </form>
                        </div>

                    </div>
                </div>
            </div>

     <div class="row" id="filter_row">
             
            <?php  
                for($index=0;$index<count($products);$index++)
                {
                    // echo "<form action='Insertcart.php' method='post'>";
                        echo "<div class='col-lg-3 col-md-6 col-sm-6'>";
                        echo "<form action='Insertcart.php' method='post'>";//1
                        echo "<div class='product__item'>";//2
                        echo "<div class='product__item__pic set-bg' data-setbg='admin/uploads/".$products[$index]['image']."'>";//3
                        echo "<div class='product__label'>";//4
                        echo "<span>".$products[$index]['category_name']."</span>";
                        echo "</div>";//4
                        echo "</div>";//3

                        echo "<div class='product__item__text'>";//5

                        echo "<input type='hidden' name='Pname' value='".$products[$index]['name']."'>";
                        echo "<input type='hidden' name='Pindex' value=".$products[$index]['id'].">";
                        echo "<input type='hidden' name='Pprice' value=".$products[$index]['price'].">";

                        echo "<h6> <a href='#'>".$products[$index]['name']."</a><br> 
                              <input type='number' size='3' name='Pquantity' min='1'  placeholder='Quantity' class='mt-3' value='1' max='20' style='cursor:pointer;caret-color:transparent' onkeydown='return false;'></h6>";
                        echo "<div class='product__item__price'>".$products[$index]['price']."</div>";
                        //echo "<div class='cart_add'>";
                        // echo "<button href='#'>Add to cart</a>";
                        ?>

                        <div>
                        <button type='submit' class='btn w-50' name='addCart' style="background-color:#f08632" >Add to cart</button>

                        </div>
                        <?php
                        
                        //echo "</div>";
                        echo "</div>";//5
                        echo "</div>";//2
                        echo "</form>";//1
                        echo "</div>";
                    // echo "</form>";    
                   
                  
                }
             
             ?>
     </div>

        <!-- End CupCake -->
            <!-- <div class="shop__last__option">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><span class="arrow_carrot-right"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__last__text">
                            <p>Showing 1-9 of 10 results</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Shop Section End -->


    <script src="js/bootstrap.bundle.min.js"></script> 
    
    <script>
        let addtocart=document.querySelectorAll('.cart');
    </script>
<?php
   include_once "layout/footer.php";
?>