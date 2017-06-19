<?php
$conn = include_once('mysql.inc.php');
$row = NULL;
$row2 = NULL;
// $idAssunto = $_GET['idAssunto'];
$idAssunto = 1;
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

    <div class="cadastroboxhome">
    <div class="cadtitle">CADASTRO DE EXERCÍCIO</div>
    <div class="formlogin">
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
    Enunciado: <input type="text" name="enunciado" value="<?php if(isset($row)) echo $row['enunciado'];?>"/><br/><br/>

    <input type="radio" name="resposta" value="a" checked> Resposta correta?<br>    
    a) <input type="text" name="a" value="<?php if(isset($rowa)) echo $rowa['enunciado'];?>"/><br/><br/>

    <input type="radio" name="resposta" value="b"> Resposta correta?<br>
    b) <input type="text" name="b" value="<?php if(isset($rowb)) echo $rowb['enunciado'];?>"/><br/><br/>

    <input type="radio" name="resposta" value="c"> Resposta correta?<br>    
    c) <input type="text" name="c" value="<?php if(isset($rowc)) echo $rowc['enunciado'];?>"/><br/><br/>

    <input type="radio" name="resposta" value="d"> Resposta correta?<br>    
    d) <input type="text" name="d" value="<?php if(isset($rowd)) echo $rowd['enunciado'];?>"/><br/><br/>

    <input type="radio" name="resposta" value="e"> Resposta correta?<br>    
    e) <input type="text" name="e" value="<?php if(isset($rowe)) echo $rowe['enunciado'];?>"/><br/><br/>

      <input type="hidden" name="idAssunto" value="<?php echo $idAssunto;?>"/>

    <button type="submit" class="btncadastro"><strong>CADASTRAR</strong></button>  
    </form> 
    </div>
    </div>


  </body>
</html>