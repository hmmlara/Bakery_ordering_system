<?php
include_once 'controller/product_controller.php';

$productController = new ProductController();
$results= $productController->getProducts();

if(isset($_POST['value'])){

    if($_POST['value'] == 0){
        $data = $results;
    }
    else{
        $data=array_values(array_filter($results,function($value){
            if($value['category_id']==$_POST['value']){
                return $value;
            }
        }));
    }
    echo json_encode($data);
}
else{
    echo "Not Found";
}
?>