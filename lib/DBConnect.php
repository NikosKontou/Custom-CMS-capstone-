<?php
//call the function to initialise the PDO
DBConnect:: setConnection();

class DBConnect{
    public static $conn;
    public static function setConnection(){
//        get the host and db name from the configuration file
        $host = DB_HOST;
        $dbname = DB_NAME;
            GLOBAL $conn;
            return new PDO("mysql:host=$host;dbname=$dbname", DB_USR, DB_PWD);
    }

}


?>