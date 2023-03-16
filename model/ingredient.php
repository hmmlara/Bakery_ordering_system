<?php
include_once __DIR__ . "/../include/db.php";
class Ingredient
{
    private $pdo;
    public function getAllCreams()
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from creams";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getAllDolls()
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from dolls";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getAllSizes()
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from sizes";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function addAllIngredient($cid,$cream,$size,$doll,$discription,$product_id)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into customize_orders(customer_id,cream_id, size_id, doll_id, discription,product_id) values (:cid,:cream_id, :size_id, :doll_id, :discription,:product_id)";
        $statement = $this->pdo->prepare($sql);
        //binding parameters
        $statement->bindParam(":cid", $cid);
        $statement->bindParam(":cream_id", $cream);
        $statement->bindParam(":size_id", $size);
        $statement->bindParam(":doll_id", $doll);
        $statement->bindParam(":discription", $discription);
        $statement->bindParam(":product_id", $product_id);
        //$statement->execute();
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCreamPrice($cream)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select creams.price from creams where creams.id=$cream";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getDollPrice($doll)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select dolls.price from dolls where dolls.id=$doll";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getSizePrice($size)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select sizes.price from sizes where sizes.id=$size";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getCreams(){
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from creams";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getSizes(){
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from sizes";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getDolls(){
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from dolls";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function addCream($cream_name, $cream_color, $cream_scent, $cream_taste, $cream_price){
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
        $sql = "insert into creams(name, color, scent, taste, price) values (:name, :color, :scent, :taste, :price)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':name', $cream_name);
        $statement->bindParam(':color', $cream_color);
        $statement->bindParam(':scent', $cream_scent);
        $statement->bindParam(':taste', $cream_taste);
        $statement->bindParam(':price', $cream_price);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCreamInfo($id){
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from creams where id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    }

    public function updateCream($id, $name, $color, $scent, $taste, $price)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_EXCEPTION);
        $sql = "update creams set name = :name, color = :color, scent = :scent, taste = :taste, price = :price where id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':color', $color);
        $statement->bindParam(':scent', $scent);
        $statement->bindParam(':taste', $taste);
        $statement->bindParam(':price', $price);
        return $statement->execute();
    }

    public function deleteCream($id)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from creams where id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addSize($size, $size_price){
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
        $sql = "insert into sizes(size, price) values (:size, :size_price)";
        $statement = $this->pdo->prepare($sql);
       $statement->bindParam(':size', $size);
       $statement->bindParam(':size_price', $size_price);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getSizeInfo($id){
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from sizes where id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    }

    public function updateSize($id, $size, $price)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_EXCEPTION);
        $sql = "update sizes set size = :size, price = :price where id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':size', $size);
        $statement->bindParam(':price', $price);
        return $statement->execute();
    }

    public function deleteSize($id)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from sizes where id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addDoll($doll_name, $doll_price){
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
        $sql = "insert into dolls(type, price) values (:doll_name, :doll_price)";
        $statement = $this->pdo->prepare($sql);
       $statement->bindParam(':doll_name', $doll_name);
       $statement->bindParam(':doll_price', $doll_price);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getDollInfo($id){
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from dolls where id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    }

    public function updateDoll($id, $type, $price)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_EXCEPTION);
        $sql = "update dolls set type = :type, price = :price where id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':type', $type);
        $statement->bindParam(':price', $price);
        return $statement->execute();
    }

    public function deleteDoll($id)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from dolls where id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}