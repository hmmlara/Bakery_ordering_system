<?php
include_once "layout/header.php";
include_once "controller/user_controller.php";
include_once "controller/history_controller.php";

if(isset($_SESSION['customer']))
 {
     $email=$_SESSION['customer']['email'];
     $userController=new userController();
     $result=$userController->getUser($email);
 }
 
 $cid= $result[0]['id'];
 $name=$result[0]['name'];

 $historyController=new historyController();
 $result=$historyController->getAllHistory($cid);

//  echo "<pre>";
//  var_dump($result);
//  echo "</pre>";
?>



<body>
    <div class="container">
       
      <div class="row">
        <div class="col-md-12">
            <div class="border:2px solid red">
                <div class="card-header">
                    <h3 class="text-center mt-5"><b>Online Bakery Store</b></h3><hr>
                    <div class="d-flex">
                        <h6>Customer Name - <b><?php echo $name;?></b></h6>                        
                    </div>
                    <hr>
                   
                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="border-color:orange">
                        <tbody>
                            <tr>
                                <th>Date</th>
                                <th>Total Quantity</th>
                                <th>Total Amount</th>
                                <th>Promotion Amount</th>
                                <th>Bill</th>
                                <th>Action</th>
                            </tr>

                            <?php

                                for($i=0;$i<(count($result));$i++)
                                {    
                                    echo '<tr>';
                                        
                                        echo '<td>'.$result[$i]['date'].'</td>';
                                        echo '<td>'.$result[$i]['total_quantity'].'</td>';
                                        echo '<td>'.$result[$i]['total_balance'].'</td>';
                                        echo '<td>'.$result[$i]['promotion_amount'].'</td>';
                                        echo '<td>'.$result[$i]['bill'].'</td>'; 
                                        echo '<td><a class="btn btn-secondary ms-auto my-3" href="history_detail.php?oid='.$result[$i]['id'].'">Detail</a></td>';                                    

                                    echo '</tr>';
                                    
                                }
                            ?>
                            
                        </tbody>
                        
                        <tfoot>
                            
                            <tr>
                                <td colspan="6" class="text-center">
                                    <h2 class="my-3"><em>Thanks for shopping with us &hearts;</em></h2>
                                    <a href="index.php" class="btn btn-secondary">Back</a>
                                </td>
                            </tr>

                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
       
      </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>