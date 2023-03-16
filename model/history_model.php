<?php
  include_once __DIR__."/../include/db.php";
  class History
  {
    private $pdo;
    public function getAllHistory($cid)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from orders where customer_id = :cid";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':cid', $cid);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getAllHistoryDetail_order($oid)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from order_details where order_id = :oid";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':oid', $oid);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getAllHistoryDetail_customize($oid)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from customize_order_details where order_id = :oid";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':oid', $oid);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }
  }