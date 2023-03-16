<?php

require_once dirname(__DIR__) . '/controller/feedback_controller.php';

$id = $_POST['id'];
$feedbackController = new feedbacksController();
$result = $feedbackController->delete($id);
if($result){
    echo 'success';
}else{
    echo 'fail';
}

?>