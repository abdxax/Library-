<?php
require 'DB.php';

class teacher extends DB
{
    private $tech_db;
    public function __construct()
    {
        parent::__construct();
        $this->tech_db=$this->db;
    }

    public function addContact($user,$fpath,$cols_id,$title,$decsrip){
        $sql=$this->tech_db->prepare("INSERT INTO pdf (user_id,cols_id,file_path,title,descrip)VALUES (?,?,?,?,?)");
        if($sql->execute(array($user,$cols_id,$fpath,$title,$decsrip))){
            header("location:contact.php");
        }
    }

    public function getCol($id){
        $sql=$this->tech_db->prepare("SELECT * FROM info WHERE user_id=?");
        $sql->execute(array($id));
        foreach ($sql as $s){
            return $s['college'];
        }
    }

    public function getAllContact($id){
        $sql=$this->tech_db->prepare("SELECT * FROM pdf WHERE user_id=?");
        $sql->execute(array($id));
        return $sql;
    }

    public function deleteContact($id){
        $sql=$this->tech_db->prepare("DELETE FROM pdf WHERE id=?");
        if($sql->execute(array($id))){
            header("location:contact.php");
        }
    }
}