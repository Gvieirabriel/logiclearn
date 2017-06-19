<?php
$conn = include_once('mysql.inc.php');

$idQuestao = NULL;

$idPessoa = $_SESSION['id']; 

if(isset($_POST["idProva"]))
{
	$idProva = $_POST["idProva"];
}

	$sql = "select * from tbListaExercicio where idListaExercicio = ".$idProva.";";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);

   header('location:listarQuestao.php?id='.$idProva.'&num_questao=0&tam='.$row['tamanho']);
?>