<?php
require 'sanitize.php';
$conn = include_once('mysql.inc.php');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql2 = "SELECT * FROM tbQuestao ORDER BY likes DESC";
$best_set = mysqli_query($conn,$sql2);

$news = "SELECT * FROM tbQuestao ORDER BY idQuestao DESC LIMIT 5";
$questao_set = mysqli_query($conn,$news);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="css/bootstrap.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <title>Melhores da Semana</title>
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
         <?php if(mysqli_num_rows($questao_set) > 0): ?>
        <?php while($quest = mysqli_fetch_assoc($questao_set)): ?>
         <li class="list-group-item"><?php echo $quest["enunciado"]?> - <?php echo $quest["likes"]?></li>
        <?php endwhile; ?>
        <?php endif; ?>
        </ul>
    </div>

    <div class="selectboxhome">
    <div class="selecttitle"><center>Melhores da Semana</div>
    <ul>
        <?php if(mysqli_num_rows($best_set) > 0): ?>
        <?php while($best = mysqli_fetch_assoc($best_set)): ?>
        <li> <?php echo $best["enunciado"]?> - Likes: <?php echo $quest["likes"]?> - <?php echo $_SESSION['nome']?> </li>
        <?php endwhile; ?>
        <?php endif; ?>
    </ul> 
    </div>


  </body>
</html>
