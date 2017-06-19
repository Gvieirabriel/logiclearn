<?php
require 'sanitize.php';
$conn = include_once('mysql.inc.php');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

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

  <title>Home</title>
</head>
  <div class="topnav" id="myTopnav">
    <a><img src="img/logo2.png" width="150" height="40"></a>
    <a href="home.php">HOME</a>
    <a class="a2" href="">MELHORES DA SEMANA</a>
    <a href="roomsearch.php">SALAS</a>
    <input class="searchhome" placeholder="Pesquisa" type="text" name="search">
    <form action="cadastro.php">
      <button type="submit" class="btnhome2" ><strong>CADASTRAR</strong></button>
    </form>
    <form action="login.php">
      <button type="submit" class="btnhome"><strong>ENTRAR</strong></button>
    </form>
  </div> 

  <body class="bghome">
  <img class="bgimg" src="img/logo.png" width="1300" height="900">
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
  </body>
</html>