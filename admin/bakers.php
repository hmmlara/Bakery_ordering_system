<?php
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/baker_controller.php';

$bakerController = new BakerController();
$bakers = $bakerController->getAllBakers();

//var_dump($bakers);

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

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-600">Bakers</h1>
            </div>   
            <div class="row">
                <div class="col-md-6">
                    <a href="create_baker.php" class="btn btn-primary mb-3">Add new baker</a>
                </div>
            </div>


            <!-- Content Row -->
            <div class="row">
                <table class="table table-striped" id="baker_table" style="width:1250px !important">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Note</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody id="delete_baker">
                    <?php
                    for ($row = 0; $row < count($bakers); $row++) {
                        echo "<tr>";
                        echo "<td>". 1+$row ."</td>";
                        echo "<td><img src='uploads/".$bakers[$row]["image"]."' height='50px' width='50px'></td>";
                        echo "<td>" . $bakers[$row]["name"] . "</td>";
                        echo "<td>" . $bakers[$row]["position"] . "</td>";
                        echo "<td>" . $bakers[$row]["note"] . "</td>";
                        echo "<td id='".$bakers[$row]["id"]."'> <a class = 'btn btn-warning mr-3' href='edit_baker.php?id=" . $bakers[$row]['id'] . "'> Edit </a>
                                <button class='btn btn-danger delete'>Delete</button>";
                        echo "</tr>";
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