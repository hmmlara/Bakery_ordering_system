<?php

include_once "layout/header.php";
include_once "controller/history_controller.php";
include_once "controller/product_controller.php";

$oid=$_GET['oid'];
// echo $oid;

$historyController=new historyController();
$order_result=$historyController->getHistoryDetail_order($oid);
$customize_result=$historyController->getHistoryDetail_customize($oid);

$productController=new ProductController();

// echo '<pre>';
// var_dump($order_result);
// echo '</pre>';

// echo '<pre>';
// var_dump($customize_result);
// echo '</pre>';

if(isset($_SESSION['customer']))
    {
        $email=$_SESSION['customer']['email'];
        $userController=new userController();
        $result=$userController->getUser($email);
    }

?>


<body>
    <div class="container">
       
      <div class="row">
        <div class="col-md-12">
            <div class="border:2px solid red">
                <div class="card-header">
                    <h3 class="text-center mt-5"><b>Online Bakery Store</b></h3><hr>
                    <div class="d-flex">
                        <h6>Customer Name - <b><?php echo $result[0]['name'];?></b></h6>                        
                    </div>
                    <hr>
                   
                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="border-color:orange">
                        <tbody>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                            </tr>

                            <?php
                            for($i=0;$i<count($order_result);$i++)
                            {
                                $product_id=$order_result[$i]['product_id'];
                                $pname=$productController->getProductName($product_id);
                                echo '<tr>
                                <td>'.$pname['name'].'</td>
                                <td>'.$order_result[$i]['qty'].'</td>
                                <td>'.$order_result[$i]['unit_price'].'</td>
                                <td>'.$order_result[$i]['subtotal'].'</td>
                                </tr>';
                            }

                            for($i=0;$i<count($customize_result);$i++)
                            {
                                $product_id=$customize_result[$i]['product_id'];
                                $pname=$productController->getProductName($product_id);
                                echo '<tr>
                                <td>'.$pname['name'].'</td>
                                <td>'.$customize_result[$i]['qty'].'</td>
                                <td>'.$customize_result[$i]['unit_price'].'</td>
                                <td>'.$customize_result[$i]['subtotal'].'</td>
                                </tr>';
                            }
                            

                            ?>
                            
                            
                        </tbody>
                        
                        <tfoot>                            
                            <tr>
                                <td colspan="4" class="text-center">
                                    <h2 class="my-3"><em>Thanks for shopping with us &hearts;</em></h2>
                                    <a class="btn btn-secondary ms-auto my-3" href="history.php">All History</a>
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

?>