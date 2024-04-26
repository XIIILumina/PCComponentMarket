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
        $quary->fetch();

        $ProjectID = $this->getProjectIdByNameAndDescriptione($Title, $Description)['ProjectID']; //works if project title and descriptione are not thesame for mulitple projects

        $quary = $this->db->dbconn->prepare("INSERT INTO SheredProjects (UserID, ProjectID) VALUES (:UserID,:ProjectID)");
        $quary->execute([':UserID' => $UserID, ':ProjectID' => $ProjectID]);
        return $quary->fetch();
    }
    // Ievietojiet šo kodu jūsu projectModel klasē
    public function getAllProjectsByUser(int $UserID)
    {
        $quary = $this->db->dbconn->prepare("SELECT * FROM SheredProjects
        LEFT JOIN Projects
        ON SheredProjects.ProjectID = Projects.ProjectID
        WHERE UserID = :UserID;");
        $quary->execute([':UserID' => $UserID]);
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
        $query = $this->db->dbconn->prepare("SELECT *
        FROM SheredProjects
        LEFT JOIN Projects ON SheredProjects.ProjectID = Projects.ProjectID
        WHERE SheredProjects.UserID = :UserID
        AND Projects.Title LIKE :searchQuery");
        $query->execute([':UserID' => $UserID, ':searchQuery' => "%$searchQuery%"]);
        return $query->fetchAll();
    }

    public function getProjectIdByNameAndDescriptione(string $Title,string $Description)
    {
        $query = $this->db->dbconn->prepare("SELECT ProjectID FROM Projects WHERE Title = :Title AND Description = :Description");
        $query->execute([':Title' => $Title, ':Description' => $Description]);
        return $query->fetch();
    }
    public function getSharedProjectsByUser(int $userID)
    {
        $query = $this->db->dbconn->prepare("
            SELECT P.* 
            FROM Projects P
            INNER JOIN SheredProjects SP ON P.ProjectID = SP.ProjectID
            WHERE SP.UserID = ?
        ");
        $query->execute([$userID]);
        return $query->fetchAll();
    }
    
}