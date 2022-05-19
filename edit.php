<?php
require('./config.php');
require('./dao/StudentsDaoMySql.php');

$studentsDao = new StudentsDaoMySql($pdo);

$id = filter_input(INPUT_POST, 'id');
$sex = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_SPECIAL_CHARS);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_SPECIAL_CHARS);
$year = filter_input(INPUT_POST, 'year',  FILTER_SANITIZE_SPECIAL_CHARS);
$class = filter_input(INPUT_POST, 'class',  FILTER_SANITIZE_SPECIAL_CHARS);
$objective = filter_input(INPUT_POST, 'objective', FILTER_SANITIZE_SPECIAL_CHARS);
$age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT,  FILTER_SANITIZE_SPECIAL_CHARS);
$scoreAlura = filter_input(INPUT_POST, 'scoreAlura', FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_SPECIAL_CHARS);
$electiveFreq = filter_input(INPUT_POST, 'electiveFreq', FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_SPECIAL_CHARS);
$participation = filter_input(INPUT_POST, 'participation', FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_SPECIAL_CHARS);

if($name && $class && $phone && $participation && $age && $sex && $electiveFreq && $scoreAlura && $objective) {

    $updateStudent = new Students();
    $updateStudent -> setId($id);
    $updateStudent -> setAge($age);
    $updateStudent -> setSex($sex);
    $updateStudent -> setName($name);
    $updateStudent -> setYear($year);
    $updateStudent -> setArea($area);
    $updateStudent -> setClass($class);
    $updateStudent -> setPhone($phone);
    $updateStudent -> setObjective($objective);
    $updateStudent -> setScoreAlura($scoreAlura);
    $updateStudent -> setElectiveFreq($electiveFreq);
    $updateStudent -> setParticipation($participation);

    $studentsDao -> updateStudent($updateStudent);

    header("Location: index.php");
    exit;

} else {
    header("Location: formEdit.php?id=$id");
}