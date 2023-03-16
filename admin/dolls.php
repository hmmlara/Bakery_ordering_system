<?php
ob_start();
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/ingredient_controller.php';

$ingredient_controller = new IngredientController();
$dolls = $ingredient_controller->getDolls();

if(isset($_POST['add_doll'])){
    $error = false;
    if(!empty($_POST['doll_name'])){
    $doll_name = $_POST['doll_name'];
    }else{
    $error = true;
    }if(!empty($_POST['doll_price'])){
    $doll_price = $_POST['doll_price'];
    }else{
    $error = true;
    }
    
    if(!$error){
    $result = $ingredient_controller->addDoll($doll_name, $doll_price);
    if($result)
    {
    header('location:dolls.php');
    
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
                <div class="col-md-8">
                    <div class="d-sm-flex align-items-center justify-space-around mb-4">
                        <a href="ingredients.php" class="btn btn-dark mx-3"><i class="fa fa-angle-left f-5"
                                aria-hidden="true"></i></a>
                        <h1 class="h3 mb-0 text-gray-800">Toys</h1>

                    </div>

                    <div class="row">
                        <table class="table table-striped" id="toy_table" style="width:1250px !important">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>
                                        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal"
                                            data-target="#exampleModal" data-whatever="@mdo">Add Toy</button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel" name="name">Add
                                                            Toys</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Enter
                                                                    Toy's name:</label>
                                                                <input type="text" class="form-control"
                                                                    id="recipient-name" name="doll_name">
                                                                <label for="recipient-name" class="col-form-label">Enter
                                                                    Toy's price:</label>
                                                                <input type="text" class="form-control"
                                                                    id="recipient-name" name="doll_price">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-dismiss="modal" name="close">Close</button>
                                                                <button class="btn btn-success" name="add_doll"
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
                            <tbody id="delete_doll">
                                <?php
                                    for($j = 0; $j < count($dolls); $j++){
                                        echo '<tr>';
                                        echo '<td>' .$dolls[$j]['type']. '</td>';
                                        echo '<td>' .$dolls[$j]['price']. '</td>';
                                        echo "<td id = '" . $dolls[$j]['id'] . "'> 
                                        <a class = 'btn btn-warning mr-3' href='edit_doll.php?id=".$dolls[$j]['id']."'> Edit </a>
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
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
    include_once 'layout/footer.php';
    ?>