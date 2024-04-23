<?php

require_once "../app/Core/DBConnect.php";

class userModel {

    private $db;

    public function __construct() {
        $this->db = new DBConnect();
    }

    public function createUser(string $email, string $password, string $username)
    {
        $username = htmlspecialchars($username);
        $email = htmlspecialchars($email);
        $quary = $this->db->dbconn->prepare("INSERT INTO Users (Username, Password, Email) VALUES (:username,:password,:email)");
        $quary->execute([':username' => $username, ':password' => $password , ':email' => $email]);
        return $quary->fetchAll();
    }

    public function checkIfUserExsistsByUsername(string $username)
    {

        $quary = $this->db->dbconn->prepare("SELECT * FROM Users WHERE username = :username");
        $quary->execute([':username' => $username]);
        if($quary->fetchAll() != []){
            return false;
        }else{
            return true;
        }
    }

    public function checkIfUserExsistsByEmail(string $email)
    {

        $quary = $this->db->dbconn->prepare("SELECT * FROM Users WHERE email = :email");
        $quary->execute([':email' => $email]);
        if($quary->fetchAll() != []){
            return false;
        }else{
            return true;
        }
    }

    public function loginUser(string $username ,string $password)
    {
        $quary = $this->db->dbconn->prepare("SELECT * FROM users WHERE username = :username");
        $quary->execute([':username' => $username]);
        $user = $quary->fetch();
        if($user && password_verify($password , $user['Password'])){
            return $user;
        }
        return false;   
    }

    public function userChangePassword(int $UserID ,string $username,string $oldPassword, string $newPassword)
    {
        $quary = $this->db->dbconn->prepare("SELECT * FROM users WHERE username = :username");
        $quary->execute([':username' => $username]);
        $user = $quary->fetch();

        if($user && password_verify($oldPassword , $user['Password']))
        {
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $quary = $this->db->dbconn->prepare("UPDATE users SET Password = :newPassword WHERE UserID = :UserID");
            $quary->execute([':UserID' => $UserID, ':newPassword' => $newPassword]);
            return true;
        }
        
        return false;   
    }

    public function userChangeEmail(int $UserID , string $newEmail)
    {
        $quary = $this->db->dbconn->prepare("UPDATE users SET Email = :newEmail WHERE UserID = :UserID");
        $quary->execute([':UserID' => $UserID, ':newEmail' => $newEmail]);
        return $quary->fetchAll();
    }
    
    public function deleteUser(int $UserID , string $username , string $password)
    {

        $quary = $this->db->dbconn->prepare("SELECT * FROM users WHERE username = :username");
        $quary->execute([':username' => $username]);
        $user = $quary->fetch();
        if($user && password_verify($password , $user['Password'])){

            $quary = $this->db->dbconn->prepare("DELETE FROM tasks WHERE UserID = :UserID");
            $quary->execute([':UserID' => $UserID]);

            $quary = $this->db->dbconn->prepare("DELETE FROM projects WHERE UserID = :UserID");
            $quary->execute([':UserID' => $UserID]);

            $quary = $this->db->dbconn->prepare("DELETE FROM users WHERE UserID = :UserID");
            $quary->execute([':UserID' => $UserID]);
            return true;
        }
        return false;   

    }
}
