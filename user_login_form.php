<?php
ob_start();
//session_start();
include_once "layout/header.php";
include_once "controller/user_controller.php";
$userController=new userController();

if(isset($_POST["login"]))
{
    //echo "hi";
    $error=false;

    // if(!empty($_POST["name"]))
    // {
    //     $name=$_POST["name"];
    // }
    // else{
    //     $error=true;
    // }
    if(!empty($_POST["password"]))
    {
        $password=md5(trim($_POST["password"]));
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
        $all_email=$userController->checkUser($email);
        //var_dump($all_email);
        //echo $password;

        if($all_email && $all_email['email']==$email && $all_email['password']==$password)
            {
                $_SESSION['customer'] = ['email' => $email];

                //for authentication
                
                session_regenerate_id();
                $user_session_id=session_id();
                $userController->setSessionId($user_session_id,$email);
                // $_SESSION['user_session_id'] = $user_session_id;
                $_SESSION['auth_user'] = [
                    'name' => $all_email['name'],
                    'id' => $all_email['id'],
                    '_token' => $user_session_id
                ];
                //var_dump($_SESSION['user_session_id']);
                //var_dump($_SESSION['auth_user']);

                header("location:index.php");
            }
        else
            {
              ?>
                <script src="js/sweetalert.min.js"></script>
                <script>
                    swal("Try Again!", "Invalid Username Or Password!");
                </script>
              <?php
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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <!-- <div class="form-group">
                                            <input type="text" name="name" required='required' class="form-control form-control-user"
                                                id="exampleInputName" aria-describedby="emailHelp"
                                                placeholder="Enter Username...">
                                        </div> -->
                                        
                                        <div class="form-group">
                                            <input type='email' name="email" required='required' class="form-control form-control-user"
                                                id="exampleInputEmail" placeholder="Email">
                                        </div>

                                        <div class="form-group">
                                            <input type='password' name="password" required='required' class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        
                                        <div>
                                            <button type="submit" name="login" class="btn btn-primary mt-3">Login</button>
                                        </div>
                                        
                                        <h6 class="mt-5">If you don't have account --> <a href="user_signup_form.php" class="btn btn-secondary">Sign Up</a></h6>
                                        <hr class="mt-5">
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