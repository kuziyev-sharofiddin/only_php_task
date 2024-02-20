<?php

namespace Product;
require_once __DIR__ . '/../Repository/ProductRepository.php';
use ProductRepository\ProductRepository;
class Product
{
    public function __construct(protected ProductRepository $repository)
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
$productInstance = new Product(new ProductRepository);
if( $_SERVER['REQUEST_METHOD'] === 'GET'){
    $products = $productInstance->paginate();
}
if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])){
    $productInstance->create();
    header("Location: /../views/product/product_show.php");
    exit();
}
if( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $product = $productInstance->edit();
}
if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])){
    $productInstance->update();
    header("Location: /../views/product/product_show.php");
    exit();
}
if( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && isset($_GET['delete'])){
    $productInstance->delete();
    header("Location: /../views/product/product_show.php");
    exit();
}