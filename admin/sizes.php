<?php
ob_start();
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/ingredient_controller.php';

$ingredient_controller = new IngredientController();
$sizes = $ingredient_controller->getSizes();

if(isset($_POST['add_size'])){
    $error = false;
    if(!empty($_POST['size'])){
    $size = $_POST['size'];
    }else{
    $error = true;
    }if(!empty($_POST['size_price'])){
    $size_price = $_POST['size_price'];
    }else{
    $error = true;
    }
    
    if(!$error){
    $result = $ingredient_controller->addSize($size, $size_price);
    if($result)
    {
    header('location:sizes.php');
    
    }
    }
    }
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="d-sm-flex align-items-center justify-space-around mb-4">
                        <a href="ingredients.php" class="btn btn-dark mx-3"><i class="fa fa-angle-left f-5"
                                aria-hidden="true"></i></a>
                        <h1 class="h3 mb-0 text-gray-800">Sizes</h1>

                    </div>
                    
                    <div class="row">
                        <table class="table table-striped" id="size_table" style="width:1250px !important">
                            <thead>
                                <tr>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>
                                        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal"
                                            data-target="#exampleModal" data-whatever="@mdo">Add Size</button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel" name="name">Add
                                                            New Size</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Enter
                                                                    Size in inch:</label>
                                                                <input type="text" class="form-control"
                                                                    id="recipient-name" name="size">
                                                                <label for="recipient-name" class="col-form-label">Fix
                                                                    price:</label>
                                                                <input type="text" class="form-control"
                                                                    id="recipient-name" name="size_price">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-dismiss="modal" name="close">Close</button>
                                                                <button class="btn btn-success" name="add_size"
                                                                    type="submit">Add</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="delete_size">
                                <?php
                                    for($i = 0; $i < count($sizes); $i++){
                                        echo '<tr>';
                                        echo '<td>' .$sizes[$i]['size']. '</td>';
                                        echo '<td>' .$sizes[$i]['price']. '</td>';
                                        echo "<td id = '" . $sizes[$i]['id'] . "'> 
                                        <a class = 'btn btn-warning mr-3' href='edit_size.php?id=".$sizes[$i]['id']."'> Edit </a> 
                                        <button class = 'btn btn-danger delete'> Delete </button>";
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    
    <?php
    include_once 'layout/footer.php';
    ?>