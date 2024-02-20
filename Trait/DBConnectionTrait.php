<?php

trait DBConnectionTrait
{
    public function connect()
    {
        $host = 'localhost';
        $dbname = 'only_php_task';
        $user = 'root';
        $pass = '';

        
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
}