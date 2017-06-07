<?php


namespace Twitter\Model\DBase;


class DBConnect{
    // db settings
    private static $host   = 'localhost';
    private static $user   = 'root';
    private static $dbname = 'twitter';
    private static $pass   = '';
    private static $conn;
    private static $error;

    static function open(){
        // Set DSN
        $dsn = 'mysql: host=' . self::$host . ';dbname=' . self::$dbname;

        // Create a new PDO instanace
        try{
            self::$conn = new \PDO($dsn, self::$user, self::$pass);
        }

            // Catch any errors
        catch(\PDOException $e){
            self::$error = $e->getMessage();
            echo self::$error;
            exit;
        }
        return self::$conn;
    }

    static function close()
    {
        self::$conn= null;
    }
}