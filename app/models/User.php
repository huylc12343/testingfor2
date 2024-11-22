<?php 
class User{
    private $id;
    private $fullname;
    private $username;
    private $password;

    public function __construct($id, $fullname, $username, $password){
        $this->id = $id;
        $this->fullname = $fullname;
        $this->username = $username;
        $this->password = $password;
    }
    public function getId(){
        return $this->id;
    }
    public function getFullname(){
        return $this->fullname;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setFullname($fullname){
        $this->fullname = $fullname;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
}
?>