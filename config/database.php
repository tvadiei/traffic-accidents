<?php
class Database {
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "Toktam82@";
    private static $dbname = "traffic_db";
    private static $conn = null;

    public static function connect() {
        if (self::$conn === null) {
            self::$conn = new mysqli(self::$host, self::$user, self::$pass, self::$dbname);
            if (self::$conn->connect_error) {
                die("Database connection failed: " . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }
}
?>
