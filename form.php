<?php
$conn = include_once('mysql.inc.php');

$row = NULL;

if ( isset($_GET["id"]) )
{
	$id = $_GET["id"];
	$sql = "select * from tbUsuario where id = ".$id;
	$res = mysqli_query($conn, $sql);
	if($res === FALSE) { 
	   die(mysqli_error());
	}
	$row = mysqli_fetch_assoc($res);
}
?>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
	<form action="cadastrar.php" method="post">
	
		<?php
			if(isset($id))
			{
				$campoHidden = "<input type= 'hidden'";
				$campoHidden .= "name='usrId' value='";
				$campoHidden .= $row["id"]."'/>";
				echo $campoHidden;
			}
		?>
		Nome: <input type="text"
					name="nome"
					value="<?php if(isset($row))
							echo $row['nome'];
					 ?>"
				/><br/><br/>
		Login: <input type="text"
					name="login"
					value="<?php if(isset($row))
							echo $row['login'];
					 ?>"
				/><br/><br/>
		Senha: <input type="password"
					name="senha"
					value="<?php if(isset($row))
							echo $row['senha'];
					 ?>"
				/><br/><br/>
		<input type="submit" value="Salvar"/>
	</form>
</body>

</html>

