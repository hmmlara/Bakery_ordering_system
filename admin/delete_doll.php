<?php
ob_start();
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/ingredient_controller.php';

$id = $_POST['id'];
$ingredient_controller = new IngredientController();
$delete_doll = $ingredient_controller->deleteDoll($id);
if ($delete_doll) {
    echo "success";
} else {
    echo "fail";
}
?>