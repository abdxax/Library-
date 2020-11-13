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
}
