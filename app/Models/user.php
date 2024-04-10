<?php

require_once "../app/Core/DBConnect.php";

class userModel {

    private $db;

    public function __construct() {
        $this->db = new DBConnect();
    }

    public function createUser(string $email, string $password, string $username)
    {
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

    public function userChangePassword(int $UserID , string $newPassword)
    {

        $quary = $this->db->dbconn->prepare("UPDATE users SET Password = :newPassword WHERE UserID = :UserID");
        $quary->execute([':UserID' => $UserID, ':newPassword' => $newPassword]);
        return $quary->fetchAll();
    }
}
