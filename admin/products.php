<?php
ob_start();
include_once "layout/header.php";
include_once __DIR__."/../controller/product_controller.php";
$productsController=new ProductController();
$products=$productsController->getProducts();
// $result=$productsController->deleteProducts($id);

$result=$productsController->getProductForShow();
?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-600">Products</h1>
                    </div>

               <!-- add Categories -->

                <a type="button" href="create_products.php" class="btn btn-outline-success mb-3">AddProducts</a>
           
                            <!-- End add Categories -->

           <div class="">
              <div class="row">
                <table class="table table-striped" id="product_table" style="width:1250px !important">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>No</th>
                            <th>Categories Name</th>
                            <th>name</th>
                            <th>Photo</th>
                            <th>Prices</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                     <?php
                      for($index=0;$index<count($result);$index++)
                      {
                        echo "<tr>";
                        echo "<td>" . $index +1 ."</td>";
                        echo "<td>".$result[$index]['category_name']."</td>";
                        echo "<td>".$result[$index]['name']."</td>";
                        echo "<td><img src='uploads/".$result[$index]['image']."' height='100px' width='100px'></td>";
                        echo "<td>".$result[$index]['price']."</td>";
                        echo "<td>".$result[$index]['description']."</td>";
                        echo "<td id='".$result[$index]['id']."'>
                            <a class='btn btn-info' href='edit_products.php?id=".$result[$index]['id']."'>Edit</a> 
                            <a class='btn btn-warning delete'>Delete</a></td>";
                        echo"</tr>";  
                      }              
                     ?>
                    </tbody>
                        
                </table>
               
              </div>
             
              </div>
              </div> 
            
      <!-- End the Php -->
            </div>
            
            
         <!-- End of Main Content -->

         <!-- Pagnation -->
         
<?php
    include_once "layout/footer.php";
?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="js/myscript.js"></script>