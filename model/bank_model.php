<?php
include_once __DIR__."/../include/db.php";
class Bank
{
    private $pdo;
    public function checkingCard($card)
    {
        
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT password FROM bank 
                WHERE bank.card_no = '$card'";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    }

    public function gettingAmount($card)
    {        
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT amount FROM bank 
                WHERE bank.card_no = '$card'";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    }

    public function     updatingAmount($updateAmount,$card)
    {        
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE bank 
                SET bank.amount='$updateAmount'
                WHERE bank.card_no = '$card'";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    }
}