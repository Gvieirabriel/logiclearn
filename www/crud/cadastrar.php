<?php
$conn = include_once('mysql.inc.php');

$id = NULL;

$id = $_POST["usrId"];

if(isset($_POST["usrId"]))
{
	$id = $_POST["usrId"];
}

$nome = $_POST["nome"];
$login = $_POST["login"];
$senha = $_POST["senha"];

if(isset($id))
{
	$sql = "update tbUsuario set nome='".$nome."', ";
	$sql .= "login='".$login."', ";
	$sql .= "senha='".$senha."' where id = ".$id;
}
else
{	
	$sql = "insert into tbUsuario (nome, login, senha)";
	$sql .= " values ('".$nome."', '".$login."', '";
	$sql .= $senha."')";
}
$res = mysqli_query($conn, $sql);
if ( !$res )
	echo "Erro ao salvar dados";

header("location:/crud/listar.php");
?>