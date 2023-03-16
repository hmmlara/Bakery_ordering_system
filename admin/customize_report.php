<?php
ob_start();
    include_once 'layout/header.php';
    include_once __DIR__ . '/../controller/report_controller.php';

    $customize_report = new ReportController();
    $detail = $customize_report->customizeReport();
    //$max = $customize_report->findCustomizeMax();
    //var_dump($max);;
    

    if(isset($_POST['confirm'])){
        $start_date = '';
        $end_date = '';
        if(!empty($_POST['start_date']) && !empty($_POST['end_date'])){
           $start_date = $_POST['start_date'];
           $end_date = $_POST['end_date'];
           $detail = $customize_report->customizeByDate($start_date, $end_date);
        }
        
        
        
    }
    // echo $_POST['cid'];

    if(isset($_POST['restart'])){
        header('location:'.$_SERVER["PHP_SELF"]);
    }
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Report</h1>
                    </div>
                </div>


            </div>
            <form action="" method="post">
                <div class="row mb-2">

                    <div class="col-md-2">
                        <input type="date" name="start_date" id="" class="form-control"
                            value="<?php echo $start_date;?>">
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="end_date" id="" class="form-control" value="<?php echo $end_date;?>">

                    </div>

                    <div class="col-md-5 text-center">
                        <button class="btn btn-success mx-2" name="confirm"><i class="fa fa-paper-plane"></i>Confirm</button>
                        <button class="btn btn-danger" name="restart">Restart</button>
                        <a href="customize_monthly_report.php" class="btn btn-primary">Monthly Report</a>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bodered" id="report_table_one">
                        <thead>
                            <tr class="bg-secondary text-white">
                                <th>Id</th>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $total_qty = 0;
                            $total_prices = 0;
                            
                            for($int=0;$int<count($detail);$int++)
                            {  
                                $dateformat=explode(" ",$detail[$int]['date']);
                                $total_qty += $detail[$int]['qty'];
                                $total_prices += $detail[$int]['subtotal'];
                                 echo "<tr>";   
                                echo "<td>".$detail[$int]['id']."</td>";
                                echo "<td>".$detail[$int]['name']."</td>";
                                echo "<td>".$detail[$int]['qty']."</td>";
                                echo "<td>".$detail[$int]['subtotal']."</td>";
                                echo "<td>".date_format(date_create($dateformat[0]),'d / M / Y')."</td>";
                                echo "<td>".$dateformat[1]."</td>";
                                echo "</tr>";
                            }?>
                        </tbody>
                        <tfoot>

                            <?php
                        echo '<tr>';
                            echo '<td></td>';
                            echo '<td>Total</td>';
                            echo '<td><b>'.$total_qty.'</b></td>';
                            echo '<td><b>'.$total_prices.'</b></td>';
                            echo '<td></td>';
                            echo "</tr>";
                        ?>
                        </tfoot>


                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<?php
    include_once 'layout/footer.php';
?>