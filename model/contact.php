<?php
include_once __DIR__ . "/../include/db.php";
class Contact
{
    private $pdo;
    public function addForContact($name,$email,$message)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into contacts(name, email, message) values (:name, :email, :message)";
        $statement = $this->pdo->prepare($sql);
        //binding parameters
        $statement->bindParam(":name", $name);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":message", $message);
        //$statement->execute();

        if ($statement->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function getContactPage($page)
    {
      $items_per_page=5;
      $offset=($page-1) *$items_per_page;
      $this->pdo=Database::connection();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql=("select * from contacts limit $offset,$items_per_page");
      $statement=$this->pdo->prepare($sql);
      $statement->execute();
      $products=$statement->fetchALL(pdo::FETCH_ASSOC);
      return $products;
    }

    public function getContacts()
    {
      $this->pdo=Database::connection();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql=("select * from contacts");
      $statement=$this->pdo->prepare($sql);
      $statement->execute();
      $products=$statement->fetchALL(pdo::FETCH_ASSOC);
      return $products;
    }

}

?>