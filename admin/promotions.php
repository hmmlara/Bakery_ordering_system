<?php
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/promotion_controller.php';

$promotionController = new PromotionController();
$promotions = $promotionController->Promotions();

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Customer</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div> -->

            <div class="row">
                <div class="col-md-6">
                    <a href="add_promotions.php" class="btn btn-primary mb-3">Add new promotion</a>
                </div>
            </div>


            <!-- Content Row -->
            <div class="row">
                <table class="table table-striped" id="promotion_table" style="width:1250px !important">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>No</th>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Discount Percentage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id='delete_promotions'>
                    <?php
                    for ($row = 0; $row < count($promotions); $row++) {
                        echo '<tr>';
                        echo "<td>". 1+$row ."</td>";
                        echo '<td>' . $promotions[$row]['name'] . '</td>';
                        echo '<td>' . $promotions[$row]['start_date'] . '</td>';
                        echo '<td>' . $promotions[$row]['end_date'] . '</td>';
                        echo '<td>' . $promotions[$row]['percentage'] . '</td>';
                        echo "<td id='".$promotions[$row]['id']."'> <a class = 'btn btn-warning mr-3' href='edit_promotion.php?id=" . $promotions[$row]['id'] . "'> Edit </a>
                              <a class = 'delete btn btn-danger'> Delete </a>";
                        echo '</tr>';
                    }
                    ?>
                    </tbody>


                </table>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    include_once 'layout/footer.php';
    ?>