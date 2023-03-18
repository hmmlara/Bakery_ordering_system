<?php
    ob_start();
    
    include_once 'layout/header.php';
    include_once __DIR__.'/../controller/customize_order_controller.php';

    

    $customize_orderController=new CustomizeOrderController();
    $orderid=$customize_orderController->getorder();

    if(isset($_POST['confirm'])){
        if(!empty($_POST['start_date'])){
            $start_date=$_POST['start_date'];
        }
        if(!empty($_POST['end_date'])){
            $end_date=$_POST['end_date'];
        }
        
        $orderid=$customize_orderController->getfilters($start_date,$end_date);
    }

    if(isset($_POST['restart'])){
    $orderid=$customize_orderController->getorders();

    }
                                 
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->


            <!-- Content Row -->

            <div class="row">

                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Order</h1>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="date" name="start_date" id="" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="end_date" id="" class="form-control">

                            </div>
                            <div class="col-md-4 text-center">
                                <button class="btn btn-success mx-2" name="confirm"><i
                                        class="fa fa-paper-plane"></i>Confirm</button>
                                <button class="btn btn-danger" name="restart">Restart</button>
                            </div>

                    </form>
                </div>
            </div>


        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-bodered" id="order_table">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>No</th>
                            <th>Order Id</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Customer Name</th>
                            <th>Total Qty</th>
                            <th>Total Balance</th>
                            <th>Promotion</th>
                            <th>Bill</th>
                            <th>Function</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            for($int=0;$int<count($orderid);$int++)
                            {      
                                $dateformat=explode(" ",$orderid[$int]['date']);  
                                echo "<tr>";   
                                echo "<td>". ($int + 1) ."</td>";
                                echo "<td>".$orderid[$int]['id']."</td>";
                                echo "<td>".date_format(date_create($dateformat[0]),' d / M / Y')."</td>";
                                echo "<td>".$dateformat[1]."</td>";
                                echo "<td>".$orderid[$int]['name']."</td>";
                                echo "<td>".$orderid[$int]['total_quantity']."</td>";
                                echo "<td>".$orderid[$int]['total_balance']."</td>";
                                echo "<td>".$orderid[$int]['promotion_amount']."</td>";
                                echo "<td>".$orderid[$int]['bill']."</td>";
                                // echo "<td>".$orderid[$int]['date']."</td>";
                                echo "<td id='".$orderid[$int]['id']."'><a href=view.php?id=".$orderid[$int]['id']." class='btn btn-success'>View</a></td>";

                                echo "</tr>";
                            }
                            ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
</div>

<!-- End of Main Content -->

<?php
    include_once 'layout/footer.php';
?>