<?php

$servername = "localhost";
$db = "web1_2017";
$username = "root";
$password = "root";

// Suppress criada para verificar se já existe uma database criada

if (!@mysqli_connect($servername, $username, $password, $db)) {	
    include_once('mysql.init.php');
}

$conn = mysqli_connect($servername, $username, $password, $db);

mysqli_select_db($conn, $db);

return $conn;

?>
