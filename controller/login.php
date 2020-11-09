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
}