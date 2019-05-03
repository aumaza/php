    <?php
    session_start();
    foreach ($_POST as $clave => $valor) {
    $_SESSION['sesionform1'][$clave] = $valor;
    }
    ?>
    <html>
    <head>
    <title>PHP Formulario multiple</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="estilo.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Formulario 2</h2>
    <form action="out.php" method="post">
    <label>Nivel Educacion :</label>
    <select name="educacion">
    <option value="">----Seleccionar----</option>
    <option value="1" value="">Univesitario </option>
    <option value="2" value="">Tecnico</option>
    <option value="3" value="">Otro </option>
    </select>
     
    <label>Puesto que Aplica:<span>*</span></label>
    <select name="puesto">
    <option value="">----Seleccionar----</option>
      <option value="1" value="">Administrador de Servidores</option>
    <option value="2" value="">Programador </option>
    <option value="3" value="">Diseñador </option>
    </select>
    <label>Experiencia Laboral :<span>*</span></label>
    <select name="experiencia">
    <option value="">----Select----</option>
    <option value="0" value="">Ninguna </option>
    <option value="<5" value="">Menos de 5 años </option>
    <option value=">5" >Más de 5 años</option>
    </select>
    <label>Descripci&oacute;n :<span>*</span></label><br>
    <textarea name="descripcion" rows="4" cols="50" class="estilotextarea" placeholder="Describe tus conocimientos..."></textarea>
    <br><br>
    <input type="reset" value="Borrar" />
    <input type="submit" value="Siguiente" />
    </form>
    </div>
    </div>
    </body>
    </html>