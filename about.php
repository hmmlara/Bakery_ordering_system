<?php
ob_start();
include_once "layout/header.php";
include_once "controller/baker_controller.php";


$bakerController = new BakerController();
$bakers = $bakerController->getBakers();

?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>About</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="./index.php">Home</a>
                    <span>About</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- About Section Begin -->
<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about__video set-bg" data-setbg="img/about4.webp">
                    <!-- <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1"
                    class="play-btn video-popup"><i class="fa fa-play"></i></a> -->
                </div>
            </div>
        </div>
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
                        <p>Certified baker</p>
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
<?php
include_once "layout/footer.php";
?>