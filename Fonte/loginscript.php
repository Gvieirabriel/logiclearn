<?php
$conn = include_once('mysql.inc.php');

session_start();

$row = NULL;

$login = $_POST['username'];
$senha = $_POST['password'];
	
$sql = "select * from tbPessoa where email = '".$login."' and senha = '".md5($senha)."'";
$res = mysqli_query($conn, $sql);
if($res === FALSE) { 
	die(mysqli_error($conn));
}
$row = mysqli_fetch_assoc($res);
if ($row['nome']=='') {
	$_SESSION['er'] = "Usuario invalido";
	header('location:login.php?er=".$er');
}else{
	$_SESSION['er'] = "";
	$_SESSION['email'] = $login;
	$_SESSION['nome'] = $row['nome'];
	$_SESSION['lvl'] = $row['idPessoa'];
	$_SESSION['tipo'] = $row['tipo'];
	header('location:homeon.php');
}
?>