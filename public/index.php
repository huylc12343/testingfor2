<?php 
require_once '../app/config/config.php';
require_once APP_ROOT.'/app/libs/DbConnection.php';
require_once APP_ROOT.'/app/controllers/HomeController.php';
require_once APP_ROOT.'/app/controllers/UserController.php';

$controller = isset($_GET['controller'])?$_GET['controller']:'home';
$action = isset($_GET['action'])?$_GET['action']:'home';
$id = isset($_GET['id'])?$_GET['id']:null;

$homeController = new HomeController();
$userController = new UserController();
if($controller == 'home'){
    $homeController->index();
}else if(isset($_POST['btn_create'])){
    $userController->store();
}else if(isset($_POST['btn_login'])){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $userController->checkUser($username, $password);
}else if($controller == 'access'){
    $userController->access($id);
}else if($controller == 'login'){
    $userController->login();
}else if($controller =='addUser'){    
    $userController->add();  
}else if($controller =='lsvn'){
    $userController->categories();
}else if($controller =='lsqt'){
    $userController->lsqt();
}else if($controller == 'tlls'){
    $userController->tlls();
}else if($controller =='shop'){
    $userController->shop();
}else if($controller == 'ls'){
    $userController->ls();
}else if($controller == 'logout'){
    $homeController->index();
}
?>