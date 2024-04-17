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
    // Ievietojiet šo kodu jūsu projectModel klasē
    public function getAllProjectsByUser(int $UserID)
    {
        $quary = $this->db->dbconn->prepare("SELECT * FROM Projects WHERE UserID = ?");
        $quary->execute([$UserID]);
        return $quary->fetchAll();
    }

    // Ievietojiet šo kodu jūsu projectModel klasē
    public function getProjectByID(int $projectID)
    {
        $quary = $this->db->dbconn->prepare("SELECT * FROM Projects WHERE ProjectID = ?");
        $quary->execute([$projectID]);
        return $quary->fetch();
    }

    public function deleteProjectByid(int $id)
    {
        $quary = $this->db->dbconn->prepare("DELETE FROM Projects WHERE ProjectID = id");
        $quary->execute([':id' => $id]);
        return $quary->fetch();
    }

    public function updateProjectByid(int $id, string $Title, string $Description)
    {
        $quary = $this->db->dbconn->prepare("UPDATE Projects SET Title = :Title, Description = :Description WHERE ProjectID = id");
        $quary->execute([':id' => $id , ':Title' => $Title, ':Description' => $Description]);
        return $quary->fetch();
    }

}