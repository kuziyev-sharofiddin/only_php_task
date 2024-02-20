<?php

namespace ProductsStoresRepository;

require_once __DIR__ . '/../Interface/BaseInterface.php';
require_once __DIR__ . '/../Trait/DBConnectionTrait.php';
use BaseInterface\BaseInterface;
use DBConnectionTrait;

class ProductsStoresRepository implements BaseInterface
{
    use DBConnectionTrait;
    public $pdo;
    public function __construct()
    {
        $this->pdo = $this->connect();
    }
    public function create(array $data)
    {
        $storeId = $data['store_id'];
        $productId = $data['product_id'];
        $stmt = $this->pdo->prepare("INSERT INTO stores_products (store_id, product_id) VALUES (:store_id, :product_id)");
        $stmt->bindParam(':store_id', $storeId, \PDO::PARAM_STR);
        $stmt->bindParam(':product_id', $productId, \PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getById($id)
    {
        $id = $_GET['id'];
        $stmt = $this->pdo->prepare("SELECT * FROM stores_products WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function update($id, array $data)
    {
        $product = $this->getById($id);
        if (isset($id)) {
            if (!empty($data)) {
                $storeId = isset($data['store_id']) ? $data['store_id'] : $product['store_id'];
                $productId = isset($data['product_id']) ? $data['product_id'] : $product['product_id'];
                $stmt = $this->pdo->prepare("UPDATE stores_products SET store_id = :store_id, product_id = :product_id WHERE id = :id");
                $stmt->bindParam(':store_id', $storeId, \PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
                $stmt->bindParam(':product_id', $productId, \PDO::PARAM_INT);
                $stmt->execute([':id' => $id,':storeId' => $storeId,':product_id'=> $productId]);
            }
        }
    }
    public function paginate($limit)
    {
        $stmt = $this->pdo->prepare("SELECT stores_products.id, stores.name as store_name, products.name as product_name 
        FROM stores_products 
        LEFT JOIN stores ON stores_products.store_id = stores.id
        LEFT JOIN products ON stores_products.product_id = products.id");
        
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM stores_products WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute([':id' => $id]);
    }
}