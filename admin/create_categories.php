<?php
include_once "layout/header.php";
include_once __DIR__."/../controller/category_controller.php";
$categoryController=new categoryController();

if(isset($_POST['submit']))
{
    $error=false;
    if(!empty($_POST['name']))
    {
        $name=$_POST['name'];
    }else
    {
        $error=true;
    }
    if(empty($error))
    {
      $result=$categoryController->addCategory($name);
      return $result;
      if($result)
      {
        header('location:categories.php');
      }
    }

}

?>
  
                  <!-- Begin Page Content -->
         <div class="container-fluid">
  
                      <!-- Page Heading -->
                      <div class="d-sm-flex align-items-center justify-content-between mb-4">
                          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                  class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                      </div>
                 <!-- Start PHP -->
                 <div>
                  <a href="categories.php" class="btn btn-primary">Back</a>
                 </div>
               <div class="container">

            <form action="" method="post">
                   <div>
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" id="" class="form-control">
                   </div>
                 <div>
                    <button type="submit" name="add" class="btn btn-success mt-4">Add</button>
                </div>
            </form>
         </div>
              </div>


<?php

include_once "layout/footer.php";
?>