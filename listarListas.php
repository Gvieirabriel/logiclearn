<?php
$conn = include_once('mysql.inc.php');

$vari = 0;

$sql = "select * from tbListaExercicio";

$res = mysqli_query($conn, $sql);

echo "<center>";

echo "<a href='/crud/home.php'>Home</a>";
echo " | ";
echo "<a href='form.php'>Novo</a> <br/><br/>";

echo "<table border='1px' style='width:80%'>";
echo "<th>Nome</th>";
echo "<th>Descrição</th>";

while ($row = mysqli_fetch_assoc($res)) {
	echo "<tr>";
    echo "<td><center><form action='/crud/listarQuestao.php?id=".$row["idListaExercicio"]."&num_questao=0&tam=".$row["tamanho"]."' method='post'>";
    echo "<button type='submit' name='botaoProva' class='btn-link'>".$row["nomeListaExercicio"]."</button>";
	echo "</form>";
    echo "<td><center>".$row["descricao"]."</center></td>";
    echo "</tr>";
}
echo "</table>";
echo "</center>";
?>