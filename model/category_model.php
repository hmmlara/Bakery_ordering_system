<?php
include_once __DIR__."/../include/db.php";
class Category
{
    private $pdo;
    public function getCategory()
    {
        
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM categories 
                WHERE categories.name != 'customize_cake'";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getAllCategory()
    {
        
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM categories";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }
    
    public function getCategoryName($category_id)
    {
        
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT name FROM categories where id=$category_id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getCat()
    {
      $this->pdo=Database::connection();
      // var_dump($this->pdo);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql=("SELECT * FROM `categories` 
      ORDER BY name ASC ");
      $statement=$this->pdo->prepare($sql);
      $statement->execute();
      $category=$statement->fetchALL(pdo::FETCH_ASSOC);
      return $category;
    }

    public function getCategoryPage($page)
    {
      $items_per_page=5;
      $offset=($page-1) *$items_per_page;
      $this->pdo=Database::connection();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql=("select * from categories limit $offset,$items_per_page");
      $statement=$this->pdo->prepare($sql);
      $statement->execute();
      $category=$statement->fetchALL(pdo::FETCH_ASSOC);
      return $category;
    }
    public function addCategory($name)
    {
      $this->pdo=Database::connection();
      // var_dump($this->pdo);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql=("insert into categories(name) values (:name) ");
      $statement=$this->pdo->prepare($sql);
      $statement->bindParam(':name',$name);
     return  $statement->execute();
    
    }
    public function deleteCategories($id)
    {
          $this->pdo=Database::connection();
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $sql=("delete from categories where id=:id ");
          $statement=$this->pdo->prepare($sql);
          $statement->bindParam(':id',$id);
          
          return $statement->execute();
    }
 
}

?>