<?php
$conn = include_once('mysql.inc.php');

$id = $_GET["id"];


$sql = "delete from tbUsuario where id='".$id."'; ";


$res = mysqli_query($conn, $sql);
if ( !$res ){
	echo "Erro ao salvar dados";
}

else{
header("location:/crud/listar.php");
}
?>