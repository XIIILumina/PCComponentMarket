<?php

require_once "../app/Core/DBConnect.php";

class taskModel {
    private $db;

    public function __construct() {
        $this->db = new DBConnect();
    }

    public function createTask(int $UserID, int $ProjectID, string $Title, string $Deadline, string $Status)
    {
        // Pārbaudam, vai Title satur kādas HTML etiķetes
        $Title = htmlspecialchars($Title);
    
        // Pārbaudam, vai Deadline ir pareizs datuma formāts, pirms mēģināt to saglabāt datubāzē
        if (strtotime($Deadline) === false) {
            // Ja datums ir nepareizs, var izvadīt kļūdas ziņojumu vai apstrādāt kļūdu pēc vajadzības
            return 0; // 0 nozīmē, ka uzdevums netika saglabāts
        }
    
        // Izveidojam SQL vaicājumu, izmantojot prepared statement, lai novērstu SQL injekcijas
        $query = $this->db->dbconn->prepare("INSERT INTO Tasks (UserID, ProjectID, Title, Deadline, Status) VALUES (:UserID, :ProjectID, :Title, :Deadline, :Status)");
    
        // Izpildam vaicājumu, padodot nepieciešamos parametrus
        $query->execute([
            ':UserID' => $UserID,
            ':ProjectID' => $ProjectID,
            ':Title' => $Title,
            ':Deadline' => $Deadline,
            ':Status' => $Status
        ]);
    
        // Atgriežam ietekmēto rindu skaitu (1, ja saglabāšana veiksmīga, 0, ja neveiksmīga)
        return $query->rowCount();
    }
    

    public function getAllTasksByUser(int $projectID)
    {
        $quary = $this->db->dbconn->prepare("SELECT * FROM Tasks WHERE projectID = ?");
        $quary->execute([$projectID]);
        return $quary->fetchAll();
    }

    public function getTaskByID(int $taskID)
    {
        $quary = $this->db->dbconn->prepare("SELECT * FROM Tasks WHERE TaskID = ?");
        $quary->execute([$taskID]);
        return $quary->fetch();
    }

    public function deleteTaskByID(int $taskID)
    {
        $quary = $this->db->dbconn->prepare("DELETE FROM Tasks WHERE TaskID = ?");
        $quary->execute([$taskID]);
        return $quary->rowCount(); // Return the number of affected rows (1 if successful, 0 if not)
    }

    public function updateTaskByID(int $taskID, string $Title, string $Deadline, string $Status)
    {
        $quary = $this->db->dbconn->prepare("UPDATE Tasks SET Title = :Title, Deadline = :Deadline, Status = :Status WHERE TaskID = :TaskID");
        $quary->execute([':TaskID' => $taskID , ':Title' => $Title, ':Deadline' => $Deadline, ':Status' => $Status]);
        return $quary->rowCount(); // Return the number of affected rows (1 if successful, 0 if not)
    }
    public function getAllTasksByProject(int $projectID)
    {
        $query = $this->db->dbconn->prepare("SELECT * FROM Tasks WHERE ProjectID = ?");
        $query->execute([$projectID]);
        return $query->fetchAll();
    }

}
