<?php
$conn = include_once('mysql.inc.php');

$idQuestao = $_GET["idQuestao"];

$idAssunto = 1;
if (isset($_POST["idAssunto"])) {
	$idAssunto = $_POST["idAssunto"];
}


$sql = "delete from tbResposta where idQuestao='".$idQuestao."'; ";


$res = mysqli_query($conn, $sql);
if ( !$res ){
	echo "Erro ao salvar dados";
}

$sql = "delete from tbAlternativa where idQuestao='".$idQuestao."'; ";


$res = mysqli_query($conn, $sql);
if ( !$res ){
	echo "Erro ao salvar dados";
}

$sql = "delete from tbAlternativaCorreta where idQuestao='".$idQuestao."'; ";


$res = mysqli_query($conn, $sql);
if ( !$res ){
	echo "Erro ao salvar dados";
}

$sql = "delete from tbListaExercicioQuestao where idQuestao='".$idQuestao."'; ";


$res = mysqli_query($conn, $sql);
if ( !$res ){
	echo "Erro ao salvar dados";
}

$sql = "delete from tbQuestao where idQuestao='".$idQuestao."'; ";


$res = mysqli_query($conn, $sql);
if ( !$res ){
	echo "Erro ao salvar dados";
}
else{
header("location:/crud/listarQuestoes.php?idAssunto=");
}
?>