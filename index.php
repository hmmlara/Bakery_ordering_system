<?php
ob_start();
   include_once "layout/header.php";
   include_once "controller/feedback_controller.php";
   include_once "controller/baker_controller.php";
   include_once "controller/promotion_controller.php";
   include_once "controller/category_controller.php";
   include_once "controller/product_controller.php";
    include_once "feedback.php";
   $feedbacksController=new feedbacksController();
   $feedbacks=$feedbacksController->Feedbacks();

   $bakerController = new BakerController();
   $bakers = $bakerController->getBakers();

   $promotionController = new PromotionController();
   $promotions = $promotionController->Promotions();

   $categoryController=new categoryController();
   $get_categories=$categoryController->getCategory();
 
   $productsController=new ProductController();
   $products=$productsController->getProductsForCarousel();
   
?>

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <?php
                                echo '<h2>Making your life sweeter one bite at a time!</h2>';
                                for ($index = 0; $index < count($promotions); $index++) {
                                    if ($promotions[$index]['start_date'] <= date('Y-m-d') && date('Y-m-d') <= $promotions[$index]['end_date']) {
    
                                        echo "<h4 style='color: #f08632;'><b>Enjoy " . $promotions[$index]['name'] . " promotion and get " . $promotions[$index]['percentage'] . "% discount on every item.</b></h4><br>";    
                                        
                                
                                        if ($promotions[$index]['start_date'] == $promotions[$index]['end_date']) {
                                            echo "<h3 class='p-1' style='color: #f08632;'>Promotion is only for today!!</h3>";
                                        } else{
                                            echo "<p style='color: #f08632;'>Promotion period is from " . date_format(date_create($promotions[$index]['start_date']), 'd/m/Y') . "  to " . date_format(date_create($promotions[$index]['end_date']), 'd/m/Y') . "</p>";
                                        }
    
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about__text">
                        <div class="section-title">
                            <span>About Cake shop</span>
                            <h2>Cakes and bakes from the house of Queens!</h2>
                        </div>
                        <p>The "Cake Shop" is a Jordanian Brand that started as a small family business. The owners are
                        Dr. Iyad Sultan and Dr. Sereen Sharabati, supported by a staff of 80 employees.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about__bar">
                        <div class="about__bar__item">
                            <p>Cake design</p>
                            <div id="bar1" class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="95"></span>
                            </div>
                        </div>
                        <div class="about__bar__item">
                            <p>Cake Class</p>
                            <div id="bar2" class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="80"></span>
                            </div>
                        </div>
                        <div class="about__bar__item">
                            <p>Cake Recipes</p>
                            <div id="bar3" class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="90"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

  
<!-- Start Carousel -->
  <div class="container">
    <div class="row d-flex justify-content-center">
        <ul class="nav mb-3 col" id="pills-tab">
            <?php
                for($i=0;$i<count($get_categories);$i++)
                {
                   
                    echo "<li class='nav-item' id='".$get_categories[$i]['id']."'>";
                   
                    if(strpos($get_categories[$i]['name'], ' '))
                    {
                        echo "<a class='nav-link' id='pills-home-tab' data-bs-toggle='pill' data-bs-target='#".str_replace(' ','-',$get_categories[$i]['name'])."' aria-selected='true'>";
 
                    }
                    else
                    {
                        echo "<a class='nav-link' id='pills-home-tab' data-bs-toggle='pill' data-bs-target='#".$get_categories[$i]['name']."' aria-selected='true'>";
                    }
                   
                   echo "<div class='categories__item'>";
                   echo "<div class='categories__item__icon'>";
                    if($get_categories[$i]['name']==='Cup Cake')
                    {
                        echo " <span class='flaticon-029-cupcake-3'></span>";

                    }
                    elseif($get_categories[$i]['name']==='Donuts')
                    {
                        echo "<span class='flaticon-006-macarons'></span>";

                    }
                    elseif($get_categories[$i]['name']==='Cake')
                    {
                        echo " <span class='flaticon-005-pancake'></span>";
                    }else
                    {
                        echo " <span class='flaticon-034-chocolate-roll'></span>";

                    }
                   
                   echo "<h5>".$get_categories[$i]['name']."</h5>";
                   echo "</div>";
                   echo "</div>";
                   echo "</a>";
                   echo "</li>";
                }
            ?>
        </ul>
    </div>
<!-- end categories -->
     <!-- start products -->
  <div class="row">
    <div class="tab-content" id="pills-tabContent">
        <!-- For cup Cake -->
        <?php
                 for($index=0;$index<count($get_categories);$index++)
                {
                    if(strpos($get_categories[$index]['name'], ' '))
                    {
                        if($i == 0){
                            echo "<div class='tab-pane' id='".str_replace(' ','-',$get_categories[$index]['name'])."' aria-labelledby='pills-home-tab' role='tabpanel'>";
                        }
                        else{
                            echo "<div class='tab-pane show active' id='".str_replace(' ','-',$get_categories[$index]['name'])."' aria-labelledby='pills-home-tab' role='tabpanel'>";
                        }
                        ?>
                <section class="product spad">
                    <div class="container">
                        <div class="row">
                        <?php
                             for($i=0;$i<count($products);$i++)
                             {
                                if($get_categories[$index]['name']==$products[$i]['category_name'])
                                {
                                
                                    echo "<div class='col-lg-3 col-md-6 col-sm-6  text-center mt-5'>";
                                    echo "<a href='shop.php'><img class='img-fluid' src='admin/uploads/".$products[$i]['image']."' height='60%' width='170%'></a>";
                                    echo "<h4 class='text-warning'><a>".$products[$i]['name']."</a></h4>";
                                    echo "<b class=''>".$products[$i]['price']."</b> <br>";
                                    echo "<i>".$products[$i]['description']."</i>";
                                    echo "</div>";
                                }
                                 
                             }
                             ?>
                         </div>
                      </div>
                  </section>
                
                             <?php
                             echo "</div>";
                    }else
                    {
                        echo "<div class='tab-pane' id='".$get_categories[$index]['name']."' aria-labelledby='' role='tabpanel'>";
                        ?>
                <section class="product spad">
                    <div class="container">
                        <div class="row">
                        <?php
                            for($i=0;$i<count($products);$i++)
                             {
                                if($get_categories[$index]['name']==$products[$i]['category_name'])
                                {
                                    echo "<div class='col-lg-3 col-md-6 col-sm-6  text-center'>";
                                    echo "<a href='shop.php'><img src='admin/uploads/".$products[$i]['image']."' height='70%' width='170%'></a>";
                                    echo "<h4 class='text-warning'><a>".$products[$i]['name']."</a></h4>";
                                    echo "<b class=''>".$products[$i]['price']."</b> <br>";
                                    echo "<i>".$products[$i]['description']."</i>";
                                    echo "</div>";
                                    }
                                 
                             }
                                ?>
                                     </div>
                                 </div>
                          </section>
                      
                         <?php
                             echo "</div>";
                      }
                } 
          ?>
        </div>
    </div>
</div>
<!-- end carousel -->



    <!-- Product Section Begin -->

    <!-- Product Section End -->

    <!-- Class Section Begin -->
    <section class="class spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="class__form">
                        <div class="section-title">
                            <h2 text-waring>Feedback Form</h2>
                            <!-- <h2>We Want  <br />Your Feedback</h2> -->
                        </div>
                        <form action="feedback.php" method="post">
                            <input type="text" placeholder="Name" name="name">
                            <input type="text" placeholder="Email" name="email">
                            <input type="text" placeholder="Address" name="address">
                            <select name="rating" id="" class="form-select">
                                <option value="" selected>Rating</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                             <textarea name="comments" id="" cols="30" rows="5" class="form-control" placeholder="write feedback"></textarea> <br>
                            <button type="submit" class="site-btn" name="submit">registration</button>
                            <span name="error">

                            </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="class__video set-bg" data-setbg="img/">
                <img src="img/feedback.jpg" alt="" height="500px" width="" style="border-radius:10px;margin-top:250px">
            </div>
        </div>
    </section>
    <!-- Class Section End -->

    <!-- Team Section Begin -->

    <section class="team spad">
        <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="section-title">
                    <span>Our team</span>
                    <h2>Sweet Baker </h2>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5">
                <!-- <div class="team__btn">
                    <a href="#" class="primary-btn">Join Us</a>
                </div> -->
            </div>
        </div>
        
        <div class="row">
            <?php
            for ($i = 0; $i < count($bakers); $i++) {
                echo "<div class='col-lg-3 col-md-6 col-sm-6'>";
                echo "<div class='team__item set-bg' data-setbg= 'admin/uploads/" . $bakers[$i]["image"] . "'>";
                echo "<div class='team__item__text'>";
                echo "<h6>" . $bakers[$i]["name"] . "</h6>";
                echo "<span>" . $bakers[$i]["position"] . "</span>";
                echo "<p>" . $bakers[$i]["note"] . "</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            
            ?>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>
<!-- Team Section End -->

    <!-- FeedBack Section Begin -->
    <section class="testimonial spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span>Testimonial</span>
                        <h2>Our client say</h2>
                    </div>
                </div>
            </div>
                     <div class="row">
                        <div class='testimonial__slider owl-carousel'>
                               <?php
                                for($i=0;$i<count($feedbacks);$i++)
                                {
                                    echo "<div  class='col-lg-6'>";//1
                                    echo "<div class='testimonial__item' style='height:300px !important'>";//2
                                    echo "<div class='testimonial__author'>";//3
                                    echo "<div class='testimonial__author__text'>";//4
                                    echo "<h5>".$feedbacks[$i]['name']."</h5>";
                                    echo "<span>".$feedbacks[$i]['address']."</span>";
                                    echo "</div>";//4
                                    echo "</div>";//3
                                    echo "<div class='rating'>";
                                    foreach(range(1,$feedbacks[$i]['rating']) as $index){
                                        echo "<span class='icon_star ml-2'></span>";
                                    }
                                    echo "</div>";
                                    echo "<p>".$feedbacks[$i]['comments']."</p>";
                                    echo "</div>";//2
                                    echo "</div>";//1
                                }
                                  ?>
                            </div>
                     </div>
            </div> 
    </section>
    <!-- FeedBack Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="instagram__text">
                        <div class="section-title">
                            <span>Follow us on instagram</span>
                            <h2>Sweet moments are saved as memories.</h2>
                        </div>
                        <h5><i class="fa fa-instagram"></i> @sweetcake</h5>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/instagram/instagram-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="img/instagram/instagram-2.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/instagram/instagram-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/instagram/instagram-4.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="img/instagram/instagram-5.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/instagram/instagram-3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Map Begin -->
    <div class="map">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-7">
                    <div class="map__inner">
                        <h6>Sweet Cake</h6>
                            <ul>
                                <li>Garden City Condo, Tower 11</li>
                                <li>Sweetcake@support.com</li>
                                <li>+959 454231525</li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="map__iframe mt-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d118458.08526734659!2d96.01920949209683!3d21.90319228296406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x30cb6d68c3d6f2ab%3A0x7af4dabf869eca9!2sgarden%20city%20condo%2C%2074%20street%2C%20Mandalay%2005051!3m2!1d21.9032071!2d96.0892499!5e0!3m2!1sen!2smm!4v1677487959185!5m2!1sen!2smm" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!-- Map End -->
 
  <?php
    include_once "layout/footer.php";
  ?>


  