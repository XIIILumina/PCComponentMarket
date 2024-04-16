<?php

require_once "../app/Core/DBConnect.php";

class projectModel {

    private $db;

    public function __construct() {
        $this->db = new DBConnect();
    }
}