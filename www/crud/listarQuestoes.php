<?php
$conn = include_once('mysql.inc.php');

$vari = 0;

$idPessoa = $_SESSION["idPessoa"];

$idPessoa = 1;

if ( isset($_GET["idAssunto"]) )
{
	$idAssunto = $_GET["idAssunto"];
	$sql = "select * from tbQuestao where idAssunto = ".$idAssunto.";";
	$res = mysqli_query($conn, $sql);
	if($res === FALSE) { 
	   die(mysqli_error());
	}
}

echo "<center>";

echo "<a href='/crud/home.php'>Home</a>";
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

    echo "<a href='/crud/adicionaQuestao.php?idQuestao=".$row["idQuestao"]."&idAssunto=".$idAssunto;
    echo "'style=text-decoration:none> | Adicionar</a>";

    echo "</center></td>";
    echo "</tr>";
}
echo "</table>";
echo "</center>";
?>