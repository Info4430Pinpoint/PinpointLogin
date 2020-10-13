<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Home</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Admin Home</h1>
                <a href="Register.html"><i class="fas fa-plus-circle"></i>Register a User</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
            <h2>Admin Logged In</h2>
            <p>Welcome back, <?=$_SESSION['name']?>!</p>
            <br>
            <form method="post" action="print.php">
 <input type="submit" name ="fetch" value="Registered Users" />
 </form>





		</div>
	</body>
</html>