<?php 
require 'sanitize.php';

$servername = "localhost";
$username = "root";
$password = "Questionetudo1";
$dbname= "DB";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nome = sanitize($_POST["nome"]);
$email = sanitize($_POST["email"]);
$matricula = sanitize($_POST["matricula"]);
$senha = sanitize($_POST["senha"]);
$tipo = sanitize($_POST["tipo"]);

echo $nome;
echo $email;
echo $matricula;
echo $senha;
echo $tipo;

$sql = "INSERT INTO $dbname.tbPessoa (nome,senha,email,GRR_OU_OOUTROGRR,tipo) VALUES ('".$nome."','".$senha."','".$email."','".$matricula."','".$tipo."')";
echo $sql;
mysqli_query($conn, $sql);

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="css/bootstrap.css" rel="stylesheet">
	<title>Cadastro</title>
</head>
<body class="bglogin">

	<div class="cadastrobox">
		<div class="logintitle">CADASTRO</div>
		<div class="formlogin">
		 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			  NOME:<br>
			  <input class="inputlogin" type="text" name="nome" required><br>
			  E-MAIL:<br>
			  <input class="inputlogin" type="email" name="email" required><br>
			  MATRICULA:<br>
			  <input class="inputlogin" type="text" name="matricula" required><br>
			  SENHA:<br>
			  <input class="inputlogin" type="text" name="senha" required><br>
			  <h4>Tipo de usuário</h4>
			  <input type="radio" name="tipo" value="A" required> Aluno<br>
        	  <input type="radio" name="tipo" value="P" required> Professor<br>
        	  <button type="submit" class="btncadastro"><strong>CADASTRAR</strong></button>
		</form> 
		<div class="limpa"></div>
			  
		</div>
	</div>

</body>
</html>

