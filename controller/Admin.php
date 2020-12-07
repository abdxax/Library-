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
            header('location:depart.php?msg_er=don');
        }
    }

    public function deletePro($id){
        $sql=$this->db_admin->prepare("DELETE FROM contact WHERE id=?");
        if($sql->execute(array($id))){
            header("location:produ.php");
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


    //get orders
    public function getorders($ids=0){
        if($ids==0){
            $sql=$this->db_admin->prepare("SELECT * FROM bill");
            $sql->execute();
            return $sql;
        }
        else if($ids==1){
            $sql=$this->db_admin->prepare("SELECT * FROM bill WHERE status=?");
            $sql->execute(array('newOrder'));
            return $sql;
        }
        else if ($ids==2){
            $sql=$this->db_admin->prepare("SELECT * FROM bill WHERE status=?");
            $sql->execute(array('done'));
            return $sql;
        }
    }

    //getData
    public function getProduect($id){
        $sql=$this->db_admin->prepare("SELECT * FROM car LEFT JOIN contact ON car.contact_id=contact.id WHERE car.bill_id=?");
        $sql->execute(array($id));
        return $sql;

    }

    public function updataeOrdr($id,$stu){
        $date_ar=date("Y-m-d");
        $sql=$this->db_admin->prepare("UPDATE bill SET status=?,date_arv=? WHERE id=?");
        if($sql->execute(array($stu,$date_ar,$id))){
            $sql_car=$this->db_admin->prepare("UPDATE car SET status=? WHERE bill_id=?");
            if($sql_car->execute(array($stu,$id))){
                header("location:dets.php?id=".$id."");
            }
        }
    }

    public function getPayWay($id){
        $sql=$this->db_admin->prepare("SELECT * FROM bill WHERE id=?");
        $sql->execute(array($id));
        return $sql;
    }

    public function updatePay($id,$pay,$tot){
        $reu=$tot-$pay;
        $sql=$this->db_admin->prepare("UPDATE bill SET totalpay=?,residual=? WHERE id=?");
        if($sql->execute(array($pay,$reu,$id))){
            header("location:orders.php");
        }
    }

    public function getContact(){
        $sql=$this->db_admin->prepare("SELECT * FROM pdf LEFT JOIN  colloeg_dep ON pdf.cols_id=colloeg_dep.id");
        $sql->execute();
        return $sql ;
    }


    public function addNewColl($name){
        $sql=$this->db_admin->prepare("INSERT INTO colloeg_dep(name_col)VALUES (?)");
        if($sql->execute(array($name))){
            header("location:addColloeg.php?msg=don");
        }
    }

    public function getAllCol(){
        $sql=$this->db_admin->prepare("SELECT * FROM colloeg_dep");
        $sql->execute();
        return $sql;
    }

    public function deleteCol($id){
        $sql=$this->db_admin->prepare("DELETE FROM colloeg_dep WHERE id=?");
        if($sql->execute(array($id))){
          header("location:addColloeg.php?msg_er=don");
        }
    }

    public function AddPros($title){
        $sql=$this->db_admin->prepare("INSERT INTO contact (id_types,title,price,file_path)VALUES (?,?,?,?)");
        $sql->execute(array(3,$title,'30','../bais.png'));
    }



}