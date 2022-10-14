<?php
DBConnect:: setConnection();

class DBConnect{
    public static $conn;
    public static function setConnection(){
        $host = DB_HOST;
        $dbname = DB_NAME;
            GLOBAL $conn;
            return new PDO("mysql:host=$host;dbname=$dbname", DB_USR, DB_PWD);
    }

}


?>