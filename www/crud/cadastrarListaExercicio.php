<?php
$conn = include_once('mysql.inc.php');

$idPessoa = 1;

$idAssunto = NULL;

$idAssunto = $_POST["idAssunto"];
$idQuestao = $_POST["idQuestao"];
$nome = "---";
if(isset($_POST["nome"])){
	$nome = $_POST["nome"];
}
$descricao = $_POST["descricao"];

$sql = "insert into tbListaExercicio (nomeListaExercicio, descricao)";
$sql .= " values ('".$nome."', '".$descricao."');";
echo $sql;
$res = mysqli_query($conn, $sql);
if ( !$res )
	echo "Erro ao salvar dados";

$sql = "select * from tbListaExercicio ORDER BY idListaExercicio DESC LIMIT 0,1;";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

$sql = "insert into tbListaExercicioPessoa (idPessoa, idListaExercicio) values ('".$idPessoa."','".$row["idListaExercicio"]."');";
echo $sql;
$res = mysqli_query($conn, $sql);

header("location:/crud/questaoProva.php?idAssunto=".$idAssunto."&idQuestao=".$idQuestao);
?>