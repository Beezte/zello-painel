<?php

$dbHost = "127.0.0.1";
$dbName = 'funcionarios_zello';
$dbUsername = 'root';
$dbPassword = '';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}