<?php 

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'slack142';
$db = 'agenda';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(!$conn)
{
  die('Connection Error: ' .mysqli_error());
  //die($conn->error);
  //error_reporting(-1);
}

$conn->select_db($db);


echo 'Connected Succesfully!<br>';

$sqli = mysqli_select_db($dbhost,$db);
$retval = mysqli_query($sqli, $conn);

if(!$retval)
{
  die('Connection Error: ' .mysqli_error());
  //error_reporting(-1);
}

echo 'Connect Succesfully!';
mysqli_close($conn);

//mysqli_connect("localhost","root","slack142") or die ('Failure Conection!');

//mysqli_select_db("agenda");
?>
