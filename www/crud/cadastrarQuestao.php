<?php
$conn = include_once('mysql.inc.php');

$idQuestao = NULL;

$idPessoa = 1;

if(isset($_POST["idQuestao"]))
{
	$idQuestao = $_POST["idQuestao"];
}

$a = "---";
$b = "---";
$c = "---";
$d = "---";
$e = "---";
$enunciado = "---";
$resposta = a;

if(isset($_POST["a"]))
	$a = $_POST["a"];
	
if(isset($_POST["b"]))
	$b = $_POST["b"];

if(isset($_POST["c"]))
	$c = $_POST["c"];

if(isset($_POST["d"]))
	$d = $_POST["d"];

if(isset($_POST["e"]))
	$e = $_POST["e"];

if(isset($_POST["resposta"]))
	$resposta = $_POST["resposta"];

if(isset($_POST["enunciado"]))
	$enunciado = $_POST["enunciado"];

if(isset($_POST["idAssunto"]))
	$idAssunto = $_POST["idAssunto"];


if(isset($idQuestao))
{
	$sql = "update tbquestao set enunciado='".$enunciado."' ";
	$sql .= "where idQuestao = ".$idQuestao.".";
	$res = mysqli_query($conn, $sql);
	$sql = "update tbalternativa set enunciado='".$a."' ";
	$sql .= "where idQuestao = ".$idQuestao." AND letra = 'a';";
	$res = mysqli_query($conn, $sql);
	$sql = "update tbalternativa set enunciado='".$b."' ";
	$sql .= "where idQuestao = ".$idQuestao." AND letra = 'b';";
	$res = mysqli_query($conn, $sql);
	$sql = "update tbalternativa set enunciado='".$c."' ";
	$sql .= "where idQuestao = ".$idQuestao." AND letra = 'c';";
	$res = mysqli_query($conn, $sql);
	$sql = "update tbalternativa set enunciado='".$d."' ";
	$sql .= "where idQuestao = ".$idQuestao." AND letra = 'd';";
	$res = mysqli_query($conn, $sql);
	$sql = "update tbalternativa set enunciado='".$e."' ";
	$sql .= "where idQuestao = ".$idQuestao." AND letra = 'e';";
	$res = mysqli_query($conn, $sql);

	$sql = "select * from tbalternativa where idQuestao = ".$idQuestao." AND letra = '".$resposta."';";
	//echo $sql;
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);

	$sql = "update tbalternativacorreta set idAlternativa=".$row["idAlternativa"]." where idQuestao = ".$idQuestao.";";
}
else
{	
	
	$sql = "insert tbQuestao (enunciado, idPessoa, idAssunto)";
	$sql .= "values ('".$enunciado."', '".$idPessoa."', '".$idAssunto."');";
	$res = mysqli_query($conn, $sql);

	$sql = "select * from tbQuestao ORDER BY idQuestao DESC LIMIT 0,1;";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);

	$sql = "insert into tbalternativa (enunciado, letra, idQuestao) values ('".$a."','a','".$row["idQuestao"]."');";
	$res = mysqli_query($conn, $sql);

	$sql = "insert into tbalternativa (enunciado, letra, idQuestao)  values ('".$b."','b','".$row["idQuestao"]."')";
	$res = mysqli_query($conn, $sql);

	$sql = "insert into tbalternativa (enunciado, letra, idQuestao)  values ('".$c."','c','".$row["idQuestao"]."')";
	$res = mysqli_query($conn, $sql);

	$sql = "insert into tbalternativa (enunciado, letra, idQuestao)  values ('".$d."','d','".$row["idQuestao"]."')";
	$res = mysqli_query($conn, $sql);

	$sql = "insert into tbalternativa (enunciado, letra, idQuestao)  values ('".$e."','e','".$row["idQuestao"]."');";
	$res = mysqli_query($conn, $sql);

	$sql = "select * from tbalternativa where idQuestao = ".$row["idQuestao"]." AND letra = '".$resposta."';";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);

	$sql = "insert into tbalternativacorreta (idQuestao, idAlternativa)  values ('".$row["idQuestao"]."','".$row["idAlternativa"]."');";
}
$res = mysqli_query($conn, $sql);


header("location:/crud/listarQuestoes.php?idAssunto=".$idAssunto);
?>