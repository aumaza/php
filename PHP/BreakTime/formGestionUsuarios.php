   <html>
    <head>
    <title>Usuarios</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="estilo.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Usuarios</h2>
    
    <?php
    
    $nombre = $_POST["nombreUsuario"];
    $nickname = $_POST["nickname"];
    $pass1 = $_POST["password1"];
    $pass2 = $_POST["password2"];
    
    echo '<br>';

		if(strnatcmp($pass1, $pass2) == 0)
		{
			echo 'USUARIO AGREGADO EXITOSAMENTE!!';	
		}    
    
    else 
    {
   	   echo 'ERROR!!...Passwords no Coincidentes...REINTENTE';
    }
    ?>
    </div>
    </div>
    
    
    
</body>
</html>