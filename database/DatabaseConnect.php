<?php

class DatabaseConnect {

    private static $host = "localhost";
    private static $database = "db_itszo";
    private static $user = "root";
    private static $password = "";
    private static $instance = NULL;

    private function __construct() {
        
    }

    public static function getConnection() {
        if (!self::$instance) {
            try {
                self::$instance = mysqli_connect(self::$host, self::$user, self::$password, self::$database);
            } catch (Exception $ex) {
                self::$instance = NULL;
            }
        }
        return self::$instance;
    }

    public static function isConnected() {
        $connected = @mysqli_connect(self::$host, self::$user, self::$password, self::$database);
        return $connected;
    }

    public static function errorConnection() {
        return mysqli_connect_errno();
    }

}
