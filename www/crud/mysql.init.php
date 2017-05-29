<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "web1_2017";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE $dbname";
if (!mysqli_query($conn, $sql)) {
    echo "Error creating database: " . mysqli_error($conn);
}

$sql = "create table web1_2017.tbUsuario( id int NOT NULL AUTO_INCREMENT PRIMARY KEY, nome varchar(50), login varchar(50), senha varchar(50) );";
if (!mysqli_query($conn, $sql)) {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>