<?php
$conn = include_once('mysql.inc.php');

$idPessoa = 1;

$idListaExercicio = NULL;

$idListaExercicio = $_GET["idListaExercicio"];
$idQuestao = $_GET["idQuestao"];
$idAssunto = $_GET["idAssunto"];

$sql = "select * from tbListaExercicio where tbListaExercicio.idListaExercicio =".$idListaExercicio."; ";
echo $sql;
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

$tam = $row['tamanho'];
$tam = $tam + 1;

$sql = "update tbListaExercicio set tamanho=".$tam." ";
$sql .= "where idListaExercicio = ".$idListaExercicio.";";
echo $sql;
$res = mysqli_query($conn, $sql);
$sql = "insert into tbListaExercicioQuestao (idListaExercicio, idQuestao)  values ('".$idListaExercicio."','".$idQuestao."');";
echo $sql;
mysqli_query($conn, $sql);
header("location:/crud/listarQuestoes.php?idAssunto=".$idAssunto);
?>