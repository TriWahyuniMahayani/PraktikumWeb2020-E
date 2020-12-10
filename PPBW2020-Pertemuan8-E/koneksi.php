<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dbmahasiswa";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
	die("Error".mysqli_connect_error());
}

?>
