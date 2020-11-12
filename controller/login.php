<?php
require 'DB.php';
class Register extends DB{
    private $db_user;
    public function __construct(){
        parent::__construct();
        $this->db_user=$this->db;
    }

    //login
    public function login($user,$email){
        
    }

    public function register($name,$id,$email,$phone,$pass,$job){
        $pas=sha1($pass);
     $sql=$this->db_user->prepare("INSERT INTO user (userName,password,role_i)VALUES (?,?,?)");
     if($sql->execute(array($id,$pas,$job))){
      $sql_info=$this->db_user->prepare("INSERT INTO info(user_id,email,phone,name)VALUES (?,?,?,?)");
      if($sql_info->execute(array($id,$email,$phone,$name))){

      }
     }
    }
}