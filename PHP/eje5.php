<html>
<head>
<title>eje5</title>
</head>
<body>
<?php

$valA = $_POST["valorA"];
$valB = $_POST["valorB"];
$suma = $valA+$valB;
$resta = $valA-$valB;
$multi = $valA*$valB;
$div = $valA/$valB;

echo "La suma es: ";
echo $suma;
echo "<br><hr>";
echo "La resta es: ";
echo $resta;
echo "<br><hr>"; 
echo "La Multiplicación es: ";
echo $multi;
echo "<br><hr>";
echo "La División es: ";
echo $div;
echo "<br><hr>";

?>
</body>
</html>
