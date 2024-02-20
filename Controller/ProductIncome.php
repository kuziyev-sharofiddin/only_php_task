<?php

namespace ProductIncome;
require_once __DIR__ . '/../Repository/ProductIncomeRepository.php';
use ProductIncomeRepository\ProductIncomeRepository;
class ProductIncome
{
    public function __construct(protected ProductIncomeRepository $repository)
    {
        $this->repository = $repository;
    }
    public function paginate(){
        return $this->repository->paginate(10);
    }
    public function create(){
        return $this->repository->create($_POST);
    }
    public function edit(){
        return $this->repository->getById($_GET['id']);
    }
    public function update(){  
        return $this->repository->update($_GET['id'],$_POST);
    }
    public function delete(){
        return $this->repository->delete($_GET['id']);
    }
}
$productIncomeInstance = new ProductIncome(new ProductIncomeRepository);
if( $_SERVER['REQUEST_METHOD'] === 'GET'){
    $productIncomes = $productIncomeInstance->paginate();
}
if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])){
    $productIncomeInstance->create();
    header("Location: /../views/productIncome/productIncome_show.php");
    exit();
}
if( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $productIncome = $productIncomeInstance->edit();
}
if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])){
    $productIncomeInstance->update();
    header("Location: /../views/productIncome/productIncome_show.php");
    exit();
}
if( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && isset($_GET['delete'])){
    $productIncomeInstance->delete();
    header("Location: /../views/productIncome/productIncome_show.php");
    exit();
}