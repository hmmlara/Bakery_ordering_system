<?php
include_once __DIR__ . "/../include/db.php";
class Baker
{
    private $pdo;
    public function bakerInfo()
    {
        //1. get connection
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2. write sql
        $sql = "Select * from bakers where position like 'certified%'";

        //3. prepare sql
        $statement = $this->pdo->prepare($sql);

        //4. execute statement
        $statement->execute();

        //5. result
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getAllBakerInfo()
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from bakers";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function newBaker($name, $position, $note, $photo)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into bakers(name, position, note, image) values (:name, :position, :note, :image)";
        $statement = $this->pdo->prepare($sql);
        //binding parameters
        $statement->bindParam(":name", $name);
        $statement->bindParam(":position", $position);
        $statement->bindParam(":note", $note);
        $statement->bindParam(":image", $photo);
        //$statement->execute();

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getBakerInfo($id)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * from bakers where id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC);
        return $result;
    }

    public function updateBakerInfo($id, $name, $position, $note, $image)
    {
        //1. get connection
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //2. write sql
        $sql = "update bakers set name = :name, position = :position, note = :note, image = :image where id = :id";

        //3. prepare sql
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":name", $name);
        $statement->bindParam(":position", $position);
        $statement->bindParam(":note", $note);
        $statement->bindParam(":image", $image);

        //4. execute statement
        return $statement->execute();
    }

    public function deleteBakerInfo($id)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from bakers where id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>