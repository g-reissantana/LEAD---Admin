<?php

class Students {
    private $id;
    private $name;
    private $year;
    private $class;
    private $phone;
    private $participation;
    private $age;
    private $sex;
    private $area;
    private $electiveFrequency;
    private $scoreAlura;
    private $objective;


    public function getId() {
        return $this -> id;
    }

    public function setId($i) {
        $this -> id = trim($i);
    }


    public function getName() {
        return $this -> name;
    }

    public function setName($n) {
        $this -> name = ucwords(trim($n));
    }


    public function getYear() {
        $yearFormated = $this -> year;
        return $yearFormated;
    }

    public function setYear($y) {
        $this -> year = "$y";
    }


    public function getClass() {
        return $this -> class;
    }

    public function setClass($c) {
        $this -> class = ucfirst($c);
    }
    

    public function getPhone() {
        $phone = $this -> phone;
        return $phone;
    }

    public function setPhone($ph) {
        $this -> phone = trim($ph);
    }


    public function getParticipation() {
        $participationFormated = $this -> participation;

        return $participationFormated;
    }

    public function setParticipation($p) {
        $this -> participation = $p;
    }
    

    public function getAge() {
        return $this -> age;
    }

    public function setAge($a) {
        $this -> age = $a;
    }
    

    public function getSex() {
        return $this -> sex;
    }

    public function setSex($s) {
        $this -> sex = ucfirst($s);
    }
    

    public function getArea() {
        return $this -> area;
    }

    public function setArea($a) {
        $this -> area = $a;
    }
    

    public function getElectiveFreq() {
        $electiveFrequency = $this -> electiveFrequency;

        return $electiveFrequency;
    }

    public function setElectiveFreq($ef) {
        $this -> electiveFrequency = $ef;
    }
    

    public function getScoreAlura() {
        return $this -> scoreAlura;
    }

    public function setScoreAlura($s) {
        $this -> scoreAlura = $s;
    }
    

    public function getObjective() {
        return $this -> objective;
    }

    public function setObjective($o) {
        $this -> objective = $o;
    }
}


interface StudentsDao {
    
    public function newStudent(Students $s);
    public function getAllStudents();
    public function getStudentById($id);
    public function getStudentByPhone($phone);
    public function updateStudent(Students $s);
    public function deleteStudent($id);

}