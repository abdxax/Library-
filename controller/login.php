<?php
require 'DB.php';
class Register extends DB{
    private $db_user;
    public function __construct(){
        parent::__construct();
        $this->db_user=$this->db;
    }

    //login
    public function login($user,$pass){
        $pass2=sha1($pass);
        $sql=$this->db_user->prepare("SELECT * FROM user WHERE userName=? AND password=?");
        $sql->execute(array($user,$pass2));
        if($sql->rowCount()==1){
            foreach ($sql as $s){
                if($s['role_i']==1){
                    $_SESSION['user']=$user;
                    $_SESSION['pass']=$pass;
                    header("location:admin/index.php");
                }
                else if($s['role_i']==2){
                    $_SESSION['user']=$user;
                    $_SESSION['pass']=$pass;

                    header("location:student/index.php");
                }
                else if($s['role_i']==3){
                    $_SESSION['user']=$user;
                    $_SESSION['pass']=$pass;
                    header("location:teacher/index.php");
                }
            }
        }
        else{
               header("location:login.php?msg=error_lo");
        }
    }

    public function register($name,$id,$email,$phone,$pass,$job,$id_cols){
        $pas=sha1($pass);
     $sql=$this->db_user->prepare("INSERT INTO user (userName,password,role_i)VALUES (?,?,?)");
     if($sql->execute(array($id,$pas,$job))){
      $sql_info=$this->db_user->prepare("INSERT INTO info(user_id,email,phone,name,college)VALUES (?,?,?,?,?)");
      if($sql_info->execute(array($id,$email,$phone,$name,$id_cols))){
         header("location:login.php?msg=done_re");
      }
     }
     else{
         header("location:login.php?msg=error_us");
     }
    }


    public function getColl(){
        $sql=$this->db_user->prepare("SELECT * FROM colloeg_dep");
        $sql->execute();
        return $sql;
    }


}