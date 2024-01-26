<?php

$dbHost = "127.0.0.1";
$dbName = 'zello_painel';
$dbUsername = 'root';
$dbPassword = '';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} //else{
////    echo "Connected successfully";
//}