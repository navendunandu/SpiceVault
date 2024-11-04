<?php
$server="localhost";
$username="root";
$password="";
$db="db_organicspices";

$con=mysqli_connect($server,$username,$password,$db);

if(!$con)
{
	echo("Error");
}
?>