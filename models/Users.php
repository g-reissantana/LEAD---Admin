<?php

class Users {
    private $id;
    private $email;
    private $password;


    public function setId() {

    }

    public function getId() {
        return $this -> id;
    }


    public function getEmail() {
        return $this -> email;
    }

    public function setEmail($email) {
        $this -> email = $email;
    }

    public function getPassword() {
        return $this -> password;
    }

    public function setPassword($password) {
        $this -> password = $password;
    }

}

interface UsersDao {
    // public function newUser(Users $u);
    // public function getUserById($id);
    public function getUserByEmail($email);

    public function verifyUser(Users $u);
}