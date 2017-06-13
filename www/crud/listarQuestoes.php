<?php
$conn = include_once('mysql.inc.php');

$res = NULL;

$num_questao = $_GET["num_questao"];

$id = $_GET["id"];

$sql = "select * from tbQuestao where idListaExercicio = ".$id." ORDER BY idListaExercicio LIMIT ".$num_questao.",1;";

$num_questao = $num_questao + 1;

$res = mysqli_query($conn, $sql);

if($res === FALSE) { 
   header("location:/crud/listar.php");
}

echo "<center>";

echo "<a href='/crud/home.php'>Home</a>";
echo " | ";
echo "<a href='form.php'>Novo</a> <br/><br/>";


$row = mysqli_fetch_assoc($res);
	
$sql2 = "select * from tbAlternativa where idQuestao = ".$row["idQuestao"];

$res2 = mysqli_query($conn, $sql2);

if($res2 === FALSE) { 
   die(mysqli_error());
}

echo "<form action='/crud/listarQuestoes.php?id=".$id."&num_questao=".$num_questao."' method='post'>";

echo "<table border='1px' style='width:80%'>";

echo "<th>ID</th>";
echo "<th>Enunciado</th>";

echo "<tr>";

echo "<td><center>".$row["idQuestao"]."</center></td>";
echo "<td><center>".$row["enunciado"]."</center></td>";

echo "</tr>";

echo "</table>";


while ($row2 = mysqli_fetch_assoc($res2)) {
	echo "<INPUT TYPE='radio' NAME='OPCAO' VALUE=".$row2["idAlternativa"]." CHECKED> ".$row2["letra"].") ".$row2["enunciado"];
}

echo "<button type='submit' name='resposta' class='btn-link'>PROXIMA</button>";

echo "</form>";

echo "</center>";

?>