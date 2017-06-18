<?php
$conn = include_once('mysql.inc.php');

$row = NULL;
$row2 = NULL;

$idAssunto = $_GET['idAssunto'];

if ( isset($_GET["idQuestao"]) )
{
	$idQuestao = $_GET["idQuestao"];
	
	$sql = "select * from tbQuestao where idQuestao = ".$idQuestao;
	$sqla = "select * from tbAlternativa where idQuestao = ".$idQuestao." LIMIT 0,1";
	$sqlb = "select * from tbAlternativa where idQuestao = ".$idQuestao." LIMIT 1,1";
	$sqlc = "select * from tbAlternativa where idQuestao = ".$idQuestao." LIMIT 2,1";
	$sqld = "select * from tbAlternativa where idQuestao = ".$idQuestao." LIMIT 3,1";
	$sqle = "select * from tbAlternativa where idQuestao = ".$idQuestao." LIMIT 4,1";
	
	$res = mysqli_query($conn, $sql);
	$resa = mysqli_query($conn, $sqla);
	$resb = mysqli_query($conn, $sqlb);
	$resc = mysqli_query($conn, $sqlc);
	$resd = mysqli_query($conn, $sqld);
	$rese = mysqli_query($conn, $sqle);
	
	if($res === FALSE) { 
	   die(mysqli_error());
	}
	
	$row = mysqli_fetch_assoc($res);
	$rowa = mysqli_fetch_assoc($resa);
	$rowb = mysqli_fetch_assoc($resb);
	$rowc = mysqli_fetch_assoc($resc);
	$rowd = mysqli_fetch_assoc($resd);
	$rowe = mysqli_fetch_assoc($rese);
}
?>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
	<form action="cadastrarQuestao.php" method="post">
	
		<?php
			if(isset($idQuestao))
			{
				$campoHidden = "<input type= 'hidden'";
				$campoHidden .= "name='idQuestao' value='";
				$campoHidden .= $row["idQuestao"]."'/>";
				echo $campoHidden;				
			}
		?>
		Enunciado: <input type="text"
					name="enunciado"
					value="<?php if(isset($row))
							echo $row['enunciado'];
					 ?>"
				/><br/><br/>
		a) <input type="text"
					name="a"
					value="<?php if(isset($rowa))
							echo $rowa['enunciado'];
					 ?>"
				/><br/><br/>
		b) <input type="text"
					name="b"
					value="<?php if(isset($rowb))
							echo $rowb['enunciado'];
					 ?>"
				/><br/><br/>
		c) <input type="text"
					name="c"
					value="<?php if(isset($rowc))
							echo $rowc['enunciado'];
					 ?>"
				/><br/><br/>
		d) <input type="text"
					name="d"
					value="<?php if(isset($rowd))
							echo $rowd['enunciado'];
					 ?>"
				/><br/><br/>
		e) <input type="text"
					name="e"
					value="<?php if(isset($rowe))
							echo $rowe['enunciado'];
					 ?>"
				/><br/><br/>
			<input type="hidden"
					name="idAssunto"
					value="<?php echo $idAssunto;
					 ?>"
				/>
		<input type="submit" value="Salvar"/>
	</form>
</body>

</html>

