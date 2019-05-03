<?php

echo 

'<html>
<head>
<title>Formulario</title>
</head>
<body>
<hr>
<form action="procFormulario.php" method="post">
<p>Nombre: <input  type="text" name="nombre" maxlenght="25" /></p><br>
<p>Apellido: <input  type="text" name="apellido" maxlenght="25"/></p><br>
<p>DNI: <input  type="text" name="dni" maxlenght="9"/><br>
<p>Fecha Nac.: <input  id="date" type="date" name="f_nac"/></p><br>
<p>Edad: <input  type="text" name="edad" maxlenght="3" /></p><br>
<p><input type="submit" name="Enviar" /></p>
<hr>
</form>';

?>


