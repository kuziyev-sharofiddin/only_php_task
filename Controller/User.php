<?php

namespace User;
require_once __DIR__ . '/../Repository/UserRepository.php';
use UserRepository\UserRepository;
// var_dump($_GET);
class User
{
    public function __construct(protected UserRepository $repository)
    {
        $this->repository = $repository;
    }
    public function paginate(){
        return $this->repository->paginate(10);
    }
    public function login(){
        return $this->repository->login($_POST);
    }
}
$userInstance = new User(new UserRepository);
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    $user = $userInstance->login();
    if ($user) {
        header("Location: /../views/dashboard/dashboard.php");
        exit();
    }
    else {
        header("Location: /../views/users/login.php");
        exit();
    }
}