<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'uyghnme5dedkh';
$DATABASE_PASS = 'o{C2hb#2`1_6';
$DATABASE_NAME = 'dbk4cjs7tf4dxn';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
