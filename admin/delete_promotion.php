<?php
ob_start();
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/promotion_controller.php';

$id = $_POST['id'];
$promotionController = new PromotionController();
//$promotion = $promotionController->getPromotion($id);
$result = $promotionController->deletePromotion($id);
if ($result) {
    echo "success";
} else {
    echo "fail";
}
?>