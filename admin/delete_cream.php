<?php
ob_start();
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/ingredient_controller.php';

$id = $_POST['id'];
$ingredient_controller = new IngredientController();
$delete_cream = $ingredient_controller->deleteCream($id);
if ($delete_cream) {
    echo "success";
} else {
    echo "fail";
}
?>