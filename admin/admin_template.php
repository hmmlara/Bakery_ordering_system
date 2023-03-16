<?php
ob_start();
  session_start();
  if(!isset($_SESSION['user'])) 
  {
    header('location:index.php');
    exit();
  }
    include_once "layout/header.php";
    include_once __DIR__."/../controller/feedback_controller.php";
    include_once __DIR__."/../controller/customize_order_controller.php";
    include_once __DIR__."/../controller/report_controller.php";

    
    $reportController=new ReportController();
    $totalAmountForOrder=$reportController->totalPriceForOrder();
    $totalAmountForCustomizeOrder=$reportController->totalPriceForCustomizeOrder();
    //echo ($totalAmountForOrder['SUM(order_details.subtotal)']);

    $years = $reportController->getYear();

    $customize_order_controller=new CustomizeOrderController();
    $counteOrder=$customize_order_controller->countOrders();
   

    $feedbacksController=new feedbacksController();
    $countFeedbacks=$feedbacksController->countFeedback();

    if(isset($_POST['year']))
    {
        $bargraph=$customize_order_controller->bargraph($_POST['year']);
        $bargraphIncome=$customize_order_controller->bargraphIncome($_POST['year']);
        $pie=$customize_order_controller->pieChartData($_POST['year']);
        $pieCustomize=$customize_order_controller->pieChartDataCustomize($_POST['year']);
    }
    else
    {
        $year=date('Y');
        $bargraph=$customize_order_controller->bargraph($year);
        $bargraphIncome=$customize_order_controller->bargraphIncome($year);
        $pie=$customize_order_controller->pieChartData($year);
        $pieCustomize=$customize_order_controller->pieChartDataCustomize($year);
    }
    
    if(isset($_POST['restart'])){
        header('location:'.$_SERVER["PHP_SELF"]);
    }

    //order_qty
    foreach($bargraph as $data)
    {
        $month[]=$data['monthname'];
        $total_qty[]=$data['toal_qty'];
    }

    //income
    foreach($bargraphIncome as $data)
    {
        $monthIncome[]=$data['monthname'];
        $total_balance[]=$data['total_balance'];

    }

    //product
    foreach($pie as $data)
    {
        $count[]=$data['count'];
        $productName[]=$data['product_name'];
    }

    //customize_product
    foreach($pieCustomize as $data)
    {
        $countCustomize[]=$data['count'];
        $customizeProductName[]=$data['product_name'];
    }
    
 
?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-warning">Onlie Bakery <sup>Store</sup></h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> <a href="order.php" style="text-decoration: none;"> Orders </a>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php  echo $counteOrder['count_order']; ?></div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: <?php echo $counteOrder['count_order'];?>%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <a href="reports.php" style="text-decoration: none;">  Sales Report </a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalAmountForOrder['SUM(order_details.subtotal)']; ?> MMK</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                           <a href="customize_report.php" style="text-decoration: none;"> Customize Sales Report</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalAmountForCustomizeOrder['SUM(customize_order_details.subtotal)']; ?> MMK</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Pending Requests Card Example -->

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                           <a href="feedback.php" style="text-decoration: none;">FeedBakcs </a> </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countFeedbacks['count_id'] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Content Row -->
        <div class="container mt-5">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">                    
                    <select class="form-control" aria-label="Default select example" name="year" id='select'>
                            <option value="0">Choose Year</option>
                            <?php
                            for ($i = 0; $i < count($years); $i++) {
                                //echo "<option value = '".$years[$i]['year']."'>".$years[$i]['year']."</option>";
                            ?>
                                <option value='<?php echo $years[$i]['year']; ?>' 
                                    <?php echo (isset($_POST['year']) && $_POST['year'] == $years[$i]['year']) ? 'selected'
                                    : ''; ?>><?php echo $years[$i]['year']; ?>
                                </option>
                            <?php
                            }

                            ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-success mx-2" name="confirm"><i class="fa fa-paper-plane"></i>Confirm</button>
                        <button class="btn btn-danger" name="restart">Restart</button>
                    </div>
                </div>
            </form>


            <div class="row mt-5 mb-5">
                <div class="col-lg-6">
                    <div>
                        <h4>Orders</h4>
                        <canvas id="myChart"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                             var ctx = document.getElementById('myChart');

                             new Chart(ctx, {
                               type: 'bar',
                               data: {
                                 labels: <?php echo json_encode($month) ?>,
                                 datasets: [{
                                   label: 'orders',
                                   data: <?php echo json_encode($total_qty) ?>,
                                   borderWidth: 1
                                 }]
                               },
                               options: {
                                 scales: {
                                   y:{
                                     beginAtZero: true,

                                   },
                                 }
                               }
                             });
                        </script>
                </div>
                <div class="col-lg-6">
                    <div>
                        <h4>Incomes</h4>
                        <canvas id="hi"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                             var ctx = document.getElementById('hi');
                             console.log(ctx);
                             new Chart(ctx, {
                               type: 'line',
                               data: {
                                 labels: <?php echo json_encode($monthIncome) ?>,
                                 datasets: [
                                {
                                    label: 'incomes',
                                   data: <?php echo json_encode($total_balance) ?>,
                                   borderWidth: 1 
                                }]
                               },
                               options: {
                                 scales: {
                                   y:{
                                     beginAtZero: true,

                                   },
                                 }
                               }
                             });

                        </script>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6">
                    <div>
                        <h4>Products</h4>
                        <canvas id="myPie"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                             var ctx = document.getElementById('myPie');

                             new Chart(ctx, {
                               type: 'doughnut',
                               data: {
                                 labels: <?php echo json_encode($productName) ?>,
                                 datasets: [{
                                   label: 'counts',
                                   data: <?php echo json_encode($count) ?>,
                                   borderWidth: 1
                                 }]
                               },
                               options: {
                                 scales: {
                                   y:{
                                     beginAtZero: true,

                                   },
                                 }
                               }
                             });
                        </script>
                </div>
                <div class="col-lg-6">
                    <div>
                        <h4>Customize Products</h4>
                        <canvas id="myPieCustomize"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                             var ctx = document.getElementById('myPieCustomize');

                             new Chart(ctx, {
                               type: 'doughnut',
                               data: {
                                 labels: <?php echo json_encode($customizeProductName) ?>,
                                 datasets: [{
                                   label: 'counts',
                                   data: <?php echo json_encode($countCustomize) ?>,
                                   borderWidth: 1
                                 }]
                               },
                               options: {
                                 scales: {
                                   y:{
                                     beginAtZero: true,

                                   },
                                 }
                               }
                             });
                        </script>
                </div>
            </div>
            
        </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
    <?php
      include_once "layout/footer.php";
    ?>