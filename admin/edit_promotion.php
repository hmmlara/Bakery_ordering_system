<?php
ob_start();
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/promotion_controller.php';

$id = $_GET['id'];
$promotionController = new PromotionController();
$promotion = $promotionController->getPromotion($id);

if (isset($_POST['update'])) {
    if (!empty($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (!empty($_POST['percentage'])) {
        $percentage = $_POST['percentage'];
    }
    if (!empty($_POST['start_date'])) {
        $start_date = $_POST['start_date'];
    }
    if (!empty($_POST['end_date'])) {
        $end_date = $_POST['end_date'];
    }
    $result = $promotionController->updatePromotion($id, $name, $percentage, $start_date, $end_date);
    if ($result) {
        header('location: promotions.php');
    }

}


?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Promotion</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="promotions.php" class="btn btn-primary mb-3">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <form action="" method="post">
                        <div class="mt-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="<?php echo $promotion['name']; ?>" required>
                        </div>
                        <div class="mt-3">
                            <label for="percentage" class="form-label">Percentage</label>
                            <input type="number" name="percentage" id="percentage" class="form-control"
                                value="<?php echo $promotion['percentage']; ?>" required>
                        </div>
                        <div class="mt-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control"
                                value="<?php echo $promotion['start_date']; ?>" required>
                        </div>
                        <div class="mt-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control"
                                value="<?php echo $promotion['end_date']; ?>" required>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>




        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    include_once 'layout/footer.php';
    ?>