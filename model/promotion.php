<?php
include_once __DIR__ . '/../include/db.php';

class Promotion
{
    private $pdo;
    public function promoInfo()
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from promotions";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function newPromotion($name, $percentage, $start_date, $end_date)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
        $sql = "insert into promotions(name, percentage, start_date, end_date) values (:name, :percentage, :start_date, :end_date)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':percentage', $percentage);
        $statement->bindParam(':start_date', $start_date);
        $statement->bindParam(':end_date', $end_date);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPromotionInfo($id)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from promotions where id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    }

    public function updatePromotionInfo($id, $name, $percentage, $start_date, $end_date)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_EXCEPTION);
        $sql = "update promotions set name = :name, percentage = :percentage, start_date = :start_date, end_date = :end_date where id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':percentage', $percentage);
        $statement->bindParam(':start_date', $start_date);
        $statement->bindParam(':end_date', $end_date);
        return $statement->execute();
    }

    public function deletePromotionInfo($id)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from promotions where id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getTodayPromotion()
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select promotions.percentage from promotions where start_date<=CURDATE() && CURDATE()<=end_date";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    }
    
}
?>