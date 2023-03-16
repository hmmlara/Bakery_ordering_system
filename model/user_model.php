<?php
  include_once __DIR__."/../include/db.php";
  class Users{
    private $pdo;

    public function addUser($name,$password,$phone,$address,$email)
    {
      $this->pdo=Database::connection();
      // var_dump($this->pdo);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql="insert into users(name,password,phone,address,email) values (:name,:password,:phone,:address,:email)";//write sql

    $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->bindParam(":name",$name);
        $statement->bindParam(":password",$password);
        $statement->bindParam(":phone",$phone);
        $statement->bindParam(":address",$address);
        $statement->bindParam(":email",$email);
        //$statement->execute();//execute statment

        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    public function checkUserAndPassword($email)
    {
        $this->pdo=Database::connection();//get connection

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//write sql
        
        $sql="select * from users where users.email='$email'";//write sql

        $statement=$this->pdo->prepare($sql);//prepare sql

        $statement->execute();//execute statement

        $result=$statement->fetch(PDO::FETCH_ASSOC);//result

        return $result;
    }

    public function getUserInfo($email)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from users where email=:email";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":email",$email);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    
    public function getUserName($name)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select name from users where name=:name";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function getId($email)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select id from users where email=:email";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":email",$email);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function  setSessionId($user_session_id,$email)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "update users set session_id='".$user_session_id."' 
                where email='".$email."'";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $result;
    }

    public function  getSessionId($id)
    {
        $this->pdo = Database::connection();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select users.session_id from users where users.id='$id'";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(pdo::FETCH_ASSOC)['session_id'];
        return $result;
    }

  }

?>