<html>
<head>
<title>ejercicio4</title>
</head>
<body>
<?php
$count=0;
echo "<table border=1>";
echo "<tr>";
for($n1=1; $n1<=10; $n1++)
{
	echo "<td>" , "$n1", "</td>";
	$count++;	
}
echo "</tr>";
echo "</table>";
echo "<hr>";
echo "Hay $count numeros";

?>
</body>
</html>