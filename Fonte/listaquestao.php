<?php
$conn = include_once('mysql.inc.php');

$vari = 0;

// $idPessoa = $_SESSION["idPessoa"];

$idPessoa = 1;
$idAssunto = 1;

// if ( isset($_GET["idAssunto"]) )
// {
//   $idAssunto = $_GET["idAssunto"];
  $sql = "select * from tbQuestao where idAssunto = ".$idAssunto.";";
  $res = mysqli_query($conn, $sql);
  if($res === FALSE) { 
     die(mysqli_error());
  }
//}

$idAssunto = 1;

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="css/bootstrap.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <title>Cadastro de Curso</title>
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

    <?php
echo "<center>";

echo "<a href='/crud/listarListas.php'>Home</a>";
echo " | ";
echo "<a href='formQuestoes.php?idAssunto=".$idAssunto."'>Novo</a> <br/><br/>";

echo "<table border='1px' style='width:80%'>";
echo "<th>Enunciado</th>";
echo "<th>Likes</th>";
echo "<th>Deslikes</th>";

while ($row = mysqli_fetch_assoc($res)) {
  
    echo "<tr>";
    echo "<td><center>".$row["enunciado"]."</center></td>";
    echo "<td><center>".$row["likes"]."</center></td>";
    echo "<td><center>".$row["deslikes"]."</center></td>";
    echo "<td><center>";
    echo "<a href='/crud/mostraQuestao.php?idQuestao=".$row["idQuestao"]."&idAssunto=".$idAssunto;
    echo "'style=text-decoration:none> Visualizar</a>";

    if($row["idPessoa"] == $idPessoa){
        echo "<a href='/crud/formQuestoes.php?idQuestao=".$row["idQuestao"]."&idAssunto=".$idAssunto;
        echo "'style=text-decoration:none> | Editar</a>";
        echo " | ";
        echo "<a href='/crud/removerQuestao.php?idQuestao=".$row["idQuestao"]."&idAssunto=".$idAssunto;
        echo "'style=text-decoration:none>Remover</a>";
    }

    echo "<a href='/crud/questaoProva.php?idQuestao=".$row["idQuestao"]."&idAssunto=".$idAssunto;
    echo "'style=text-decoration:none> | Adicionar</a>";

    echo "</center></td>";
    echo "</tr>";
}
echo "</table>";
echo "</center>";
?>

  </body>
</html>
