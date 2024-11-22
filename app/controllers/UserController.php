<?php 
include_once APP_ROOT.'/app/services/UserService.php';
class UserController{
    public function login(){
        include_once APP_ROOT.'/app/views/user/login.php';
    }
    public function checkUser($username, $password){
        $user = new User(null, null, $username, $password);
        $userService = new UserService();
        $user = $userService->checkUser($user);

        if ($user!=null) {
            // Lưu thông tin người dùng vào phiên (session)
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['username'] = $user->getUsername(); // Giả sử có phương thức getUsername()
            header('Location: ?controller=access&id=' . $user->getId());
        } else {
            $_SESSION['error'] = "Thông tin đăng nhập không chính xác";
            header('Location: ?controller=login');
        }
    }
    public function access($id){
        include_once APP_ROOT.'/app/views/user/access.php';
    }
    public function add(){
        include_once APP_ROOT.'/app/views/user/register.php';
    }

    public function store(){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $user = new User(null, $fullname, $username, $password);
        $userService = new UserService();
        $userService->addUser($user);

        header('Location: ?controller=home');
    }
    public function categories(){
        include_once APP_ROOT.'/app/views/user/categories.php';
    }
    public function lsqt(){
        include_once APP_ROOT.'/app/views/user/lsqt.php';
    }
    public function tlls(){
        include_once APP_ROOT.'/app/views/user/museum.php';
    }
    public function shop(){
        include_once APP_ROOT.'/app/views/user/shop.php';}

    public function ls(){
        include_once APP_ROOT.'/app/views/user/ls.php';
    }
}
?>