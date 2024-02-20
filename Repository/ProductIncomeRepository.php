<?php
namespace ProductIncomeRepository;

require_once __DIR__ . '/../Interface/BaseInterface.php';
require_once __DIR__ . '/../Trait/DBConnectionTrait.php';
use BaseInterface\BaseInterface;
use DBConnectionTrait;

class ProductIncomeRepository implements BaseInterface
{
    use DBConnectionTrait;
    public $pdo;
    public function __construct()
    {
        $this->pdo = $this->connect();
    }
    public function create(array $data)
    {
        $count = $data['count'];
        $date = $data['date'];
        $selling_price = $data['selling_price'];
        $income_price = $data['income_price'];
        $productId = $data['product_id'];
        $stmt = $this->pdo->prepare("INSERT INTO product_incomes (count,selling_price,date,product_id,income_price) VALUES (:count,:selling_price,:date,:product_id,:income_price)");
        $stmt->bindParam(':count', $count, \PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, \PDO::PARAM_STR);
        $stmt->bindParam(':selling_price', $selling_price, \PDO::PARAM_STR);
        $stmt->bindParam(':income_price', $income_price, \PDO::PARAM_STR);
        $stmt->bindParam(':product_id', $productId, \PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getById($id)
    {
        $id = $_GET['id'];
        $stmt = $this->pdo->prepare("SELECT * FROM product_incomes WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function update($id, array $data)
    {
        $productIncome = $this->getById($id);
        if (isset($id)) {
            if (!empty($data)) {
                $count = isset($data['count']) ? $data['count'] : $productIncome['count'];
                $date = isset($data['date']) ? $data['date'] : $productIncome['date'];
                $selling_price = isset($data['selling_price']) ? $data['selling_price'] : $productIncome['selling_price'];
                $income_price = isset($data['income_price']) ? $data['income_price'] : $productIncome['income_price'];
                $product_id = isset($data['product_id']) ? $data['product_id'] : $productIncome['product_id'];
                $stmt = $this->pdo->prepare("UPDATE product_incomes SET count = :count,date = :date,selling_price = :selling_price,income_price = :income_price, product_id = :product_id WHERE id = :id");
                $stmt->bindParam(':count', $count, \PDO::PARAM_STR);
                $stmt->bindParam(':date', $date, \PDO::PARAM_STR);
                $stmt->bindParam(':selling_price', $selling_price, \PDO::PARAM_STR);
                $stmt->bindParam(':income_price', $income_price, \PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
                $stmt->bindParam(':product_id', $product_id, \PDO::PARAM_INT);
                $stmt->execute([':id' => $id,':count' => $count,':date' => $date,':selling_price' => $selling_price,':income_price' => $income_price,':product_id'=> $product_id]);
            }
        }
    }
    public function paginate($limit)
    {
        $stmt = $this->pdo->prepare("SELECT product_incomes.id, product_incomes.count,product_incomes.date,product_incomes.selling_price,product_incomes.income_price, products.name as product_name 
        FROM product_incomes 
        LEFT JOIN products ON product_incomes.product_id = products.id");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM product_incomes WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute([':id' => $id]);
    }
}