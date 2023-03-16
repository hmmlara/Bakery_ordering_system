<?php
include_once __DIR__."/../controller/category_controller.php";
   $CategoriesController=new categoryController();
if(isset($_POST['id'])){
   $id=$_POST['id'];
   $result=$CategoriesController->deleteCategories($id);
   if($result){
      echo true;
   }else
   {
      echo "fail";
   }
}
?>