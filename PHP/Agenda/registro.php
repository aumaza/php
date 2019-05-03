<?php	

session_start();

if($_GET[modo] == 'nuevoUsuario')
{
  if($_POST[btnEnviarNuevoUsuario])
  {
    if(trim($_POST[txtNom]) == '')
    {
      $mensaje = 'Complete Nombre.';
    }
    
    elseif(trim($_POST[txtPass1]) == '')
    {
      $mensaje = 'Complete Contraseña.';
    }
    
    elseif($_POST[txtPass1] != $_POST[txtPass2])
    {
        $mensaje = 'Las contraseñas no Coinciden!!.';
    }
    
    elseif(trim($_POST[txtEmail]) == '')
    {
	  $mensaje = 'Ingrese Dirección de E-mail.';
    }
    
    else
    {
      $res = mysql_query("select * from usuarios where nombre = '".$_POST[txtNom]."' and password = '".$_POST[txtPass1]."'");
    }
    
    if(mysql_num_rows($res)>0)
    {
      $mensaje = 'La contraseña ya está siendo utilizada. Por favor ingrese nuevamente.';
    }
    
    else
    {
      $sql = "select max(idusuario) as M from usuarios";
      $res = mysql_query($sql);
      $row = mysql_fetch_array($res);
      
      if($row = $row['M']>0)
      {
	$max = $row['M']+1;
      }
      
      else
      {
	$max = 1;
	$fecha = date("Y-m-d");
	$res = mysql_query("insert into usuarios (idusuario,nombre,password,fecha_ingreso,email)
	  values($max,'$_POST[txtNom]','$_POST[txtPass1]','$fecha','$_POST[Email]')");
	echo '<link href="style.css" rel="stylesheet" type="text/css">';
	echo "<center><span class=mensaje>Registro Realizado. Su nombre de usuario es: $_POST[txtNom] y su contraseña $_POST[txtPass1]<br><br>
	<a href=''><span class=mensaje>Ir a Inicio.</span></a></span></center>";
	$_SESSION[autorizado] = $max;
	$_SESSION[nombre] = $_POST[txtNom];
	exit;
      }
    }
  }
  
  if($mensaje)
  {
      echo '<center><span class=mensaje>'.$mensaje.'</span></center>';
      echo '<link href="style.css" rel="stylesheet" type="text/css">';
      echo '<FORM action="?modo=nuevoUsuario" method="POST">';
      echo '<hr width=80%>';
      echo '<table align="center" border=0 cellspacing=0 cellpadding=0 width=77%>';
      echo '<tr>';
      echo '<td class=texto colspan=2>%nbsp;
	    Registro de Nuevos Usuarios - Ingrese sus datos y presione Enviar:</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td class=texto>&nbsp; Nombre</td>';
      echo '<td class=texto>&nbsp; <input type=text name=txtNom size=50 value"'.$_POST[txtNom].'"></td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td class=texto>&nbsp; Contraseña</td>';
      echo '<td class=texto>&nbsp; <input type=password name=txtPass1 size=50 value="'.$_POST[txtPass1].'"></td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td class=texto>&nbsp; Repita Contraseña</td>';
      echo '<td class=texto>&nbsp; <input type=password name=txtPass2 size=50 value="'.$_POST[txtPass2].'"></td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td class=texto>&nbsp; E-Mail</td>';
      echo '<td class=texto>&nbsp; <input type=txt name=txtEmail size=50 value="'.$_POST[txtPass].'"></td>';
      echo '</tr>';
      echo '</table>';
      echo '<hr width=80%>';
      echo '<center><input type=submit name=btnEnviarNuevoUsuario value="Enviar"></center><br>';
      echo '</form>';
      exit;
  }
  
  if($_GET[modo] == 'terminarSesion')
  {
    session_unset();
    session_destroy();
  }
  
  if($_POST[btnEnviar])
  {
    if(trim($_POST[txtNom]) == '')
    {
      $mensaje = 'Complete Nombre.';
    }include 'conexion.php';
    
    elseif(trim($_POST[txtPass]) == '')
    {
        $mensaje = 'Complete Contraseña.';
    }
    
    else
    {
      $res = mysql_query("select * from usuarios where nombre = '".$_POST[txtNom]."' and password = '".$_POST[txtPass]."'");
      
      if(mysql_num_rows($res)>0)
      {
	$row = mysql_fetch_array($res);
	$_SESSION[autorizado]= $row[idusuario];
	$_SESSION[nombre] = $row[nombre];
	header("Location: index.php");
      }
      
      else
      {
	$mensaje = 'Nombre de usuario / contraseña incorrectos. Vuelva a Intentar.';
	$_SESSION[autorizado] = 0;
      }
    }
  }
  
  if(!$_SESSION[autorizado])
  {
    if($mensaje)
    {
      echo '<center><span class=mensaje>'.$mensaje.'</span></center>';
      echo 'link href="style.css" rel="stylesheet" type="text/css">';
      echo '<FORM action="?" method="POST">';
      echo '<hr width=80%>';
      echo '<table align="center" border=0 cellspacing=0 cellpadding=0 width=77%>';
      echo '<tr>';
      echo '<td class=texto colspan=2>%nbsp;
	    Ingrese nombre de Usuario y Contraseña:</td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td class=texto>&nbsp; 
	    Nombre</td>';
      echo '<td class=texto>%nbsp;
	    <input type=text name=txtNom size=50 value="'-$_POST[txtNom].'"></td>';
      echo '</tr>';
      echo '<tr>';
      echo '<td class=texto>%nbsp;
	    Contraseña</td>';
      echo '<td class=texto>&nbsp;
	    <input type=password name=txtPass size=50 value="'.$_POST[txtPass].'"></td>';
      echo '</tr>';
      echo '</table>';
      echo '<hr width=80%>';
      echo '<center><input type=submit name=btnEnviar value="Enviar"></center><br>';
      echo 'center><a href="registro.php? modo=nuevoUsuario"><span class=mensaje> ¿No está registrado? Hagalo aquí.</span></a></center>';
      echo '</form>';
      exit;
      }
  }
}