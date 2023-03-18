<?php
ob_start();
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/report_controller.php';

$customize_report = new ReportController();
    $detail = $customize_report->customizeReport();
    $years = $customize_report->getYear();

if(isset($_POST['confirm'])){
    if($_POST['month']){
        $month = $_POST['month'];
        $detail = $customize_report->customizeByMonth($month);
    }
    if($_POST['year']){
        $year = $_POST['year'];
        $detail = $customize_report->customizeByYear($year);
    }
    if($_POST['month'] && $_POST['year']){
        $detail = $customize_report->customizeByMonthYear($month, $year);
    }
}

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
                        <h1 class="h3 mb-0 text-gray-800">Monthly Report</h1>
                    </div>
                </div>

            </div>

            <form action="" method="post">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <select class="form-control" aria-label="Default select example" name="year" id='select'>
                            <option value="0" selected hidden>Choose Year</option>
                            <?php
                            for ($i = 0; $i < count($years); $i++) {
                                //echo "<option value = '".$years[$i]['year']."'>".$years[$i]['year']."</option>";
                            ?>
                            <option value='<?php echo $years[$i]['year']; ?>' <?php echo (isset($_POST['year']) && $_POST['year'] == $years[$i]['year']) ? 'selected'
                                                                                        : ''; ?>>
                                <?php echo $years[$i]['year']; ?>
                            </option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select class="form-control" aria-label="Default select example" name="month" id='select'>
                            <option value="0" selected hidden>Choose Month</option>
                            <option value="1" <?php echo (isset($month) && $month == 1)? 'selected' : ''; ?>>Jan
                            </option>
                            <option value="2" <?php echo (isset($month) && $month == 2)? 'selected' : ''; ?>>Feb
                            </option>
                            <option value="3" <?php echo (isset($month) && $month == 3)? 'selected' : ''; ?>>Mar
                            </option>
                            <option value="4" <?php echo (isset($month) && $month == 4)? 'selected' : ''; ?>>Apr
                            </option>
                            <option value="5" <?php echo (isset($month) && $month == 5)? 'selected' : ''; ?>>May
                            </option>
                            <option value="6" <?php echo (isset($month) && $month == 6)? 'selected' : ''; ?>>Jun
                            </option>
                            <option value="7" <?php echo (isset($month) && $month == 7)? 'selected' : ''; ?>>Jul
                            </option>
                            <option value="8" <?php echo (isset($month) && $month == 8)? 'selected' : ''; ?>>Aug
                            </option>
                            <option value="9" <?php echo (isset($month) && $month == 9)? 'selected' : ''; ?>>Sep
                            </option>
                            <option value="10" <?php echo (isset($month) && $month == 10)? 'selected' : ''; ?>>Oct
                            </option>
                            <option value="11" <?php echo (isset($month) && $month == 11)? 'selected' : ''; ?>>Nov
                            </option>
                            <option value="12" <?php echo (isset($month) && $month == 12)? 'selected' : ''; ?>>Dec
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success" name="confirm" type="submit"><i
                                class="fa fa-paper-plane"></i>Confirm</button>
                        <button class="btn btn-danger" name="restart">Restart</button>
                        <a class="btn btn-secondary" href="customize_report.php">Back</a>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bodered" id="report_table_four">
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
                                $total_qty += $detail[$int]['qty'];
                                $total_prices += $detail[$int]['subtotal'];
                                $dateformat=explode(" ",$detail[$int]['date']);  
                                echo "<tr>";   
                                echo "<td>".$detail[$int]['id']."</td>";
                                echo "<td>".$detail[$int]['name']."</td>";
                                echo "<td>".$detail[$int]['qty']."</td>";
                                echo "<td>".$detail[$int]['subtotal']."</td>";
                                echo "<td>".date_format(date_create($dateformat[0]),' d / M / Y')."</td>";
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

<!-- End of Main Content -->

<?php
    include_once 'layout/footer.php';
?>