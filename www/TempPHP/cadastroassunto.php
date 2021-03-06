<?php
require 'sanitize.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql2 = "SELECT (nomeCurso) FROM $dbname.tbCurso";
$curso_set = mysqli_query($conn,$sql2);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $disciplina = $_POST["disciplina"];
  $curso = $_GET["curso"];

  $idcurso_set = "SELECT idCurso FROM $dbname.tbCurso WHERE nomeCurso ='".$curso."';";
  $row = mysqli_fetch_assoc($idcurso_set);
  $idcurso = $row["idCurso"];

  $sql4 = "SELECT (nomeDisciplina) FROM $dbname.tbDisciplina WHERE idCurso = ".$idcurso.";";
  $disciplina_set = mysqli_query($conn,$sql2);

  // $sql = "INSERT INTO $dbname.tbDisciplina (idCurso, nomeDisciplina) VALUES (".$idcurso.", '".$disciplina."')"; 
  // mysqli_query($conn, $sql);

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

  <title>Cadastro de Assunto</title>
</head>
  <div class="topac">
    <img src="img/person-flat.png" width="120" height="100">
    <img class ="logTop" src="img/logo2.png" width="200" height="75">
    <p><strong>Nome</strong></p>
    <p><strong>LVL</strong></p>
  </div>
  <div class="topnav" id="myTopnav">
    <a href="#home">HOME</a>
    <a class="a2" href="">CURSOS</a>
    <a href="">DISCIPLINAS</a>
    <a class="a2" href="">ASSUNTOS</a>
    <a href="">EXERCICIOS</a>
    <a class="a2" href="">SALAS</a>
    <a href="">MELHORES DA SEMANA</a>
    <input class="searchhomeon" placeholder="Pesquisa" type="text" name="search">
    <button type="submit" class="btnhome2"><strong>PERFIL</strong></button>
    <button type="submit" class="btnhome"><strong>SAIR</strong></button>
  </div>
  <body class="bghome">

  <ul class="list-group"><li class="news list-group-item"><a data-toggle="collapse" href="#collapse1">NOVIDADES</a></li></ul>
    <div id="collapse1" class="panel-collapse collapse">
         <ul class="list-group">
         <li class="list-group-item"><a class="news2" data-toggle="collapse" href="#collapse1">FECHAR</a></li>
          <li class="list-group-item">TESTE</li>
          <li class="list-group-item">TESTE</li>
          <li class="list-group-item">TESTE</li>
        </ul>
    </div>

    <div class="cadastroboxhome">
    <div class="cadtitle">CADASTRO DE ASSUNTO</div>
    <div class="formlogin">
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
        CURSO:<br>
        <select name="curso">
        <option value="default">Selecionar</option>
        <?php if(mysqli_num_rows($curso_set) > 0): ?>
        <?php while($curso = mysqli_fetch_assoc($curso_set)): ?>
            <option value="<?php echo $curso["nomeCurso"] ?>" > <?php echo $curso["nomeCurso"] ?> </option>
        <?php endwhile; ?>
        <?php endif; ?>
        </select> 
        <button type="submit">Marcar</button> 
        <br>
        DISCIPLINA:<br>
        <select>
        <option value="default">Selecionar</option>
        <?php if(mysqli_num_rows($disciplina_set) > 0): ?>
        <?php while($disciplina = mysqli_fetch_assoc($disciplina_set)): ?>
            <option value="<?php echo $curso["nomeCurso"] ?>" > <?php echo $disciplina["nomeDisciplina"] ?> </option>
        <?php endwhile; ?>
        <?php endif; ?>
        </select> 
        <br>
        NOME:<br>
        <input class="inputlogin" type="text" name="assunto" required=""><br>
    </form> 
    <div class="limpa"></div>
        <button type="submit" class="btncadastro"><strong>CADASTRAR</strong></button>

    </div>
    </div>


  </body>
</html>
