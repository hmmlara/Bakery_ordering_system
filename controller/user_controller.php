<?php
    include_once __DIR__ ."/../model/user_model.php";

    class userController extends Users{
       
       public function newUser($name,$password,$phone,$address,$email)
       {
        $result=$this->addUser($name,$password,$phone,$address,$email);
        return $result;
       }

       public function checkUser($email)
       {
        $result=$this->checkUserAndPassword($email);
        return $result;
       }

       public function getUser($email)
       {
        $result=$this->getUserInfo($email);
        return $result;
       }

       public function getName($name)
       {
        $result=$this->getUserName($name);
        return $result;
       }

       public function getCustomerId($email)
       {
        $result=$this->getId($email);
        return $result;
       }

       public function setSessionId($user_session_id,$email)
       {
        $result=parent::setSessionId($user_session_id,$email);
        return $result;
       }

       public function getSessionId($id)
       {
        $result=parent::getSessionId($id);
        return $result;
       }

    }
?>