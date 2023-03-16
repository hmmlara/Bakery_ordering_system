<?php

ob_start();
    include_once "layout/header.php";
 
    include_once "controller/contact_controller.php";
    $contactController=new ContactController();
    
   if(isset($_POST["send"])){
    $error=false;

    if(!empty($_POST["name"]))
    {
        $name=$_POST["name"];
        $new_name=strip_tags($name);
    }
    else{
        $error=true;
    }

    if(!empty($_POST["email"]))
    {
        $email=$_POST["email"];
    }
    else{
        $error=true;
    }

    if(!empty($_POST["message"]))
    {
        $message=$_POST["message"];
        $new_message=strip_tags($message);
    }
    else{
        $error=true;
    }
    
    if(!$error)
    {
        $result=$contactController->addContact($new_name,$email,$new_message);
        if($result)
        {
            ?>
            <script src="js/sweetalert.min.js"></script>
            <?php
            
            echo " 
                <script>
                swal({
                title: 'SuccessFul!',
                text: 'Thank You For Contact With Us!',
                icon: 'success',
                });
                </script>";
            //header("location:index.php");
        }
    }
}

?>
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
        <div class="row mb-3">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Contact</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="./index.php">Home</a>
                    <span>Contact</span>
                </div>
            </div>
        </div>
            <div class="map">
                <div class="container">
                    <div class="row d-flex justify-content-center">
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
                <div class="map__iframe">
                <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d118458.08526734659!2d96.01920949209683!3d21.90319228296406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x30cb6d68c3d6f2ab%3A0x7af4dabf869eca9!2sgarden%20city%20condo%2C%2074%20street%2C%20Mandalay%2005051!3m2!1d21.9032071!2d96.0892499!5e0!3m2!1sen!2smm!4v1677487959185!5m2!1sen!2smm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="contact__address">
                <div class="row">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact__text">
                        <h3>Contact With us</h3>
                        <ul>
                            <li>Representatives or Advisors are available:</li>
                            <li>Mon-Fri: 5:00am to 9:00pm</li>
                            <li>Sat-Sun: 6:00am to 9:00pm</li>
                        </ul>
                        <img src="img/cake-piece.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact__form">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name" name="name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email" name="email" required>
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message" name="message" required></textarea>
                                    <button type="submit" class="site-btn" name="send">Send Us   <i class="fa fa-send-o"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    <?php
    include_once "layout/footer.php";
  
?>