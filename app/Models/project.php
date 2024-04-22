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

    public function deleteProjectByID($projectID)
    {
        // Dzēšam visus uzdevumus, kas saistīti ar šo projektu
        $queryTasks = $this->db->dbconn->prepare("DELETE FROM Tasks WHERE ProjectID = :ProjectID");
        $queryTasks->execute([':ProjectID' => $projectID]);
    
        // Dzēšam pašu projektu
        $queryProject = $this->db->dbconn->prepare("DELETE FROM Projects WHERE ProjectID = :ProjectID");
        $queryProject->execute([':ProjectID' => $projectID]);
    
        return $queryProject->rowCount(); // Return the number of affected rows (1 if successful, 0 if not)
    }
    
    

    public function updateProjectByid(int $id, string $Title, string $Description)
    {
        $quary = $this->db->dbconn->prepare("UPDATE Projects SET Title = :Title, Description = :Description WHERE ProjectID = id");
        $quary->execute([':id' => $id , ':Title' => $Title, ':Description' => $Description]);
        return $quary->fetch();
    }
    public function searchProjectsByName(int $UserID, string $searchQuery)
    {
        $searchQuery = htmlspecialchars($searchQuery);
        $query = $this->db->dbconn->prepare("SELECT * FROM Projects WHERE UserID = :UserID AND Title LIKE :searchQuery");
        $query->execute([':UserID' => $UserID, ':searchQuery' => "%$searchQuery%"]);
        return $query->fetchAll();
    }

}