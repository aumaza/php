<html>
<head>
<title>ejercicio7</title>
</head>
<body>
<?php

$etiquetas = serie( "nombre" => "Nombre" ,
						 "apellido" => "Apellido" ,
						 "dni" => "DNI" ,
						 "edad" => "Edad" ,
						 "direccion" => "Direccion" ,
						 "localidad" => "Localidad");
						
echo "<p align='center'>";
echo "<b>Ingrese sus Datos</b><hr>";

echo "<form action='eje7.php' method='POST'>";
echo "<table width='95%' border='0' cellspacing='0' cellpadding='2'>\n";
		
foreach($etiquetas as $campo=>$etiquetas)
{
	echo "<tr>
			<td align='right'><B>{$etiquetas[$campo]}
			<br>
			</td>
			<td>
			<input type='text' name='$campo' size='65' maxlengh='65'></td>
			</tr>";
}

echo "</table>";
echo "<div align='center'><p>";
echo "<input type='submit' name='ok' value='enviar'>";
echo "</p>";
echo "</div>";
echo "</form>";
?>

</body>
</html>