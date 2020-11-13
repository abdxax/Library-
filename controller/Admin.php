<?php
require 'DB.php';
class Admin extends DB{
    private $db_admin;
    public function __construct(){
        parent::__construct();
        $this->db_admin=$this->db;
    }

    public function addNewDepart($name){
        $sql=$this->db_admin->prepare("INSERT INTO departemnt(dep_name)VALUES (?)");
        if($sql->execute(array($name))){
            header("location:depart.php?msg=don");
        }
    }

    public function getAllDep(){
        $sql=$this->db_admin->prepare("SELECT * FROM departemnt");
        $sql->execute();
        return $sql;
    }

    public function deletedep($id){
        $sql=$this->db_admin->prepare("DELETE FROM departemnt WHERE id=?");
        if($sql->execute(array($id))){

        }
    }

    public function addNewProudect($name,$price,$qu,$type,$paths){
        $sql=$this->db_admin->prepare("INSERT INTO contact(id_types,title,price,quenity,file_path)VALUES (?,?,?,?,?)");
        if($sql->execute(array($type,$name,$price,$qu,$paths))){
            header("location:produ.php?msg=don");
        }
    }

    public function getAllProud(){
        $sql=$this->db_admin->prepare("SELECT * FROM contact");
        $sql->execute();
        return $sql;
    }



}