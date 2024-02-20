<?php

namespace CategoryRepository;

require_once __DIR__ . '/../Interface/BaseInterface.php';
require_once __DIR__ . '/../Trait/DBConnectionTrait.php';
use BaseInterface\BaseInterface;
use DBConnectionTrait;

class CategoryRepository implements BaseInterface
{
    use DBConnectionTrait;
    public $pdo;
    public function __construct()
    {
        $this->pdo = $this->connect();
    }
    public function create(array $data)
    {
        $name = $data['name'];
        $stmt = $this->pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getById($id)
    {
        $id = $_GET['id'];
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function update($id, array $data)
    {
        $category = $this->getById($id);
        if (isset($id)) {
            if (!empty($data)) {
                $name = isset($data['name']) ? $data['name'] : $category['name'];
                $stmt = $this->pdo->prepare("UPDATE categories SET name = :name WHERE id = :id");
                $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
                $stmt->execute([':id' => $id,':name' => $name]);
            }
        }
    }
    public function paginate($limit)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories LIMIT $limit");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute([':id' => $id]);
    }
}