<?php
include_once __DIR__."/../include/db.php";

class Admin{
    private $pdo;
    public function getAdminList(){

        $this->pdo=Database::connection();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select * from admins";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $admins=$statement->fetchAll(PDO::FETCH_ASSOC);//result

        return $admins;
    }


    



}

?>