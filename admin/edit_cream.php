<?php
ob_start();
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/ingredient_controller.php';

$id = $_GET['id'];
$ingredient_controller = new IngredientController();
$cream = $ingredient_controller->getCreamInfo($id);
//var_dump($cream);

if (isset($_POST['update'])) {
    if (!empty($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (!empty($_POST['color'])) {
        $color = $_POST['color'];
    }
    if (!empty($_POST['scent'])) {
        $scent = $_POST['scent'];
    }
    if (!empty($_POST['taste'])) {
        $taste = $_POST['taste'];
    }
    if (!empty($_POST['price'])) {
        $price = $_POST['price'];
    }
    
    $result = $ingredient_controller->updateCream($id, $name, $color, $scent, $taste, $price);
    if($result){
        header('location: creams.php');
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
                <h1 class="h3 mb-0 text-gray-800">Creams</h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="creams.php" class="btn btn-primary mb-3">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <form action="" method="post">
                        <div class="mt-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="<?php echo $cream['name']; ?>">
                        </div>
                        <div class="mt-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" name="color" id="color" class="form-control"
                                value="<?php echo $cream['color']; ?>">
                        </div>
                        <div class="mt-3">
                            <label for="scent" class="form-label">Scent</label>
                            <input type="text" name="scent" id="scent" class="form-control"
                                value="<?php echo $cream['scent'] ?>">
                        </div>
                        <div class="mt-3">
                            <label for="taste" class="form-label">Taste</label>
                            <input type="text" name="taste" id="taste" class="form-control"
                                value="<?php echo $cream['taste'] ?>">
                        </div>
                        <div class="mt-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" id="price" class="form-control"
                                value="<?php echo $cream['price'] ?>">
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