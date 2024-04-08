<?php

require_once "./DbConnect.class.php";

class User{

    private $db;
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
        $this->db = new DbConnect($config);
    }

    public function creatUser(string $mail ,string $password,string $username){
        
    }

}