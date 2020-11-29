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
        $sql=$this->student_db->prepare("SELECT * FROM car LEFT JOIN contact ON car.contact_id = contact.id WHERE car.email=? AND status=?");
        $sql->execute(array($id,"waiting_buy"));
        return $sql;
    }

    public function createBill($total,$payway,$rad,$user,$totalpay){
        $sql=$this->student_db->prepare("INSERT INTO bill (total,payway,residual,email,totalpay,status) VALUES (?,?,?,?,?,?)");
        $sql->execute(array($total,$payway,$rad,$user,$totalpay,"newOrder"));

        $last_id=$this->student_db->lastInsertId();
        $sql_update=$this->student_db->prepare("UPDATE car SET status=? , bill_id=? WHERE email=? AND status=?");
        if($sql_update->execute(array("wait",$last_id,$user,'waiting_buy'))){
            header("location:index.php");
        }
        //return $id_last;
    }


    //get theh  oroders
    public function getOrder($id){
        $sql=$this->student_db->prepare("SELECT * FROM bill WHERE email=?");
        $sql->execute(array($id));
        return $sql;
    }

    public function getAllContact($id){
        $sql=$this->student_db->prepare("SELECT * FROM pdf WHERE cols_id=?");
        $sql->execute(array($id));
        return $sql;
    }

    public function getCol($id){
        $sql=$this->student_db->prepare("SELECT * FROM info WHERE user_id=?");
        $sql->execute(array($id));
        foreach ($sql as $s){
            return $s['college'];
        }
    }

    public function getName($id){
        $sql=$this->student_db->prepare("SELECT * FROM info WHERE user_id=?");
        $sql->execute(array($id));
        return $sql;
    }

}
