<?php
ob_start();
include_once __DIR__ . '/../controller/baker_controller.php';


$bakerController = new BakerController();
$id = $_POST['id'];
$result = $bakerController->deleteBaker($id);
if ($result) {
    echo "success";
} else {
    echo "fail";
}
?>