   <html>
    <head>
    <title>Listado Docentes</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="estilo.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Listado Docentes</h2>
    
    <?php
  
    
	  
    
      $dbhost = 'localhost:3036';
		$dbuser = 'root';
		$dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		if($conn)
		{
			//echo 'Connection Succesfully...';
				
   
    //hacemos la consulta

   $sql = "SELECT * FROM docentes";	
   
   mysql_select_db('breakTime');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
 $i=0;
            echo "<table align='center' cellspacing='2' cellpadding='2' border='1'>";
              echo "<thead>
                    <th>ID</th>
                    <th>Nombre y Apellido</th>
                    <th>DNI</th>
                    <th>Fecha Nac</th>
                    <th>Dirección</th>
                    <th>Localidad</th>
                    <th>Teléfono</th>
                    <th>Móvil</th>
                    <th>Email</th>
                </thead>";



	while($fila = mysql_fetch_array($retval))
	{

		 echo "<p>";
		 echo "<tr>";		
		 echo "<td>".$fila['id']."</td>";
		 echo "<td>".$fila['nombreApellido']."</td>";
	    echo "<td>".$fila['dni']."</td>";
		 echo "<td>".$fila['fechaNacimiento']."</td>";
		 echo "<td>".$fila['direccion']."</td>";
		 echo "<td>".$fila['localidad']."</td>";
		 echo "<td>".$fila['telefono']."</td>";
		 echo "<td>".$fila['movil']."</td>";
		 echo "<td>".$fila['email']."</td>";
		 echo "</tr>";		 
		 echo "</p>";
		 $i++;
	 }
	 echo "</table>";
	 }  
	 
	 else
		{
			echo 'Connection Failure...';		
		}
   	
    mysql_close($conn);
    
    ?>
    </div>
    </div>
    </body>
    </html>