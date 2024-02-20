<?php

namespace Store;
require_once __DIR__ . '/../Repository/StoreRepository.php';
use StoreRepository\StoreRepository;
class Store
{
    public function __construct(protected StoreRepository $repository)
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
$storeInstance = new Store(new StoreRepository);
if( $_SERVER['REQUEST_METHOD'] === 'GET'){
    $stores = $storeInstance->paginate();
}
if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])){
    $storeInstance->create();
    header("Location: /../views/store/store_show.php");
    exit();
}
if( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $store = $storeInstance->edit();
}
if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])){
    $storeInstance->update();
    header("Location: /../views/store/store_show.php");
    exit();
}
if( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && isset($_GET['delete'])){
    $storeInstance->delete();
    header("Location: /../views/store/store_show.php");
    exit();
}