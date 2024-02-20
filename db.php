<?php

// class Database{
//     private $dsn = 'mysql:host=localhost; dbname=only_php_task';
//     private $user = 'root';
//     private $password = '';
//     public $conn;

//     public function __construct(){
//         try {
//             $this->conn = new PDO($this->dsn, $this->user, $this->password);
//             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             echo 'Successfully connected';
//         } catch (PDOException $e) {
//             echo 'Connection failed: ' . $e->getMessage();
//         }
//     }

// }

// $pdo = new Database();
$host = 'localhost';
$dbname = 'only_php_task';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
return $pdo;