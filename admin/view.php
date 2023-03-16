<?php
ob_start();
    include_once 'layout/header.php';
    include_once __DIR__.'/../controller/customize_order_controller.php';

    $customize_orderController=new CustomizeOrderController();

    $id=$_GET['id'];

    $orderdetail=$customize_orderController->getorder_detail($id);
    $order=$customize_orderController->getordered($id);

    $name=$customize_orderController->getUserName($id);
    $userData=$customize_orderController->getCustomerData($id);
    // var_dump($userData);    
    
?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                   <div class="row">
                        <div class="col-md-5">
                            <?php
                                echo "<div class='row'>";
                                    echo "<div class='col-md-4'>";
                                        echo "<h6>"."Customer Name:</h6>";
                                        echo "<h6>"."Order No:</h6>";
                                    echo "</div>";
                                    echo "<div class='col-md-8'>";
                                        echo "<h6>"."<b>".$name['name']."</b>"."</h6>";
                                        echo "<h6>"."<b>".$id."</b>"."</h6>";
                                    echo "</div>";
                                echo "</div>";   
                                echo '
                                    <div class="row mt-2">
                                    <div class="col-md-12">
                                        <a href="order.php" class="btn btn-dark">Back</a>
                                    </div>
                                    </div>
                                ';                            
                
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?php
                                echo "<div class='row'>";
                                    echo "<div class='col-md-4'>";
                                        echo "<h6>"."Phone:</h6>";
                                        echo "<h6>"."Email:</h6>";
                                        echo "<h6>"."Address:</h6>";
                                    echo "</div>";
                                    echo "<div class='col-md-8'>";
                                        echo "<h6>"."<b>".$userData['phone']."</b>"."</h6>";
                                        echo "<h6>"."<b>".$userData['email']."</b>"."</h6>";
                                        echo "<h6>"."<b>".$userData['address']."</b>"."</h6>";
                                    echo "</div>";
                                echo "</div>";              
                
                            ?>
                        </div>
                        <!-- <div class="col-md-6 d-flex flex-row-reverse mt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="order.php" class='btn btn-warning'>Back</a>
                                </div>
                            </div>
                        </div> -->
                   </div>

                    <!-- Content Row -->
                    <?php
                    if(count($order)>0)
                    {
                    ?>
                   <div class="row mt-5">

                        <div class="col-md-12">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h5 mb-0 text-gray-800">Order Details</h1>
                            </div>
                        </div>
                       
                   </div>
                   
                        <div class="col-md-12">
                        <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-secondary text-white">
                                        <th>Product Name</th>
                                        <th>Product Qty</th>
                                        <th>Product Price</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($int=0;$int<count($order);$int++){
                                            echo "<tr>";
                                            echo "<td>".$order[$int]['name']."</td>";
                                        echo "<td>".$order[$int]['qty']."</td>";
                                        echo "<td>".$order[$int]['price']."</td>";
                                        echo "<td>".$order[$int]['subtotal']."</td>";
                                        echo "</td>";
                                        };
                                    ?>
                                </tbody>                        
                            </table>
                            </div>

                        <?php
                        }
                        ?> 
                
                
        <?php
            if(count($orderdetail)>0)
            {
        ?>
            <div class="row">   
                <div class="col-md-12 mt-5">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h5 mb-0 text-gray-800">Customize Order Details</h1>
                            </div>
                </div>
            </div>   
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="bg-secondary text-white">
                                            <th>Product Name</th>
                                            <th>Product Qty</th>
                                            <th>Product Price</th>
                                            <th>Cream</th>
                                            <th>Dolls</th>
                                            <th>Sizes</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for($int=0;$int<count($orderdetail);$int++){
                                                echo "<tr>";
                                                echo "<td>".$orderdetail[$int]['pname']."</td>";
                                                echo "<td>".$orderdetail[$int]['qty']."</td>";
                                                echo "<td>".$orderdetail[$int]['price']."</td>";
                                                echo "<td>".$orderdetail[$int]['name']."</td>";
                                                echo "<td>".$orderdetail[$int]['type']."</td>";
                                                echo "<td>".$orderdetail[$int]['size']."</td>";
                                                echo "<td>".$orderdetail[$int]['description']."</td>";



                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
        <?php
        }
        ?>
        </div>
                          
            </div>
                
            </div>
            </div>
            <!-- End of Main Content -->

<?php
    include_once 'layout/footer.php';
?>