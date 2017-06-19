<?php
require 'sanitize.php';
$conn = include_once('mysql.inc.php');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql2 = "SELECT (nomeCurso) FROM tbCurso";
$curso_set = mysqli_query($conn,$sql2);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $curso = $_POST["curso"];
  $disciplina = sanitize($_POST["disciplina"]);

  $sql1 = "SELECT idCurso, nomeCurso FROM tbCurso WHERE nomeCurso ='".$curso."';";
  $idcurso_set = mysqli_query($conn, $sql1);

  $row = mysqli_fetch_assoc($idcurso_set);

  $idcurso = $row["idCurso"];

  $sql = "INSERT INTO tbDisciplina (idCurso, nomeDisciplina) VALUES (".$idcurso.", '".$disciplina."')"; 
  mysqli_query($conn, $sql);
  header('location:disciplinas.php');
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

  <title>Cadastro de Disciplina</title>
</head>
  <div class="topac">
    <img src="img/person-flat.png" width="120" height="100">
    <img class ="logTop" src="img/logo2.png" width="200" height="75">
    <p><strong><?php session_start(); echo $_SESSION['nome'] ?></strong></p>
    <p><strong><?php echo $_SESSION['lvl'] ?></strong></p>
  </div>
   <div class="topnav" id="myTopnav">
    <a href="homeon.php">HOME</a>
    <a class="a2" href="cursos.php">CURSOS</a>
    <a href="disciplinas.php">DISCIPLINAS</a>
    <a class="a2" href="assuntos.php">ASSUNTOS</a>
    <a href="exercicios.php">EXERCICIOS</a>
    <a class="a2" href="roomsearch.php">SALAS</a>
    <a href="best.php">MELHORES DA SEMANA</a>
    <input class="searchhomeon" placeholder="Pesquisa" type="text" name="search">
    <form action="profile.php">
    <button type="submit" class="btnhome2"><strong>PERFIL</strong></button>
    </form>
    <form action="home.php">
    <button type="submit" class="btnhome"><strong>SAIR</strong></button>
    </form>
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
    <div class="cadtitle">CADASTRO DE DISCIPLINA</div>
    <div class="formlogin">
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        CURSO:<br>
        <select name="curso">
        <option>Selecionar</option>
        <?php if(mysqli_num_rows($curso_set) > 0): ?>
        <?php while($curso = mysqli_fetch_assoc($curso_set)): ?>
            <option value="<?php echo $curso["nomeCurso"] ?>" > <?php echo $curso["nomeCurso"] ?> </option>
        <?php endwhile; ?>
        <?php endif; ?>
        </select> 
        <br>
        NOME:<br>
        <input class="inputlogin" type="text" name="disciplina" required><br>
        <button type="submit" class="btncadastro"><strong>CADASTRAR</strong></button>
    </form> 
    </div>
    </div>


  </body>
</html>
