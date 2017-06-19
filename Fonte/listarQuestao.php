<?php
$conn = include_once('mysql.inc.php');

$res = NULL;

if(isset($_POST["num_questao"]))
	$num_questao = $_POST["num_questao"];

if(isset($_POST["id"]))
	$id = $_POST["id"];

if(isset($_POST["tam"]))
	$tam = $_POST["tam"];

if(isset($_GET["num_questao"]))
	$num_questao = $_GET["num_questao"];

if(isset($_GET["id"]))
	$id = $_GET["id"];

if(isset($_GET["tam"]))
	$tam = $_GET["tam"];

$sql = "select * from tbQuestao INNER JOIN tbListaExercicioQuestao ON tbListaExercicioQuestao.idQuestao = tbQuestao.idQuestao where tbListaExercicioQuestao.idListaExercicio = ".$id." ORDER BY tbListaExercicioQuestao.idListaExercicio LIMIT ".$num_questao.",1;";

$res = mysqli_query($conn, $sql);

if($res === FALSE) { 
   header("location:/crud/listar.php");
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="css/bootstrap.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <title>Disciplinas</title>
</head>
<body class="bglogin">

<div class="questaobox">
<?php
echo "<html>";
echo "<head>";
echo "	<meta charset='utf-8'>";
echo "	<link rel='stylesheet' type='text/css' href='/front/css/style.css'>";
echo "	<title>Acertos</title>";
echo "</head>";

echo "<body class='bglogin'>";

echo "	<div class='searchbox'>";

echo "<center>";

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

	echo "<td><center><a href='/crud/listarQuestao.php?id=".$row["idListaExercicio"]."&num_questao=".$cont."&tam=".$tam."'";
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

echo "<th>Enunciado</th>";

echo "<tr>";

echo "<td><center>".$row["enunciado"]."</center></td>";

echo "</tr>";

echo "</table>";

echo "<form method='POST'>";
while ($row2 = mysqli_fetch_assoc($res2)) {
	echo "<INPUT TYPE='radio' NAME='OPCAO' VALUE=".$row2["idAlternativa"]." CHECKED> ".$row2["letra"].") ".$row2["enunciado"];
}
echo "<input type='submit'/>";

echo "<button type='submit' name='LIKE' class='btn-link'> LIKE </button>";

echo "<button type='submit' name='DESLIKE' class='btn-link'> DESLIKE </button>";

echo "</form>";

if(isset($_POST["LIKE"]))
{
	$val = $_POST["LIKE"];
	$sum = $row["likes"] +1;
	$sql3 = "update tbQuestao  SET likes=".$sum." WHERE idQuestao= ".$row["idQuestao"].";";
	mysqli_query($conn, $sql3);
}

if(isset($_POST["DESLIKE"]))
{
	$val = $_POST["DESLIKE"];
	$sum = $row["deslikes"] +1;
	$sql3 = "update tbQuestao  SET deslikes=".$sum." WHERE idQuestao= ".$row["idQuestao"].";";
	mysqli_query($conn, $sql3);
}

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
	echo "<form action='/crud/listarQuestao.php?id=".$id."&num_questao=".$prox_num_questao."&tam=".$tam."' method='post'>";

	echo "<button type='submit' name='OPCAO' class='btn-link'> PROXIMA </button>";

	echo "</form>";
}

if($ant_num_questao >= 0){
	echo "<form action='/crud/listarQuestao.php?id=".$id."&num_questao=".$ant_num_questao."&tam=".$tam."' method='post'>";

	echo "<button type='submit' name='OPCAO' class='btn-link'> ANTERIOR </button>";

	echo "</form>";
}

echo "</center>";

?>
</div>
</body>
</html>