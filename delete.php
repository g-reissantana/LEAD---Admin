<?php
session_start();
require('config.php');
require('./dao/StudentsDaoMySql.php');

$studentDao = new StudentsDaoMySql($pdo);

$id = filter_input(INPUT_GET, 'id');


if(isset($_SESSION['email']) && $id) {
    $studentDao -> deleteStudent($id);
}
header("Location: index.php");
exit;
