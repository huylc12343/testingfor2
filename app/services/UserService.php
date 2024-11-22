<?php
require_once APP_ROOT.'/app/models/User.php';
class UserService{
    public function getAllUser(){
        $users = [];
        $dbConnection = new DBConnection();

        if($dbConnection != null){
            $conn = $dbConnection->getConnection();
            if($conn != null){
                $sql = "SELECT * FROM users";
                $stmt = $conn->query($sql);

                while ($row = $stmt->fetch()){
                    $user = new User($row['id'], $row['fullname'], $row['username'], $row['password']);
                    $users[] = $user;
                }
                return $users;
            }
        }
    }
    public function getUserById($id){
        $dbConnection = new DBConnection();

        if($dbConnection != null){
            $conn = $dbConnection->getConnection();
            if($conn != null){
                $sql = "SELECT * FROM users WHERE id = $id";
                $stmt = $conn->query($sql);
                if($stmt->rowCount()>0){
                    $row = $stmt->fetch();
                    $user = new User($row['id'], $row['fullname'], $row['username'], $row['password']);
                    return $user;
                }
            }
        }
    }
    public function checkUser($user){
        $dbConnection = new DBConnection();

        if($dbConnection != null){
            $conn = $dbConnection->getConnection();
            if($conn != null){
                $username = $user->getUsername();
                $password = $user->getPassword();
                $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                $stmt = $conn->query($sql);
                if($stmt->rowCount()>0){
                    $row = $stmt->fetch();
                    $user = new User($row['id'], $row['fullname'], $row['username'], $row['password']);
                    return $user;
                }
            }
        }
    }
    public function addUser($user){
        $dbConnection = new DBConnection();
        if($dbConnection != null){
            $conn = $dbConnection->getConnection();
            if($conn != null){
                $name = $user->getFullname();
                $username = $user->getUsername();
                $password = $user->getPassword();
                $sql = "INSERT INTO users (id,fullname, username, password) VALUES (null,'$name','$username','$password')";
                $conn->exec($sql);
            }
        }
    }
}
?>