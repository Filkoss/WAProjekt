<?php
class Database {
    private static $instance = null;
    public static function getInstance() {

        if (self::$instance === null) {

            self::$instance = new self();
        }

        return self::$instance;
    }

    public function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "trapovejgulas";
        $database = "novotny";

        $conn = mysqli_connect($servername, $username, $password, $database);


        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        return $conn;
    }
}

$db = Database::getInstance();


$conn = $db->connect();
?>
