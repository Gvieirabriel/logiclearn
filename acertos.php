<?php
$conn = include_once('mysql.inc.php');

$row = NULL;

if ( isset($_GET["id"]) )
{
	$id = $_GET["id"];
	$sql = "select COUNT(tbalternativacorreta.idAlternativa) as acertos FROM tbalternativacorreta INNER JOIN tbresposta ON (tbalternativacorreta.idAlternativa = tbresposta.idAlternativa) INNER JOIN tbquestao ON (tbalternativacorreta.idQuestao = tbquestao.idQuestao) INNER JOIN tbListaExercicioQuestao ON tbListaExercicioQuestao.idQuestao = tbQuestao.idQuestao INNER JOIN tbListaExercicio ON tbListaExercicioQuestao.idListaExercicio = tbListaExercicio.idListaExercicio where tbresposta.idPessoa = 1 AND tbListaExercicio.idListaExercicio = ".$id.";";
	$res = mysqli_query($conn, $sql);
	if($res === FALSE) { 
	   die(mysqli_error());
	}
	$row = mysqli_fetch_assoc($res);
}

if ( isset($_GET["tam"]) )
{
	$tam = $_GET["tam"];
}

?>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
	    
		<?php
			if(isset($id))
			{
				echo "<form action='/crud/home.php'>";
				echo "<center>";				
				echo "Acertou <br/>";
				echo $row['acertos'];
				echo "<br/>de<br/>";
				echo $tam;				
				echo "<br/><button type='submit' class='btn-link'> RETORNAR </button>";
				echo "</center>";
				echo "</form>";
			}
		?>

</body>

</html>

