<script src="js/sweetalert.min.js"></script>
<?php
ob_start();
 include_once "index.php";
 include_once "controller/feedback_controller.php";
 $feedbacksController=new feedbacksController();
 

 if(isset($_POST['submit']))
 {
     $error=false;
    if(!empty($_POST['name']))
    {
        $name=$_POST['name'];
        $new_name=strip_tags($name);
    }else
    {
        $error=true;
    }
    if(!empty($_POST['email']))
    {
        $email=$_POST['email'];
    }else
    {
        $error=true;
    }
    if(!empty($_POST['address']))
    {
        $address=$_POST['address'];
    }
    else
    {
        $error=true;
    }
    if(!empty($_POST['rating']))
    {
        $rating=$_POST['rating'];
    }else
    {
        $error=true;
    }
    if(!empty($_POST['comments']))
    {
        $comments=$_POST['comments'];
    }else
    {
        $error=true;
    }
    if($error)
    {
        echo "Hello World";
         header('location:index.php');

    }else{
        $result=$feedbacksController->addfeedback($new_name,$email,$address,$rating,$comments);
        if($result)
        {
            echo " 
                <script>
                swal({
                title: 'SuccessFul!',
                text: 'Thank You for Your Feedback!',
                icon: 'success',
                });
                </script>";
           //header('location:success.php');
        }
    }
 }
?>