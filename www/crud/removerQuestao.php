<?php
$conn = include_once('mysql.inc.php');

$idQuestao = $_GET["idQuestao"];

$idAssunto = 1;
if (isset($_POST["idAssunto"])) {
	$idAssunto = $_POST["idAssunto"];
}

$sql = "select * from tbResposta where idQuestao=".$idQuestao."'; ";

$res = mysqli_query($conn, $sql);
if ( $res ){
	$sql = "delete from tbResposta where idQuestao='".$idQuestao."'; ";
	if ( mysqli_query($conn, $sql) ){}

}

$sql = "delete from tbAlternativaCorreta where idQuestao='".$idQuestao."'; ";

$res = mysqli_query($conn, $sql);
if ( !$res ){
	echo "Erro ao salvar dados2";
}

$sql = "delete from tbAlternativa where idQuestao='".$idQuestao."'; ";


$res = mysqli_query($conn, $sql);
if ( !$res ){
	echo "Erro ao salvar dados3";
}

$sql = "select * from tbListaExercicioQuestao where idQuestao=".$idQuestao."'; ";
$res = mysqli_query($conn, $sql);

if ( $res ){
	$sql = "select * from tbListaExercicio INNER JOIN tbListaExercicioQuestao ON tbListaExercicioQuestao.idListaExercicio = tbListaExercicio.idListaExercicio where tbListaExercicioQuestao.idQuestao =".$idQuestao."'; ";
	$res = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($res)){
		$tam = $row['tamanho'];
		$tam = $tam - 1;
		$sql = "update tbListaExercicio set tamanho='".$tam."' ";
		$sql .= "where idListaExercicio = ".$row['idListaExercicio'].";";
		$res = mysqli_query($conn, $sql);
	}
	$sql = "delete from tbListaExercicioQuestao where idQuestao='".$idQuestao."'; ";
	if ( mysqli_query($conn, $sql)){}
}

$sql = "delete from tbQuestao where idQuestao='".$idQuestao."'; ";


$res = mysqli_query($conn, $sql);
if ( !$res ){
	echo "Erro ao salvar dados5";
}
else{
header("location:/crud/listarQuestoes.php?idAssunto=".$idAssunto);
}
?>