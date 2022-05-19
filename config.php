<?php 
    $dbName = 'lead';
    $dbHost = 'localhost';
    $dbPort = '3305';
    $dbUser = 'root';
    $dbPass = '';

    $pdo = new PDO(
        "mysql:dbname=${dbName};host=${dbHost};port=${dbPort}",
        "${dbUser}",
        "${dbPass}"
    );
?>