<?php	include 'conexion.php';	 ?>
<?php	include 'registro.php';	 ?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Agenda</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>



<?php


// Motrar todos los errores de PHP
//error_reporting(-1);
 
// No mostrar los errores de PHP
//error_reporting(0);
 
// Motrar todos los errores de PHP
//error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
//ini_set('error_reporting', E_ALL);


echo "<span class=bienvenido>Bienvenido $_SESSION[nombre]!
      <a class=bienvenido href=registro.php?modo=terminarSesion>[TerminarSesion]</a></span><br><br>";
      
echo '<table align="center" border=0 cellspacing=0 cellpadding=3 width=100%>';
echo '<tr>';
echo '<td>';

if($_GET[fecha])
{
  $fecha = $_GET[fecha];
}

else
{
      $fecha = date("Y").'-'.date("n");
}

$fecha = explode("-",$fecha);
$nm = str_pad($fecha[1],2,'0',str_pad_left);
$na = $fecha[0];

if($nm = date("n"))
{
  $nd = date("j");
}

else
{
  $nd = '';
}

//$mes[1] = 'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre';
$mes[1] = 'Enero';
$mes[2] = 'Febrero';
$mes[3] = 'Marzo';
$mes[4] = 'Abril';
$mes[5] = 'Mayo';
$mes[6] = 'Junio';
$mes[7] = 'Julio';
$mes[8] = 'Agosto';
$mes[9] = 'Septiembre';
$mes[10] = 'Octubre';
$mes[11] = 'Noviembre';
$mes[12] = 'Diciembre';

//$dia[] = {'D','L','M','M','J','V','S'};
$dia[1] = 'Domingo';
$dia[2] = 'Lunes';
$dia[3] = 'Martes';
$dia[4] = 'Miercoles';
$dia[5] = 'Jueves';
$dia[6] = 'Viernes';
$dia[7] = 'Sabado';


$sel = $mes[abs($nm)];

echo '<table align="center" border = 1 cellspacing = 0 cellpadding = 0 bordercolor = #84CA84>';

if($nm=='12')
{
  $nmp = '01';
  $nap = $na+1;
}

else
{
  $nmp = $nm+1;
  $nap = $na;
}

if($nm=='01')
{
  $nma = '12';
  $naa = $na-1;
}

else
{
  $nma = $nm-1;
  $naa = $na;
}

$proximo = "$nap-$nmp";
$anterior = "$naa-$nma";

echo '<tr><td align="center" class="titulo"><a class="linkMes" href="index.php? fecha='.$anterior.'">mes anterior</a></td>
      <td class="titulo" align = "center" colspan=6>'.$sel.' - '.$na.'</td>
      <td class="titulo" align = "center">
      <a class="linkMes" href="index.php? fecha='.$proximo.'">mes proximo</a></td></tr>';
      
$columnas = count($dia)+1;
$timestamp = mktime(0,0,0,$nm,1,$na);
$dial = date("w",$timestamp);

for($c=0; !$ultima_semana; $c++)
{
  if($c==0)
  {
    echo '<tr>';
  
  
  for($d=0; $d<count($dia); $d++)
  {
    if($d==0)
    {
      echo '<td align="center" class="texto" width="100" height="20">$nbsp;</td>';
      echo '<td align ="center" class="texto" width="100" height="20">'.$dia[$d].'</td>';
    }
  }
  
  echo '</tr>';
}

else
{
  echo '<tr>';
}

if($c==1)
{
  $x = $c;
}

for($d=0; $d<columnas; $d++)
{
  $x = str_pad($x,2,'0',str_pad_left);
  
  if(date("t",$timestamp)==$x)
  {
    $ultima_semana = 1;
  }
  
  if($d==0)
  {
    echo '<td valign="middle" align="center" width="100" height"100"> <a class="detalle" href="verdetalle.php?fecha='.$na.'-'.$nm.'-'.$x.'">verdetalle </a></td>';
  }
  
  else
  {
    if(($d > $dia1 and $c==1) or (checkdate($nm,$x,$na) and $c!=1))
    {
      if($x == $nd)
      {
	$class = $hoy;
      }
      
      else
      {
	$class = 'texto';
      }
      
      echo '<td class"'.$class.'" width="100" height="100">';
      echo '<table border=0 width=100% height=100 cellspacing=0 cellpadding=0>';
      echo '<tr><td colspan="2" align="center" class="cita">'.buscar_citas("$na-$nm $x").'</td></tr>';
      echo '<td height=5 valign="bottom">&nbsp;<a class="edit" href="abm.php?fecha='.$na.'-'.$nm.'-'.$x.'">E</a></td>';
      echo '<td height=5 align="right" valign="bottom">' .$x.'&nbsp; </td>';
      echo '</table>';
      echo '</td>';
      
      $x++;
      }
      else
      {
	echo '<td align="center" class="texto" width="100" height="100">&nbsp;</td>';
      }
    }
  }
  echo '</tr>';
}

echo '</table>';
echo '</td>';
echo '</tr>';
echo '</table>';

function buscar_citas($fecha)
{
  $fecha = explode("-",$fecha);
  $d = $fecha[2];
  $m = $fecha[1];
  $a = $fecha[0];
  
  $sql = "select * from detalle where day (fecha_inicio) = $d and month(fecha_inicio) = $m and year(fecha_inicio) = $a and idusuario = $_SESSION[autorizado] order by fecha_inicio asc";
  
  $res = mysql_query($sql);
  
  if(mysql_num_rows($res)>0)
  {
    while($row = mysql_fetch_array($res))
    {
      $fecha = explode("",$row[$fecha_inicio]);
      $amd = $fecha[0];
      $fecha = explode(":", $fecha[1]);
      $h = $fecha[0];
      $m = $fecha[1];
      $temp .= '&nbsp;<a class="verTarea" href="abm.php?idcita='.$row[cod_detalle].'&fecha='.$amd.'">['.$h.':'.$m.'] '.$row[titulo].'</a><br>';
    }
  }
  
  else
  {
    $temp = '&nbsp;';
  }
  
  return $temp;
}
?>
</body>
</html>


      

