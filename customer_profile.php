<?php

ob_start();
//session_start();
    include_once "layout/header.php";
 
    include_once "controller/user_controller.php";

    $email=$_SESSION['customer']['email'];
    //echo $name;
    $userController=new userController();
    $result=$userController->getUser($email);
    //var_dump($result);

?>

<body class="bg-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="img/user.jpg" class="mt-3" alt="hi" height="90%" width="100%">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Name -- </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <label class="form-label">
                                                    <?php    
                                                    echo $result[0]['name'];
                                                    ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Password -- </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <label class="form-label">
                                                    <?php    
                                                    echo $result[0]['password'];
                                                    ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="form-group">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Phone -- </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <label class="form-label">
                                                    <?php    
                                                    echo $result[0]['phone'];
                                                    ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Address -- </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <label class="form-label">
                                                    <?php    
                                                    echo $result[0]['address'];
                                                    ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Email -- </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <label class="form-label">
                                                    <?php    
                                                    echo $result[0]['email'];
                                                    ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="user_logout.php" name="signup" class="btn btn-dark mt-3">Sign Out</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="history.php" name="signup" class="btn btn-dark mt-3">History</a>
                                                </div>
                                            </div>
                                        </div>
                                            
                                            <!-- <button type="submit" name="login" class="btn btn-warning mt-3">Login</button> -->
      
                                        <hr>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php
include_once "layout/footer.php";
?>