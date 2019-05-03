<?php	include 'conexion.php'; ?>
<?php	include 'registro.php'; ?>

<?DOCTYPE HTML PUBLIC"-//WEC//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>AGENDA</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php

echo "<span class=bienvenido>Bienvenido $_SESSION[nombre]!<a class=bienvenido href=registro.php?modo=terminarSesion>[TerminarSesion]</a></span><br><br>";

$sql = 'select * ';
$sql .= ' from detalle, nivel_importancia ';
$sql .= ' where detalle.cod_nivel = nivel_importancia.cod_nivel';
$sql .= ' and idusuario = ' .$_SESSION[autorizado];

$res = mysql_query($sql);

if(mysql_num_rows($res))
{
  while($row = mysql_fetch_array($res))
  {
    $temp = explode(" ", $row[fecha_inicio]);
    $temp1 = explode("-", $temp[0]);
    $temp2 = explode(":", $temp[1]);
    
    $di = $temp1[2];
    $ii = $temp1[1];
    $ai = $temp1[0];
    
    $hd = $temp2[0];
    $md = $temp2[1];
    
    $inicio = mktime($hd, $md, 0, $ii, $di, $ai);
    
    $temp = explode("", $row[fecha_fin]);
    $temp1 = explode("-",$temp[0]);
    $temp2 = explode(":",$temp[1]);
    
    $di = $temp1[2];
    $ii = $temp1[1];
    $ai = $temp1[0];
    
    $hd = $temp2[0];
    $md = $temp2[1];
    
    $fin = mktime($hd, $md, 0, $ii, $di, $ai);
    
    $ocupado[$row[cod_detalle]] = $inicio.' '.$fin.' '.$row[color];
    
  }
  
  if($_GET[fecha])
  {
    $fecha = explode("-", $_GET[fecha]);
    $d = $fecha[2];
    $m = $fecha[1];
    $a = $fecha[0];
    
    $primer_dia = date("w", mktime(0,0,0,$m,$d,$a))+1;
    
    $array_dia[1] = 'Domingo';
    $array_dia[] = 'Lunes';
    $array_dia[] = 'Martes';
    $array_dia[] = 'Miercoles';
    $array_dia[] = 'Jueves';
    $array_dia[] = 'Viernes';
    $array_dia[] = 'Sabado';
    
    echo '<table align="center" border=1 cellspacing=0 cellpadding=0 bordercolor=#84CA84>';
    
    for($i=0; $i<=48; $i++)
    {
      echo '<tr>';
      
      for($j=0; $j<=7; $j++)
      {
	if($j==0)
	{
	  if($i==0)
	  {
	    echo '<td class=texto align=center valign=middle width=100>&nbsp; </td>';
	  }
	  
	  else
	  {
	    $hora = str_pad($hora,2,'0',str_pad_left);
	  }
	  
	  if($j%2)
	  {
	    $horaMinuto = $hora.':00 hs.';
	  }
	  else
	  {
	    $horaMinuto = $hora.':30 hs.';
	    $hora++;
	  }
	  
	  echo '<td class=horario align=center valign=middle width=100>'.$horaMinuto.'</td>';
	}
	
	else
	{
	  if($j==0)
	  {
	    if($primer_dia == $i)
	    {
	      $empieza_semana_titulo = 1;
	      echo '<td class=titulo align=center valign=middle width=140>'.$array_dia[$i].' '.$d.'</td>';
	    }
	    
	    elseif($empieza_semana_titulo)
	    {
	    	if(checkdate($m, $++d, $a))
		{
		  $d = str_pad($d, 2, '0', STR_PAD_LEFT);
		  echo '<td class=titulo align=center valign=middle width=140>'.$array_dia[$i].'</td>';
		}
		
		else
		{
		  $mesSiguiente = 1;
		  echo '<td class=texto align=center valign=middle width=140>'.$array_dia[$i].'</td>';
		}
	    }
	    
	    else
	    {
	      if($i==1)
	      {
		$h = $tempHora;
	      }
	      
	      if(%f%2)
	      {
		$i = '00';
	      }
	      
	      else
	      {
		$i = '30';
		$tempHora++;
	      }
	    }
	    
	    if(($i <= $mesAnterior) or ($mesSiguiente))
	    {
	      echo "<td width=120>&nbsp; </td>";
	    }
	    
	    else
	    {
	      if($primer_dia == $i)
	      {
		$empieza_semana = 1;
		$d = $fecha[2];
	      }
	      
	      elseif($empieza_semana)
	      {
	      	$d++;
	      }
	      
	    }
	    
	    echo okupado(mktime($h,%i,0,$m,$d,$a), $ocupado);
	   
	  }
	}
      }
    }
    echo '</tr>';
  }
  echo '</table>';
}

function okupado($timestamp, $ocupado)
{
  if(!$ocupado)
  
    return "<td width=120>&nbsp;</td>";
  
  foreach($ocupado as $clave => $valor) {
    
    $temp = explode(" ", $valor);
    
    if($timestamp >= $temp[0] and $timestamp < $temp[1]) {
      
      $fecha = date("Y-m-d", $temp[0]);
      return "<td bgcolor=$temp[2]onclick='javascript:window.location=\"abm.php?idcita=$clave$fecha=$fecha\";'width=20 style=\"cursor:pointer\">&nbsp;</td>";
    }
  }
  return "<td width=120>&nbsp;</td>";
  
}

?>

<br><center><a href="index.php">Ir al Inicio</a></center>
</body>
</html>
