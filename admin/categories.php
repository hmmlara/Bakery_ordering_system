<?php
ob_start();
include_once "layout/header.php";

include_once __DIR__."/../controller/category_controller.php";
 $categoryController=new categoryController();
 $category=$categoryController->getAllCategory();

if(isset($_POST['submit']))
{
    $error=false;
    if(!empty($_POST['category_name']))
    {
        $name=$_POST['category_name'];
    }else
    {
        $error=true;
    }
    if(empty($error))
    {
      $result=$categoryController->addCategory($name);
      
      if($result)
      {
        header('location:categories.php');
      }
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
                        <h1 class="h3 mb-0 text-gray-600">Categories</h1>
                    </div>

               <!-- add Categories -->

                <button type="button" class="btn btn-outline-success mb-3" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >AddCategory</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" name="name">Add Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post">
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Enter Categories Name:</label>
                            <input type="text" class="form-control" id="recipient-name" name="category_name">
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" name="close">Close</button>
                              <button  class="btn btn-outline-success" name="submit" type="submit">Add</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                            <!-- End add Categories -->

           <div class="">
              <div class="row">
                <table class="table table-striped" id="category_table" style="width:1250px !important">
                    <thead>
                      <tr class="bg-secondary text-white">
                        <th>No</th>
                        <th>Categories id</th>
                        <th>name</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody id="tbody">
                    <?php
                      //  $items_per_page=5;
                      //  $number=1+($page-1) * $items_per_page;
                    for($i=0;$i<count($category);$i++)
                    {
                      
                      ?>
                      <?php
                        echo "</tr>";
                        echo "<td>". 1+$i ."</td>";
                        echo "<td>".$category[$i]['id']."</td>";
                        echo "<td>".$category[$i]['name']."</td>";
                        echo "<td id='".$category[$i]['id']."'><a class='btn btn-warning deletebtn'>Delete</a></td>";
                        echo "</tr>";
                    }
                     ?>
                    </tbody>
                        
                </table>
               
              </div>
             
              </div>
              </div> 
            
      <!-- End the Php -->
            </div>
            
            <div class="d-flex justify-content-center">
               <!--  -->
              </div>
       
         <!-- End of Main Content -->
<?php
    include_once "layout/footer.php";
?>