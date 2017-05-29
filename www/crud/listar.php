<?php
$conn = include_once('mysql.inc.php');

$sql = "select * from tbUsuario";

$res = mysqli_query($conn, $sql);

echo "<center>";

echo "<a href='/crud/home.php'>Home</a>";
echo " | ";
echo "<a href='form.php'>Novo</a> <br/><br/>";

echo "<table border='1px' style='width:80%'>";
echo "<th>ID</th>";
echo "<th>Nome</th>";
echo "<th>Login</th>";
echo "<th>Acoes</th>";

while ($row = mysqli_fetch_assoc($res)) {
	echo "<tr>";
    echo "<td><center>".$row["id"]."</center></td>";
    echo "<td><center>".$row["nome"]."</center></td>";
    echo "<td><center>".$row["login"]."</center></td>";
    echo "<td><center><a href='/crud/form.php?id=".$row["id"];
    echo "'style=text-decoration:none> Editar</a>";
    echo " | ";
    echo "<a href='/crud/remover.php?id=".$row["id"];
    echo "'style=text-decoration:none>Remover</a></center></td>";
    echo "</tr>";
}
echo "</table>";
echo "</center>";


?>