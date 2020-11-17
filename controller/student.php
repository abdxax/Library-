<?php
require "DB.php";
class Student extends DB{
    private $student_db;
    public function __construct()
    {
        parent::__construct();
        $this->student_db=$this->db;
    }

    public function getAllDep(){
        $sql=$this->student_db->prepare("SELECT * FROM departemnt");
        $sql->execute();
        return $sql;
    }

    public function getProd($id){
        $sql=$this->student_db->prepare("SELECT * FROM contact WHERE id_types=?");
        $sql->execute(array($id));
        return $sql;
    }

    public function addToCar($id,$cont_id,$qu){
        $sql=$this->student_db->prepare("INSERT INTO car (email,contact_id,qu,status) VALUES (?,?,?,?)");
        if($sql->execute(array($id,$cont_id,$qu,"waiting_buy"))){
            return "done";
        }
    }

    public function getCar($id){
        $sql=$this->student_db->prepare("SELECT * FROM car LEFT JOIN contact ON car.contact_id = contact.id WHERE car.email=?");
        $sql->execute(array($id));
        return $sql;
    }

    public function createBill($total,$payway,$rad,$user,$totalpay){
        $sql=$this->student_db->prepare("INSERT INTO bill (total,payway,residual,email,totalpay) VALUES (?,?,?,?,?)");
        $id_last=$sql->execute(array($total,$payway,$rad,$user,$totalpay));
        foreach ($id_last as $is){
            return $is['id'];
        }
        //return $id_last;
    }
}
