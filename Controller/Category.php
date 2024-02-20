<?php

namespace Category;
require_once __DIR__ . '/../Repository/CategoryRepository.php';
use CategoryRepository\CategoryRepository;
class Category
{
    public function __construct(protected CategoryRepository $repository)
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
$categoryInstance = new Category(new CategoryRepository);
if( $_SERVER['REQUEST_METHOD'] === 'GET'){
    $categories = $categoryInstance->paginate();
}
if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])){
    $categoryInstance->create();
    header("Location: /../views/category/category_show.php");
    exit();
}
if( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $category = $categoryInstance->edit();
}
if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])){
    $categoryInstance->update();
    header("Location: /../views/category/category_show.php");
    exit();
}
if( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && isset($_GET['delete'])){
    $categoryInstance->delete();
    header("Location: /../views/category/category_show.php");
    exit();
}