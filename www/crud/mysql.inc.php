<?php

$servername = "localhost";
$db = "DB";
$username = "root";
$password = "";

// Suppress criada para verificar se já existe uma database criada

if (!@mysqli_connect($servername, $username, $password, $db)) {	
    include_once('mysql.init.php');
}

$conn = mysqli_connect($servername, $username, $password, $db);

mysqli_select_db($conn, $db);

return $conn;

?>
