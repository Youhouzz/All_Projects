<?php
class Connect{
    private static $db = null;

    public function __construct()
    {   try{
            self::$db = new PDO("mysql:host=localhost;dbname=recettes", "root","");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
        
    }

    public static function dbConnect() {
        if(self:: $db != null){
            return self ::$db;
        }else{
            new self();
            return self::$db;
        }
        
    }
}