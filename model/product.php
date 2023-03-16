<?php
include_once __DIR__ . "/../include/db.php";
class Product
{
    private $pdo;

    public function getAllProducts()
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from products ";//join categories where  products.category_id=categories.id
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    
    }

    public function getCustomizeProducts()
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * 
                FROM products 
                WHERE products.category_id=(SELECT categories.id
                                    FROM categories
                                    WHERE categories.name='customize_cake')";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    
    }

    public function getCategoryOfProduct($item)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select products.category_id from products where id=:item";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':item',$item);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    
    }

    public function getImage($product_id)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select products.image from products where id=:product_id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':product_id',$product_id);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    
    }

    public function getProductsForSale() 
    { 
        $this->pdo=Database::connection(); 
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
        $sql=("SELECT products.*,categories.name as category_name 
                FROM products JOIN categories 
                WHERE products.category_id=categories.id AND categories.name!='customize_cake'"); 
        $statement=$this->pdo->prepare($sql); $statement->execute(); 
        $products=$statement->fetchALL(pdo::FETCH_ASSOC); 
        return $products; 
    }
    
    public function getProductName($product_id) 
    { 
        $this->pdo=Database::connection(); 
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
        $sql=("SELECT products.name,products.price FROM products WHERE products.id=$product_id "); 
        $statement=$this->pdo->prepare($sql); $statement->execute(); 
        $products=$statement->fetch(pdo::FETCH_ASSOC); 
        return $products; 
    }

    public function getProductData($item) 
    { 
        $this->pdo=Database::connection(); 
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
        $sql=("SELECT * FROM products WHERE products.id=$item"); 
        $statement=$this->pdo->prepare($sql); $statement->execute(); 
        $image=$statement->fetch(pdo::FETCH_ASSOC); 
        return $image; 
    }
    

         
    
public function getProductsForCarousel()
   {
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=("SELECT products.*,categories.name as category_name 
    FROM products JOIN categories
    WHERE products.category_id=categories.id ");
    $statement=$this->pdo->prepare($sql);
    $statement->execute();
    $products=$statement->fetchALL(pdo::FETCH_ASSOC);
    return $products;
   }

public function getProductForShow()
   {
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=("SELECT products.*,categories.name as category_name 
    FROM products JOIN categories
    WHERE products.category_id=categories.id ");
    $statement=$this->pdo->prepare($sql);
    $statement->execute();
    $products=$statement->fetchALL(pdo::FETCH_ASSOC);
    return $products;
   }

   public function deleteProducts($id)
   {
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=("delete from products where id=:id");
    $statement=$this->pdo->prepare($sql);
    $statement->bindParam(':id',$id);
    if( $statement->execute())
    {
        return true;
    }else
    {
        return false;
    } 
   }
   public function getProductsByCode($id)
   {
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=("SELECT products.*,categories.name as category_name 
    FROM products JOIN categories
    WHERE products.category_id=categories.id AND products.id=:id");
    $statement=$this->pdo->prepare($sql);    
    $statement->bindParam(':id',$id);
    $statement->execute();
    $products=$statement->fetchALL(pdo::FETCH_ASSOC);
    return $products;
   }
   public function editProducts($id)
   {
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=("select * from products where id=:id");
    $statement=$this->pdo->prepare($sql);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $products=$statement->fetchALL(pdo::FETCH_ASSOC);
    return $products;
   }
   public function updateProducts($id,$category_id,$name,$photo,$price,$description)
   {
    $this->pdo=Database::connection();
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=("update  products set category_id=:category_id,name=:name,image=:photo, price=:price , description=:description  where id=:id");
    $statement=$this->pdo->prepare($sql);
    $statement->bindParam(':id',$id);
    $statement->bindParam(':category_id',$category_id);
    $statement->bindParam(':name',$name);
    $statement->bindParam(':photo',$photo);
    $statement->bindParam(':price',$price);
    $statement->bindParam(':description',$description);
    return  $statement->execute();
   }
   public function addProducts($category_id,$name,$photo_name,$price,$description)
    {
         $this->pdo=Database::connection();
         $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         $sql=("insert into products (category_id,name,image,price,description) values (:category_id,:name,:photo_name,:price,:description) ");
         $statement=$this->pdo->prepare($sql);
         $statement->bindParam(':category_id',$category_id);
         $statement->bindParam(':name',$name);
         $statement->bindParam(':photo_name',$photo_name);
         $statement->bindParam(':price',$price);
         $statement->bindParam(':description',$description);
         return  $statement->execute();
   }
}