<?php
    include_once __DIR__ ."/../model/feedback_model.php";

    class feedbacksController extends Feedbacks{
       
       public function Feedbacks()
       {
        $result=$this->getFeedbacks();
        return $result;
       }
       public function addfeedback($name,$email,$address,$rating,$comments)
       {
        $result=$this->updateFeedback($name,$email,$address,$rating,$comments);
        return $result;
       }
       public function getAdminFeedbacks()
       {
        $result=parent::getAdminFeedbacks();
        return $result;
       }
       public function getFeedbackage($page)
       {
        $result=parent::getFeedbackPage($page);
        return $result;
       }

       public function delete($id)
       {
      try{
        $result =  $this->deleteFeedback($id);
        return $result;
      }
      catch(PDOException $e){
        return false;
      }
       }

       public function countFeedback()
       {
        $result=parent::countFeedback();
        return $result;
       }

       
    }
?>