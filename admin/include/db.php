<?php
 class Database{
     private static $host="localhost";
     private static $port ="3307";
     private static $dbName="online_cake_store";
     private static $username="root";
     private static $password="";
     private static $cont="";
     public  static function connection()
     {
        if(self::$cont==null)
        {
            try {
                ///Why is not enter Exception and Throw
                    self::$cont=new PDO("mysql:host=".self::$host.";port=".self::$port.";dbname=".self::$dbName,self::$username,self::$password);
                 
                }
                catch(PDOException $e)
                {
                   echo $e->getMessage();
                }
            }
            return self::$cont;
     }
     public static function disconnect()
     {
            self::$cont=null;
     }
 }

?>

