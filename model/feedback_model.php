<?php
  include_once __DIR__."/../include/db.php";
  class Feedbacks{
    private $pdo;
    public function getFeedbacks()
    {
      $this->pdo=Database::connection();
      // var_dump($this->pdo);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql=("SELECT * FROM `feedbacks` WHERE rating=4 or rating=5");
      $statement=$this->pdo->prepare($sql);
      $statement->execute();
      $products=$statement->fetchALL(pdo::FETCH_ASSOC);
      return $products;
    }
    public function updateFeedback($name,$email,$address,$rating,$comments)
    {
      $this->pdo=Database::connection();
      // var_dump($this->pdo);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql=("INSERT INTO feedbacks (name,email,address,rating,comments) VALUES (:name,:email,:address,:rating,:comments)");
      $statement=$this->pdo->prepare($sql);
      $statement->bindParam(":name",$name);
      $statement->bindParam(":email",$email);
      $statement->bindParam(":address",$address);
      $statement->bindParam(":rating",$rating);
      $statement->bindParam(":comments",$comments);
      if($statement->execute())
      {
         return true;
      } else
      {
        return false;
      }
    }
    public function getAdminFeedbacks()
    {
      $this->pdo=Database::connection();
      // var_dump($this->pdo);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql=("select * from feedbacks");
      $statement=$this->pdo->prepare($sql);
      $statement->execute();
      $products=$statement->fetchALL(pdo::FETCH_ASSOC);
      return $products;
    }
    public function getFeedbackPage($page)
    {
      $items_per_page=5;
      $offset=($page-1) *$items_per_page;
      $this->pdo=Database::connection();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql=("select * from feedbacks limit $offset,$items_per_page");
      $statement=$this->pdo->prepare($sql);
      $statement->execute();
      $products=$statement->fetchALL(pdo::FETCH_ASSOC);
      return $products;
    }

    public function deleteFeedback($id)
    {
      $this->pdo = Database::connection();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "delete from feedbacks where id = :id";
      $statement = $this->pdo->prepare($sql);
      $statement->bindParam(":id", $id);
      if ($statement->execute()) {
          return true;
      } else {
          return false;
      }
    }
    public function countFeedback()
    {
      $this->pdo=Database::connection();
      // var_dump($this->pdo);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql=("SELECT COUNT(id) as count_id FROM `feedbacks` ");
      $statement=$this->pdo->prepare($sql);
      $statement->execute();
      $products=$statement->fetch(pdo::FETCH_ASSOC);
      return $products;
    }
  }

?>