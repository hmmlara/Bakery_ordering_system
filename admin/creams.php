<?php
ob_start();
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/ingredient_controller.php';

$ingredient_controller = new IngredientController();
$creams = $ingredient_controller->getCreams();

if(isset($_POST['add_cream'])){
    $error = false;
    if(!empty($_POST['cream_name'])){
    $cream_name = $_POST['cream_name'];
    }else{
    $error = true;
    }if(!empty($_POST['cream_color'])){
    $cream_color = $_POST['cream_color'];
    }else{
    $error = true;
    }if(!empty($_POST['cream_scent'])){
    $cream_scent = $_POST['cream_scent'];
    }else{
    $error = true;
    }if(!empty($_POST['cream_taste'])){
    $cream_taste = $_POST['cream_taste'];
    }else{
    $error = true;
    }if(!empty($_POST['cream_price'])){
    $cream_price = $_POST['cream_price'];
    }else{
    $error = true;
    }
    
    if(!$error){
    $result = $ingredient_controller->addCream($cream_name, $cream_color, $cream_scent, $cream_taste, $cream_price);
    if($result){
    header('location:creams.php');
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


            <!-- Content Row -->
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="d-sm-flex align-items-center justify-space-around mb-4">
                        <a href="ingredients.php" class="btn btn-dark mx-3"><i class="fa fa-angle-left f-5"
                                aria-hidden="true"></i></a>
                        <h1 class="h3 mb-0 text-gray-800">Creams</h1>

                    </div>

                    <div class="row">
                        <table class="table table-striped" id="cream_table" style="width:1250px !important">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Color</th>
                                    <th>Scent</th>
                                    <th>Taste</th>
                                    <th>Price</th>
                                    <th>
                                        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal"
                                            data-target="#exampleModal" data-whatever="@mdo">Add new cream
                                            type</button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel" name="name">Add
                                                            Cream</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Enter
                                                                    Cream Name:</label>
                                                                <input type="text" class="form-control" id="recipient-name"
                                                                    name="cream_name">
                                                                <label for="recipient-name" class="col-form-label">Enter
                                                                    Cream Color:</label>
                                                                <input type="text" class="form-control" id="recipient-name"
                                                                    name="cream_color">
                                                                <label for="recipient-name" class="col-form-label">Enter
                                                                    Cream Scent:</label>
                                                                <input type="text" class="form-control" id="recipient-name"
                                                                    name="cream_scent">
                                                                <label for="recipient-name" class="col-form-label">Enter
                                                                    Cream taste:</label>
                                                                <input type="text" class="form-control" id="recipient-name"
                                                                    name="cream_taste">
                                                                <label for="recipient-name" class="col-form-label">Enter
                                                                    Cream Price:</label>
                                                                <input type="text" class="form-control" id="recipient-name"
                                                                    name="cream_price">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-dismiss="modal" name="close">Close</button>
                                                                <button class="btn btn-success" name="add_cream"
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
                            <tbody id="delete_cream">
                                <?php
                                        for($row = 0; $row < count($creams); $row++){
                                            echo '<tr>';
                                            echo '<td>' .$creams[$row]['name']. '</td>';
                                            echo '<td>' .$creams[$row]['color']. '</td>';
                                            echo '<td>' .$creams[$row]['scent']. '</td>';
                                            echo '<td>' .$creams[$row]['taste']. '</td>';
                                            echo '<td>' .$creams[$row]['price']. '</td>';
                                            echo "<td id = '" . $creams[$row]['id'] . "'> 
                                <a class = 'btn btn-warning mr-3' href='edit_cream.php?id=".$creams[$row]['id']."'> Edit </a> 
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