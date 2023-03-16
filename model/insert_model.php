<?php
include_once __DIR__."/../include/db.php";
class Insert
{
    private $pdo;
    public function addOrder($cid,$total_qty,$total_balance,$promotion_amount,$bill,$date)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into orders
                (customer_id,total_quantity, total_balance, promotion_amount, bill,date) 
                values (:cid,:total_qty,:total_balance,:promotion_amount,:bill,:date)";
        $statement = $this->pdo->prepare($sql);
        //binding parameters
        $statement->bindParam(":cid", $cid);
        $statement->bindParam(":total_qty", $total_qty);
        $statement->bindParam(":total_balance", $total_balance);
        $statement->bindParam(":promotion_amount", $promotion_amount);
        $statement->bindParam(":bill", $bill);
        $statement->bindParam(":date", $date);
        //$statement->execute();
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCategory($pid)
    {        
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT categories.name
                FROM products JOIN categories
                WHERE products.id=$pid AND products.category_id=categories.id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getProductName($pid)
    {        
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT products.name
                FROM products JOIN categories
                WHERE products.id=$pid AND products.category_id=categories.id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    }



    public function getOrder($cid)
    {        
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT orders.id
                FROM orders
                WHERE orders.customer_id=$cid AND date = (SELECT MAX(date) FROM orders WHERE orders.customer_id=$cid)
                ORDER BY customer_id DESC
                LIMIT 1";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    }


    public function addOrder_Detail($order_id,$pid,$qty,$unitPrice,$subtotal)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into order_details
                (order_id,product_id, qty, unit_price, subtotal) 
                values (:order_id,:pid,:qty,:unitPrice,:subtotal)";
        $statement = $this->pdo->prepare($sql);
        //binding parameters
        $statement->bindParam(":order_id", $order_id);
        $statement->bindParam(":pid", $pid);
        $statement->bindParam(":qty", $qty);
        $statement->bindParam(":unitPrice", $unitPrice);
        $statement->bindParam(":subtotal", $subtotal);
        //$statement->execute();
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function addCustomize_Detail($order_id,$pid,$cream_id,$doll_id,$size_id,$discription,$qty,$unitPrice,$subtotal)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into customize_order_details
                (order_id,product_id,cream_id,doll_id,size_id,description,qty,unit_price,subtotal) 
                values (:order_id,:pid,:cream_id,:doll_id,:size_id,:discription,:qty,:unitPrice,:subtotal)";
        $statement = $this->pdo->prepare($sql);
        //binding parameters
        $statement->bindParam(":order_id", $order_id);
        $statement->bindParam(":pid", $pid);
        $statement->bindParam(":cream_id", $cream_id);
        $statement->bindParam(":doll_id", $doll_id);
        $statement->bindParam(":size_id", $size_id);
        $statement->bindParam(":discription", $discription);
        $statement->bindParam(":qty", $qty);
        $statement->bindParam(":unitPrice", $unitPrice);
        $statement->bindParam(":subtotal", $subtotal);
        //$statement->execute();
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    
    
}
?>