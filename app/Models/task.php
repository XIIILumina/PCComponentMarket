<?php

require_once "../app/Core/DBConnect.php";

class tasksModel {
    private $db;

    public function __construct() {
        $this->db = new DBConnect();
    }

    public function createTask(int $UserID, string $Title, string $Deadline, string $Status)
    {
        $Title = htmlspecialchars($Title);
        // Assuming Deadline is in the format 'YYYY-MM-DD'
        $quary = $this->db->dbconn->prepare("INSERT INTO Tasks (UserID, Title, Deadline, Status) VALUES (:UserID, :Title, :Deadline, :Status)");
        $quary->execute([':UserID' => $UserID, ':Title' => $Title , ':Deadline' => $Deadline, ':Status' => $Status]);
        return $quary->rowCount(); // Return the number of affected rows (1 if successful, 0 if not)
    }

    public function getAllTasksByUser(int $UserID)
    {
        $quary = $this->db->dbconn->prepare("SELECT * FROM Tasks WHERE UserID = ?");
        $quary->execute([$UserID]);
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
}
