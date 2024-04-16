<?php

require_once "../app/Core/DBConnect.php";

class calendarModel {

    private $db;

    public function __construct() {
        $this->db = new DBConnect();
    }
}