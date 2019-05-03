    <?php error_reporting(0);
    session_start();
    foreach ($_POST as $clave => $valor) {
    $_SESSION['sesionform2'][$clave] = $valor;
    }
    echo '<b>Datos form1</b>';
    $sesionform1=$_SESSION['sesionform1'];
    echo '<pre>';
    print_r($sesionform1);
    echo '</pre>';
    echo '<b>Datos form2</b>';
    $sesionform2=$_SESSION['sesionform2'];
    echo '<pre>';
    print_r($sesionform2);
    echo '</pre>';
     
    extract($_SESSION['sesionform1']);
    $conexion = mysql_connect("localhost", "root", "");
    $db = mysql_select_db("empresa",  $conexion);
    $sql ="insert into postulantes (nombre,email,domicilio,telefono,movil,educacion,puesto,experiencia,descripcion) ";
    $sql .="values('$nombre','$email','$domicilio','$telefono','$movil', '$educacion','$puesto','$experiencia','$descripcion')";
    $query = mysql_query( $sql, $conexion);
     
    ?>
    <html>
    <head>
    <title>PHP Formulario multiple</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="estilos.css" />
    </head>
    <body>
    <div class="container">
     
    <?
    if ($query) {
    echo '<p><span class="mensaje">Ha finalizado el proceso y guardado los datos</span></p>';
    } else {
    echo '<p><span>No se han Guardado los datos</span></p>';
    }
    unset($_SESSION['sesionform1']);
    unset($_SESSION['sesionform2']);
    ?>
    </div>
    </body>
    </html>