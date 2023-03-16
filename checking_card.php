<?php
    ob_start();
   include_once "layout/header.php";  
   include_once "controller/bank_controller.php";
   include_once "controller/promotion_controller.php";

   if(isset($_POST['ok']))
   {
    $error=false;
    if(!empty($_POST['card']))
    {
        $card=$_POST['card'];
    }
    else
    {
        $error=true;
    }
    if(!empty($_POST['password']))
    {
        $password=$_POST['password'];
    }
    else
    {
        $error=true;
    }

    if(!$error)
    {
        $bankController=new BankController();
        $result=$bankController->checkCard($card);
        // var_dump($result);
        if($result!=false && $result['password']==$password)
        {
            // echo '<pre>';
            //     var_dump($_SESSION['cart']);
            // echo '</pre>';

            $total_qty=0;
            $total_balance=0;
            $cart_count=$_SESSION['count'];
            for($i=0;$i<(count($_SESSION['cart'])+$cart_count);$i++)
            {      
                
                if(isset($_SESSION['cart'][$i]))
                {
                    $unit_price=$_SESSION['cart'][$i]['productPrice'];
                    $qty= $_SESSION['cart'][$i]['productQty'];
                    $total_balance+=$unit_price*$qty;        
                    $total_qty+=$qty;
                }
                
            }
            $promotionController=new PromotionController();
            $promotion_rate=$promotionController->today_promotion();
            if(!isset($promotion_rate['percentage'])) 
                { 
                    $promotion_rate['percentage']=0;
                }
            $promotion_amount=($total_balance*($promotion_rate['percentage']/100));
            $bill=$total_balance-$promotion_amount;
            
            $amount=$bankController->getAmount($card);
            if($amount['amount']>=$bill)
            {
                $updateAmount=$amount['amount']-$bill;
                $bankController->updateAmount($updateAmount,$card);
                header('location:proceed_checkout.php');
            }
            else
            {
                ?>
                <script src="js/sweetalert.min.js"></script>
                <script>
                    //alert('ji');
                    swal("Try Again!", "You don't have enough money!");
                </script>
                <?php
            }

        }
        else
        {
            ?>
            <script src="js/sweetalert.min.js"></script>
            <script>
                //alert('ji');
                swal("Try Again!", "Check your password!");
            </script>
            <?php
        }
    }
   }
?>

    <body style="background-image: url('img/blog/blog-3.jpg'); background-size:cover">
        
        <div class="container">
            <div class="row" style="height: 180px;">

            </div>

            <div class="row ">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <form class="p-3 bg-light justify-content-center h-100" style="opacity: 0.9; border-radius:10px" method="post">
                        <div>
                            <label class="form-label">Card Number</label>
                            <input type="text" name="card" class="form-control" placeholder="Enter your card number!" required>
                        </div>
                        <div>
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password!" required>
                        </div>
                        <div class="text-center mt-3">
                            <button class="btn btn-dark" name="ok" type="submit">OK</button>
                        </div>

                    </form>   
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>

            <div class="row" style="height: 180px;">

            </div>
            
        </div>
     
    </body>
</html>

<?php
   include_once "layout/footer.php";

   
?>


<a href="proceed_checkout.php" class="btn btn-light">Proceed to checkout</a>
