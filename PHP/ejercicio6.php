<html>
<head>
<title>ejercicio6</title>
</head>
<body>
<?php

echo "<p align='center'>
		<b>INGRESE SUS DATOS</b><hr>";

echo "<form method='POST' action='eje6.php'>";
	
echo "<table border='1' align='center'>
		<tr>		
		<th>Nombre: <input type='text' align='right' name='nombre' size=10></th><br>
		<th>Apellido: <input type='text' align='right' name='apellido' size=10></th><br>
		<th>DNI: <input type='text' align='right' name='dni' size=10></th><br>
		</tr>
		</table>";
echo "<input type='submit' name='ok' value='enviar'>";
echo "</form>";
?>
</body>
</html>