<?php
require_once('models/Users.php');

class UsersDaoMySql implements UsersDao {
    private $pdo;

    public function __construct($driver) {
        $this -> pdo = $driver;
    }

    public function getUserByEmail($email) {

    }

    public function verifyUser(Users $u) {
        
        $sql = ($this -> pdo) -> prepare("SELECT * FROM users WHERE email=:email and password=:password");
        $sql -> bindValue(':email', $u -> getEmail());
        $sql -> bindValue(':password', $u -> getPassword());
        $sql -> execute();

        if($sql -> rowCount() > 0) {
            $_SESSION['email'] = $u -> getEmail();
            $_SESSION['password'] = $u -> getPassword();

            return true;
        } else {
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            header("Location: login.php");
        }

    }
    
}