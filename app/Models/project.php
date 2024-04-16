<?php

require_once "../app/Core/DBConnect.php";

class projectModel {

    private $db;

    public function __construct() {
        $this->db = new DBConnect();
    }

    public function createProject(int $UserID, string $Title, string $Description)
    {
        $Title = htmlspecialchars($Title);
        $Description = htmlspecialchars($Description);
        $quary = $this->db->dbconn->prepare("INSERT INTO Projects (UserID, Title, Description) VALUES (:UserID,:Title,:Description)");
        $quary->execute([':UserID' => $UserID, ':Title' => $Title , ':Description' => $Description]);
        return $quary->fetchAll();
    }
}