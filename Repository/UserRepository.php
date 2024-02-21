<?php

namespace UserRepository;

require_once __DIR__ . '/../Interface/BaseInterface.php';
require_once __DIR__ . '/../Trait/DBConnectionTrait.php';
session_start();
// var_dump($_SESSION['username']);
use BaseInterface\BaseInterface;
use DBConnectionTrait;

class UserRepository implements BaseInterface
{
    use DBConnectionTrait;
    public $pdo;
    public function __construct()
    {
        $this->pdo = $this->connect();
    }
    public function create(array $data)
    {
        
    }
    public function getById($id)
    {
        
    }
    public function paginate($id)
    {

    }
    // public function getRole(){
    //     $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = " .$_SESSION['username']);
    //     $userRole = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    //     var_dump($userRole);
    //     while ($userRole) {
    //         $role = $userRole['role'];
    //         return $role;
    //     }
    // }
    public function getRole(){
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            var_dump($_SESSION['username']);
            $stmt = $this->pdo->prepare("SELECT role FROM users WHERE username = ?");
            
            $stmt->execute([$username]);
            
            $userRole = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            if ($userRole) {
                return $userRole['role'];
            } else {
                return null; // Foydalanuvchi topilmadi
            }
        } 
        else {
            return null; // 'username' indeksi sessionda mavjud emas
        }
    }
    public function login($data)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username='".$data['username']."' and password='".$data['password']."'");
        $stmt->execute();
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $user;

    }
    public function update($id, array $data)
    {
    
    }
    public function delete($id)
    {
        
    }
}