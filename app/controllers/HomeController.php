<?php 
require_once APP_ROOT.'/app/services/UserService.php';   
class HomeController{
    public function index(){
        $userService = new UserService();
        $users = $userService->getAllUser();

        include APP_ROOT.'/app/views/home/index.php';
    }
}
?>