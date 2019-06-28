   <html>
    <head>
    <title>Inscripcion</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="estilo.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Inscripcion</h2>
    
    <?php
    
		$dbhost = 'localhost:3036';
		$dbuser = 'root';
		$dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		if($conn)
		{
			echo 'Conection Succesfully...';
			
								
		}
		
		else
		{
			echo 'Connection Failure...';		
		}
		
		$sql = "CREATE TABLE personas(".
		"id INT AUTO_INCREMENT,".
      "nombreApellido VARCHAR(35) NOT NULL,".
      "dni VARCHAR(9) NOT NULL,".
      "fechaNacimiento INTEGER NOT NULL,".
      "direccion VARCHAR(40) NOT NULL,".
      "localidad VARCHAR(20) NOT NULL,".
      "telefono VARCHAR(10) NOT NULL,".
      "movil VARCHAR(10) NOT NULL,".
      "email VARCHAR(50) NOT NULL,".
      "observaciones VARCHAR(255) NOT NULL,".
      "nombrePariente VARCHAR(40) NOT NULL,".
      "parentezco VARCHAR(10) NOT NULL,".
      "telContacto VARCHAR(10) NOT NULL,".
      "PRIMARY KEY (id)); ";

	mysql_select_db('breakTime');
	$retval = mysql_query($sql, $conn);
	
	if(!$retval)
	{
		echo 'Could not create Table: ' . mysql_error(); 	
	}
	
	else
	 {	
		echo 'Table create Succesfully\n';
	 }
					
						$nombreApellido = mysql_real_escape_string($_POST["nombreApellido"], $conn);
					   $dni = mysql_real_escape_string($_POST["dni"], $conn);
    					$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
    					$direccion = mysql_real_escape_string($_POST["direccion"], $conn);
    					$localidad = mysql_real_escape_string($_POST["localidad"], $conn);
    					$telefono = mysql_real_escape_string($_POST["telefono"], $conn);
    					$movil = mysql_real_escape_string($_POST["movil"], $conn);
    					$email = mysql_real_escape_string($_POST["email"], $conn);
    					$descripcion = mysql_real_escape_string($_POST["descripcion"], $conn);
    					$pariente = mysql_real_escape_string($_POST["nombrePariente"], $conn);
    					$parentezco = mysql_real_escape_string($_POST["parentezco"], $conn);
    					$telContacto = mysql_real_escape_string($_POST["telContacto"], $conn);
    
	
	
		$sqlInsert = "INSERT INTO personas ".
		"(nombreApellido,dni,fechaNacimiento,direccion,localidad,telefono,movil,email,observaciones,nombrePariente,parentezco,telContacto)".
		"VALUES ".
      "('$nombreApellido','$dni','$fNac','$direccion','$localidad','$telefono','$movil','$email','$descripcion','$pariente','$parentezco','$telContacto')";
  			
//mysql_select_db('breakTime');
$retval = mysql_query($sqlInsert,$conn);

if(!$retval)
{
	echo 'Could not enter data: ' . mysql_error();
}

else
{
echo "Registry Succesfully\n";
}	
	//cerramos la conexion
	
	mysql_close($conn);

	 	
	  	
    
    ?>
    </div>
    </div>
    </body>
    </html>