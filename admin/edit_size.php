<?php
ob_start();
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/ingredient_controller.php';

$id = $_GET['id'];
$ingredient_controller = new IngredientController();
$size = $ingredient_controller->getSizeInfo($id);
//var_dump($size);

if (isset($_POST['update'])) {
    if(!empty($_POST['size'])){
        $size = $_POST['size'];
    }if(!empty($_POST['price'])){
        $price = $_POST['price'];
    }

    $result = $ingredient_controller->updateSize($id, $size, $price);
    if($result){
        header('location: sizes.php');
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
                <h1 class="h3 mb-0 text-gray-800">Sizes</h1>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="sizes.php" class="btn btn-primary mb-3">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <form action="" method="post">
                        <div class="mt-3">
                            <label for="size" class="form-label">Size</label>
                            <input type="text" name="size" id="size" class="form-control"
                                value="<?php echo $size['size']; ?>">
                        </div>
                        <div class="mt-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control"
                                value="<?php echo $size['price']; ?>">
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