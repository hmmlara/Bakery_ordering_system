<?php
    ob_start();
   include_once "layout/header.php"; 
   include_once "controller/user_controller.php";
   include_once "controller/promotion_controller.php";
   include_once "controller/insert_controller.php";

   if(isset($_SESSION['customer']))
    {
        $email=$_SESSION['customer']['email'];
        $userController=new userController();
        $result=$userController->getUser($email);
    }

   $cart_count=$_SESSION['count'];
   //echo 'count'.$cart_count;

   $promotionController=new PromotionController();
   $promotion_rate=$promotionController->today_promotion();
   if(!isset($promotion_rate['percentage'])) 
    { 
        $promotion_rate['percentage']=0;
    }


    // echo '<pre>'; 
    //      var_dump($_SESSION['cart']);                                          
    // echo '</pre>';

    // echo '<pre>'; 
    //      var_dump($_SESSION['customize']);                                          
    // echo '</pre>';

    

    $email=$_SESSION['customer']['email'];
    $userController=new userController();
    $result=$userController->getUser($email);
    $cid=$result[0]['id'];
    //echo $cid;
    echo "</br>";

    $total_qty=0;
    $total_balance=0;
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
    // echo $total_qty;
    // echo $total_balance;
    // echo $promotion_rate['percentage'];
    $promotion_amount=($total_balance*($promotion_rate['percentage']/100));
    $bill=$total_balance-$promotion_amount;
    //echo $bill;

    date_default_timezone_set("Asia/Yangon");
    $date=date('Y-m-d H:i:s',strtotime('now'));
    $insertController=new InsertController();
    $insertController->addNewOrder($cid,$total_qty,$total_balance,$promotion_amount,$bill,$date);


    $oid=$insertController->getOrderId($cid);
    $order_id=$oid['id'];


    for($i=0;$i<(count($_SESSION['cart'])+$cart_count);$i++)
    {
        if (isset($_SESSION['cart'][$i]))
        {
            $pid=$_SESSION['cart'][$i]['productId'];
            $category_name=$insertController->getCategoryName($pid);
            //var_dump($category_name) ;
            $qty=$_SESSION['cart'][$i]['productQty'];
            $unitPrice=$_SESSION['cart'][$i]['productPrice'];
            $subtotal=$qty*$unitPrice;
            
            if($category_name['name']=='customize_cake')            
            {
                //echo (count($_SESSION['customize'])+$cart_count);
                for($index=0;$index<(count($_SESSION['customize'])+$cart_count);$index++)
                {
                    if(isset($_SESSION['customize'][$index]) && ($_SESSION['customize'][$index][4])==$pid)
                    {                        
                        // if(($_SESSION['customize'][$index][4])==$pid)
                        // {
                            $cream_id=$_SESSION['customize'][$index][0];
                            $size_id=$_SESSION['customize'][$index][1];
                            $doll_id=$_SESSION['customize'][$index][2];
                            $discription=$_SESSION['customize'][$index][3];
                            $insertController->addCustomizeOrderDetail($order_id,$pid,$cream_id,$doll_id,$size_id,$discription,$qty,$unitPrice,$subtotal); 
                            $index=(count($_SESSION['customize'])+$cart_count);
                            
                        // }    
                        // $insertController->addCustomizeOrderDetail($order_id,$pid,$cream_id,$doll_id,$size_id,$discription,$qty,$unitPrice,$subtotal);            
                    
                    }
                    
                }            
                
            }
            
        }        
        
    }

    for($index=0;$index<(count($_SESSION['cart'])+$cart_count);$index++)
    {
        if (isset($_SESSION['cart'][$index]))
        {
            $pid=$_SESSION['cart'][$index]['productId'];
            $category_name=$insertController->getCategoryName($pid);
            //var_dump($category_name) ;
            $qty=$_SESSION['cart'][$index]['productQty'];
            $unitPrice=$_SESSION['cart'][$index]['productPrice'];
            $subtotal=$qty*$unitPrice;

            if($category_name['name'] !='customize_cake')
            {    
                $insertController->addOrderDetail($order_id,$pid,$qty,$unitPrice,$subtotal);
            }           
            
            
        }       
        
    }
?>


<body id="body">
    <div class="container">
       
      <div class="row">
        <div class="col-md-12" id="bill">
           
                   
                    <table class="table table-bordered table-striped rounded" >
                        <thead>
                            <tr>
                                <th colspan="4">
                
                                    <h3 class="text-center my-3"><i>Sweet</i>  <img src="img/logo.png" alt="" width="70px"></h3>
                                    <h6>Customer Name - <b><?php echo $result[0]['name'];?></b></h6>                     
                                    
                                </th>
                            </tr>
                            


                        </thead>
                        <tbody>
                            
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                            </tr>
                            <?php
                                $total_qty=0;
                                $total_balance=0;
                                for($i=0;$i<(count($_SESSION['cart'])+$cart_count);$i++)
                                {    
                                    echo '<tr>';

                                    if(isset($_SESSION['cart'][$i]))
                                    {
                                        $pid=$_SESSION['cart'][$i]['productId'];
                                        $category_name=$insertController->getProductName($pid);
                                        echo '<td>'.$category_name['name'].'</td>';
                                        $unit_price=$_SESSION['cart'][$i]['productPrice'];
                                        echo '<td>'.$unit_price.'</td>';
                                        $qty= $_SESSION['cart'][$i]['productQty'];
                                        echo '<td>'.$qty.'</td>';
                                        echo '<td>'.$unit_price*$qty.'</td>';
                                        $total_balance+=$unit_price*$qty;        
                                        //$total_qty+=$qty;
                                    }

                                    echo '</tr>';
                                    
                                }
                            
                            ?>
                            
                        </tbody>
                        
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right">Total</td>
                                <td><?php echo $total_balance; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right">Promotion</td>
                                <td><?php echo $promotion_amount; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right">Bill</td>
                                <td><?php echo $bill; ?></td>
                            </tr>
                            <tr style="background-color: #EDE9E9;">
                                <td colspan="4" class="text-center">
                                    <h4 class="my-3"><em>Thanks for shopping with us &hearts;</em></h4>
                                </td>
                            </tr>
                        </tfoot>
                    </table>


                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                    <a class="btn btn-secondary ms-auto my-3 mx-2" href="history.php">View History</a>
                    <a class="btn btn-secondary ms-auto my-3 mx-2" href="index.php">Back</a>
                    <a class="btn btn-secondary ms-auto my-3 mx-2" onclick="myprint()" href="#">Print</a>
                </div>
            </div>
        </div>
       
      </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        function myprint(){
            var body = document.getElementById('body').innerHTML;
            var bill = document.getElementById('bill').innerHTML;

            document.getElementById('body').innerHTML = bill;
            window.print();
            document.getElementById('body').innerHTML = body;
        }
    </script>
</body>


</html>



<?php

    unset($_SESSION['cart']);
    unset($_SESSION['customize']);
    unset($_SESSION['count']);
    //header('location:shop.php');
?>