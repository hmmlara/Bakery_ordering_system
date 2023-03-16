<?php
include_once __DIR__."/../model/category_model.php";

class categoryController extends Category
{
  function getCategory()
  {
    $result=parent::getCategory();
    return $result;
  }

  function getCategoryName($category_id)
  {
    $result=parent::getCategoryName($category_id);
    return $result;
  }
  public function addCategory($name)
  {
     $result=parent::addCategory($name);
     return $result;
  }
  public function deleteCategories($id)
  {
     try{
      $result=parent::deleteCategories($id);
      return $result;
     }
     catch(PDOException $e){
       return false;
     }
  }
  public function getAllCategory()
  {
    $result=parent::getAllCategory();
    return $result;
  }
}

?>