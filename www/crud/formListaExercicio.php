<?php
$conn = include_once('mysql.inc.php');

if ( isset($_GET["idQuestao"]) )
	$idQuestao = $_GET["idQuestao"];
if ( isset($_GET["idAssunto"]) )
	$idAssunto = $_GET["idAssunto"];
?>

<html>
<head>
<meta charset="utf-8">
</head>

<body>
	<form action="/crud/cadastrarListaExercicio.php" method="post">
	
		<?php	
			$campoHidden = "<input type= 'text'";
			$campoHidden .= "name='idQuestao' value='";
			$campoHidden .= $idQuestao."'/>";
			echo $campoHidden;
			$campoHidden2 = "<input type= 'text'";
			$campoHidden2 .= "name='idAssunto' value='";
			$campoHidden2 .= $idAssunto."'/>";
			echo $campoHidden2;			
			
		?>
		Nome: <input type="text"name="nome" value="---"/>
		<br/><br/>
		Descricao: <input type="text" name="descricao" value="---"/>
		<br/><br/>
		<input type="submit" value="Salvar"/>
	</form>
</body>

</html>

