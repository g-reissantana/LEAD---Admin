<?php
require_once 'models/Students.php';

class StudentsDaoMySql implements StudentsDao {
    private $pdo;

    public function __construct($driver) {
        $this -> pdo = $driver;
    }

    public function newStudent(Students $s) {
        // Query SQL
        // Query to add a new student
        $sql = ($this -> pdo) -> prepare("INSERT INTO students(name, year, class, phone, participation, age, sex, area, elective_frequency, score_alura, objective) VALUES (:name, :year, :class, :phone, :participation, :age, :sex, :area, :elective_frequency, :score_alura, :objective)");
        $sql -> bindValue(':name', $s -> getName());
        $sql -> bindValue(':year', $s -> getYear());
        $sql -> bindValue(':class', $s -> getClass());
        $sql -> bindValue(':phone', $s -> getPhone());
        $sql -> bindValue(':participation', $s -> getParticipation());
        $sql -> bindValue(':age', $s -> getAge());
        $sql -> bindValue(':sex', $s -> getSex());
        $sql -> bindValue(':area', $s -> getArea());
        $sql -> bindValue(':elective_frequency', $s -> getElectiveFreq());
        $sql -> bindValue(':score_alura', $s -> getScoreAlura());
        $sql -> bindValue(':objective', $s -> getObjective());
        $sql -> execute();
        
        $s -> setId(($this->pdo) -> lastInsertId());
        
        return $s;
    }

    public function getAllStudents() {
        $array = [];

        // Query SQL
        // Query to get all students from the table
        $sql = ($this -> pdo) -> query('SELECT * FROM students');
        
        if($sql -> rowCount() > 0) {
            $data = $sql -> fetchAll();    

            foreach($data as $item) {
                $students = new Students();
                $students -> setId($item['id']);
                $students -> setName($item['name']);
                $students -> setYear($item['year']);
                $students -> setClass($item['class']);
                $students -> setPhone($item['phone']);
                $students -> setParticipation($item['participation']);
                $students -> setAge($item['age']);
                $students -> setSex($item['sex']);
                $students -> setArea($item['area']);
                $students -> setElectiveFreq($item['elective_frequency']);
                $students -> setScoreAlura($item['score_alura']);
                $students -> setObjective($item['objective']);

                $array[] = $students;
            }
        }

        return $array;
    }

    public function getStudentById($id) {
        $sql = ($this -> pdo) -> prepare("SELECT * FROM students WHERE id=:id");
        $sql -> bindValue(':id', $id);
        $sql -> execute();

        if($sql -> rowCount() > 0) {
            if($sql -> rowCount() > 0) {
                $data = $sql -> fetch();
                $student = new Students();
                $student -> setId($data['id']);
                $student -> setName($data['name']);
                $student -> setYear($data['year']);
                $student -> setClass($data['class']);
                $student -> setPhone($data['phone']);
                $student -> setParticipation($data['participation']);
                $student -> setAge($data['age']);
                $student -> setSex($data['sex']);
                $student -> setArea($data['area']);
                $student -> setElectiveFreq($data['elective_frequency']);
                $student -> setScoreAlura($data['score_alura']);
                $student -> setObjective($data['objective']);
    
                return $student;
            }
        } else {
            return false;
        }
        
    }

    public function getStudentByPhone($phone) {
        $sql = ($this -> pdo) -> prepare("SELECT * FROM students WHERE phone=:phone");
        $sql -> bindValue(':phone', $phone);
        $sql -> execute();

        if($sql -> rowCount() > 0) {

            if($sql -> rowCount() > 0) {
                $data = $sql -> fetch();
                $student = new Students();
                $student -> setId($data['id']);
                $student -> setName($data['name']);
                $student -> setYear($data['year']);
                $student -> setClass($data['class']);
                $student -> setPhone($data['phone']);
                $student -> setParticipation($data['participation']);
                $student -> setAge($data['age']);
                $student -> setSex($data['sex']);
                $student -> setArea($data['area']);
                $student -> setElectiveFreq($data['elective_frequency']);
                $student -> setScoreAlura($data['score_alura']);
                $student -> setObjective($data['objective']);
    
                return $student;
            }
            
        } else {
            return false;
        }
        
    }

    public function updateStudent(Students $s) {
    
        $sql = ($this -> pdo) -> prepare("UPDATE students SET name = :name, year = :year, class = :class, phone = :phone, participation = :participation, age = :age, sex = :sex, area = :area, elective_frequency = :electiveFreq, score_alura = :scoreAlura, objective = :objective WHERE students.id = :id");
        $sql -> bindValue(':id', $s -> getId());
        $sql -> bindValue(':name', $s -> getName());
        $sql -> bindValue(':year', $s -> getYear());
        $sql -> bindValue(':class', $s -> getClass());
        $sql -> bindValue(':phone', $s -> getPhone());
        $sql -> bindValue(':participation', $s -> getParticipation());
        $sql -> bindValue(':age', $s -> getAge());
        $sql -> bindValue(':sex', $s -> getSex());
        $sql -> bindValue(':area', $s -> getArea());
        $sql -> bindValue(':electiveFreq', $s -> getElectiveFreq());
        $sql -> bindValue(':scoreAlura', $s -> getScoreAlura());
        $sql -> bindValue(':objective', $s -> getObjective());

        $sql -> execute();

        return true;

    }

    public function deleteStudent($id) {
        $sql = ($this -> pdo) -> prepare("DELETE FROM students WHERE students.id =:id");
        $sql -> bindValue(':id', $id);
        $sql -> execute();
    }

}