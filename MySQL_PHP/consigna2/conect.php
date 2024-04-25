<?php
$servername = "localhost"; // 127.0.0.1
$username = "root";
$password = "";
$port = 3306;
$db = "stock";

try {
    $conn = new \PDO("mysql:host=$servername;port=$port;dbname=" . $db . ";charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
    die(); // exit;
}
?>