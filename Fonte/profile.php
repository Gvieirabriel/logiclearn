<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <title>PROFILE</title>
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

    <div id="profile">
      <img class="imgava" src="img/person-flat.png" width="160" height="140">

      <div class="profile_name">
          <h1><strong>NOME:</strong></h1>
           <h3><?php echo $_SESSION['nome'] ?></h3>

            <button type="button" class="btn btn-default btn-sm buttonEdit">
              <span class="glyphicon glyphicon-edit"></span>
            </button>
            
      </div>

      <div class="profile_details">
          <ul>
            <h1><strong>EMAIL:</strong></h1>
            <li><?php echo $_SESSION['email'] ?></li>

            <button type="button" class="btn btn-default btn-sm buttonEdit">
              <span class="glyphicon glyphicon-edit"></span>
            </button>

          </ul>
      </div>  
      <div class="profile_details">
          <ul>
            <h1><strong>SENHA:</strong></h1>
            <li>*****</li>

            <button type="button" class="btn btn-default btn-sm buttonEdit">
              <span class="glyphicon glyphicon-edit"></span>
            </button>
            
          </ul>
      </div>  
      <div class="profile_details">
          <ul>
            <h1><strong>NIVEL:</strong></h1>
            <li><?php echo $_SESSION['lvl'] ?></li>

            <button type="button" class="btn btn-default btn-sm buttonEdit">
              <span class="glyphicon glyphicon-edit"></span>
            </button>
            
          </ul>
      </div>  
      
    </div>


  </body>
</html>
