<?php

namespace UserRepository;

require_once __DIR__ . '/../Interface/BaseInterface.php';
require_once __DIR__ . '/../Trait/DBConnectionTrait.php';
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