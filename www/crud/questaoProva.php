<?php
$conn = include_once('mysql.inc.php');

$idPessoa = 1;

$idQuestao = $_GET["idQuestao"];
$idAssunto = $_GET["idAssunto"];

$sql = "select * from tbListaExercicio INNER JOIN tbListaExercicioPessoa ON tbListaExercicioPessoa.idListaExercicio = tbListaExercicio.idListaExercicio where tbListaExercicioPessoa.idPessoa =".$idPessoa." ORDER BY tbListaExercicio.idListaExercicio DESC;";

$res = mysqli_query($conn, $sql);

echo "<center>";

echo "<a href='/crud/listarListas.php'>Home</a>";
echo " | ";
echo "<a href='formListaExercicio.php/?idAssunto=".$idAssunto."&idQuestao=".$idQuestao."'>Novo</a> <br/><br/>";

echo "<table border='1px' style='width:80%'>";
echo "<th>Nome</th>";
echo "<th>Descrição</th>";

while ($row = mysqli_fetch_assoc($res)) {
	echo "<tr>";
    echo "<td><center>";
    echo "<a href='/crud/adicionarQuestaoListaExercicio.php?idListaExercicio=".$row["idListaExercicio"]."&idQuestao=".$idQuestao."&idAssunto=".$idAssunto;
    echo "'style=text-decoration:none> ".$row["nomeListaExercicio"]." </a>";
    echo "<td><center>".$row["descricao"]."</center></td>";
    echo "</tr>";
}
echo "</table>";
echo "</center>";
///crud/listarQuestao.php?id=".$row["idListaExercicio"]."&num_questao=0&tam=".$row["tamanho"]."
?>