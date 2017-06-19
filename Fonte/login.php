<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="css/bootstrap.css" rel="stylesheet">
	<title>Login</title>
</head>
<body class="bglogin">

	<div class="loginbox">
		<div class="logintitle">LOGIN</div>
		<div class="formlogin">
		<form action="loginscript.php" method="post">
			<?php session_start(); echo $_SESSION['er'] ?><br>
			NOME:<br>
			<input class="inputlogin" type="text" name="username"><br>
			SENHA:<br>
			<input class="inputlogin" type="password" name="password">
			<button type="submit" class="btnlogin2"><strong>ENTRAR</strong></button>
		</form>
		<form action="cadastrar.php">
			<button type="submit" class="btnlogin1"><strong>CADASTRAR</strong></button>
		</form>
			<a href="recuperar.php">Esqueceu sua senha?</a>
		</div>
	</div>

</body>
</html>
