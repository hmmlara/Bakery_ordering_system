<?php
ob_start();
//session_start();

include_once "layout/header.php";
include_once "controller/user_controller.php";
$userController=new userController();

if(isset($_POST["signup"]))
{
    //echo "hi";
    $error=false;

    if(!empty($_POST["name"]))
    {
        $name=$_POST["name"];
        $new_name=strip_tags($name);
    }
    else{
        $error=true;
    }
    if(!empty($_POST["password"]))
    {
        $password=md5(trim($_POST["password"]));
    }
    else{
        $error=true;
    }
    if(!empty($_POST["phone"]))
    {
        $phone=$_POST["phone"];
    }
    else{
        $error=true;
    }
    if(!empty($_POST["address"]))
    {
        $address=$_POST["address"];
        $new_address=strip_tags($address);
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
    if(!$error)
    { 
        $username=$userController->getName($name);
        echo $username;
        if($name==$username){
            header("location:user_signup_form.php");
        }

        else{
            $result=$userController->newUser($new_name,$password,$phone,$new_address,$email);
            if($result)
            {
                $_SESSION['customer'] = ['email' => $email];
                header("location:shop.php");
            }
        }
        
    }
    
}

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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="name" required='required' class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input type='password' name="password" required='required' class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type='number' name="phone" required='required' class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Phone">
                                        </div>
                                        <div class="form-group">
                                            <input type='text' name="address" required='required' class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <input type='email' name="email" required='required' class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Email">
                                        </div>
                                        <div>
                                            <button type="submit" name="signup" class="btn btn-primary mt-3">Sign Up</button>
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