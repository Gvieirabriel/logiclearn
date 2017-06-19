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
	<link rel="stylesheet" type="text/css" href="/front/css/style.css">
	<title>Acertos</title>
</head>

<body class="bglogin">

	<div class="searchbox">
	<br>
		<div class="resultForm">
			<div class="logintitle">ACERTOU</div>
			<?php
				if(isset($id))
				{
					echo "<div class='logintitle'>".$row['acertos']."</div>";
					echo "<div class='logintitle'>DE</div>";
					echo "<div class='logintitle'>".$tam."</div>";	
				}
			?>
			</div>
			<form action='/crud/home.php'>
				<br><button type="submit" class="buttonSearch"><strong>RETORNAR</strong></button>
			</form>	
		</div>
	</div>
</body>
</html>
