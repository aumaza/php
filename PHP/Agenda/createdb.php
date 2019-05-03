<html>
<head>
<title>Create a MariaDB Database</title>
</head>
<body>
<?php

$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'rootpassword';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(!$conn)
{
  die('Could not Connect: '. mysql_error());
}

echo 'Connect Succesfully<br>';

$sql = 'CREATE DATABASE agenda';
$retval = mysql_query($sql, $conn);

if(!$retval)
{
  die('Could not create database: ' , mysql_error());
}

echo "Database agenda created Succesfully\n";

mysql_close($conn);

?>
</body>
</html>

