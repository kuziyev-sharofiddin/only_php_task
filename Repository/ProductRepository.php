<?php

namespace ProductRepository;

require_once __DIR__ . '/../Interface/BaseInterface.php';
require_once __DIR__ . '/../Trait/DBConnectionTrait.php';
use BaseInterface\BaseInterface;
use DBConnectionTrait;

class ProductRepository implements BaseInterface
{
    use DBConnectionTrait;
    public $pdo;
    public function __construct()
    {
        $this->pdo = $this->connect();
    }
    public function create(array $data)
    {
        $productName = $data['name'];
        $categoryId = $data['category_id'];
        $stmt = $this->pdo->prepare("INSERT INTO products (category_id, name) VALUES (:category_id,:name)");
        $stmt->bindParam(':name', $productName, \PDO::PARAM_STR);
        $stmt->bindParam(':category_id', $categoryId, \PDO::PARAM_INT);
        $stmt->execute();
    }
    public function getById($id)
    {
        $id = $_GET['id'];
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function update($id, array $data)
    {
        $product = $this->getById($id);
        if (isset($id)) {
            if (!empty($data)) {
                $name = isset($data['name']) ? $data['name'] : $product['name'];
                $category_id = isset($data['category_id']) ? $data['category_id'] : $product['category_id'];
                $stmt = $this->pdo->prepare("UPDATE products SET name = :name, category_id = :category_id WHERE id = :id");
                // UPDATE products SET name = :name WHERE id = :id
                // UPDATE products SET name = :name, category_id = :category_id WHERE id = :product_id;
                $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
                $stmt->bindParam(':category_id', $category_id, \PDO::PARAM_INT);
                $stmt->execute([':id' => $id,':name' => $name,':category_id'=> $category_id]);
            }
        }
    }
    public function paginate($limit)
    {
        $stmt = $this->pdo->prepare("SELECT products.id, products.name, categories.name as category_name 
        FROM products 
        LEFT JOIN categories ON products.category_id = categories.id");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute([':id' => $id]);
    }
}