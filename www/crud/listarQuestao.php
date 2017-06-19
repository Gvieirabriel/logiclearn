<?php
$conn = include_once('mysql.inc.php');

$res = NULL;

$num_questao = $_GET["num_questao"];

$id = $_GET["id"];

$tam = $_GET["tam"];
echo $tam;
echo $num_questao;
echo $id;
$sql = "select tbQuestao.* from tbQuestao INNER JOIN tbListaExercicioQuestao ON tbListaExercicioQuestao.idQuestao = tbQuestao.idQuestao INNER JOIN tbListaExercicio ON tbListaExercicioQuestao.idListaExercicio = tbListaExercicio.idListaExercicio where tbListaExercicio.idListaExercicio = ".$id." ORDER BY tbListaExercicio.idListaExercicio LIMIT ".$num_questao.",1;";

$res = mysqli_query($conn, $sql);

if($res === FALSE) { 
   header("location:/crud/listar.php");
}

echo "<center>";

echo "<a href='listarListas.php.php'>Home</a>";
echo " | ";
echo "<a href='form.php'>Novo</a> <br/><br/>";

$prox_num_questao = $num_questao + 1 ;
$ant_num_questao = $num_questao - 1 ;

$row = mysqli_fetch_assoc($res);
	
$sql2 = "select * from tbAlternativa where idQuestao = ".$row["idQuestao"].";";

$res2 = mysqli_query($conn, $sql2);

if($res2 === FALSE) { 
   die(mysqli_error());
}

echo "<table border='1px' style='width:80%'>";

echo "<tr>";

$cont = 0;

while ( $cont < $tam) {

	echo "<td><center><a href='/crud/listarQuestoes.php?id=".$row["idListaExercicio"]."&num_questao=".$cont."&tam=".$tam."'";
    $cont = $cont + 1;
    echo "'style=text-decoration:none>".$cont."</a>";   

}

echo "</tr>";

echo "<tr><center><form action='/crud/acertos.php?id=".$row["idListaExercicio"]."&tam=".$tam."' method='post'>";
echo "<button type='submit' name='finalizar' class='btn-link'> FINALIZAR </button>";
echo "</form>";

echo "</tr>";

echo "</table>";

echo "<table border='1px' style='width:80%'>";

echo "<th>ID</th>";
echo "<th>Enunciado</th>";

echo "<tr>";

echo "<td><center>".$row["idQuestao"]."</center></td>";
echo "<td><center>".$row["enunciado"]."</center></td>";

echo "</tr>";

echo "</table>";

echo "<form method='POST'>";
while ($row2 = mysqli_fetch_assoc($res2)) {
	echo "<INPUT TYPE='radio' NAME='OPCAO' VALUE=".$row2["idAlternativa"]." CHECKED> ".$row2["letra"].") ".$row2["enunciado"];
}
echo "<input type='submit'/>";
echo "</form>";

if(isset($_POST["OPCAO"]))
{
	$radioVal = $_POST["OPCAO"];
	$sql3 = "insert into tbResposta (idPessoa, idQuestao, idAlternativa) values (1,".$row["idQuestao"].",".$radioVal.");";
	//$sql3 = "select * from tbResposta where idQuestao = ".$row["idQuestao"]." AND idPessoa = 1"; //colocar o id do user
	if( !mysqli_query($conn, $sql3)){
		$sql3 = "update tbresposta SET idAlternativa=".$radioVal." WHERE idPessoa=1 and idQuestao=".$row["idQuestao"].";";
		mysqli_query($conn, $sql3);
	}
}

if($prox_num_questao < $tam){
	echo "<form action='/crud/listarQuestoes.php?id=".$id."&num_questao=".$prox_num_questao."&tam=".$tam."' method='post'>";

	echo "<button type='submit' name='resposta' class='btn-link'> PROXIMA </button>";

	echo "</form>";
}

if($ant_num_questao >= 0){
	echo "<form action='/crud/listarQuestoes.php?id=".$id."&num_questao=".$ant_num_questao."&tam=".$tam."' method='post'>";

	echo "<button type='submit' name='resposta' class='btn-link'> ANTERIOR </button>";

	echo "</form>";
}

echo "</center>";

?>