<?php

namespace ProductsStores;
require_once __DIR__ . '/../Repository/ProductsStoresRepository.php';
use ProductsStoresRepository\ProductsStoresRepository;
class ProductsStores
{
    public function __construct(protected ProductsStoresRepository $repository)
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
$productInstance = new ProductsStores(new ProductsStoresRepository);
if( $_SERVER['REQUEST_METHOD'] === 'GET'){
    $productsStores = $productInstance->paginate();
}
if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])){
    $productInstance->create();
    header("Location: /../views/productsStores/productsStores_show.php");
    exit();
}
if( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $productsStore = $productInstance->edit();
}
if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])){
    $productInstance->update();
    header("Location: /../views/productsStores/productsStores_show.php");
    exit();
}
if( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && isset($_GET['delete'])){
    $productInstance->delete();
    header("Location: /../views/productsStores/productsStores_show.php");
    exit();
}