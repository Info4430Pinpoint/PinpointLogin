<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

// WILL NEED TO CHANGE
if($_SESSION["id"]==16)
{
   header('Location: admin.php');
   echo 'console.log("Admin Connected")';
   exit;
}

// if($_SESSION["visitor"] == 'Y')
// {
//    header('Location: visitor.php');
//    exit;
// }

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>User Home</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>User Home</h1>
				<a href="downloads.php"><i class="fas fa-download"></i>Downloads</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="userContact.php"><i class="fas fa-question"></i>Contact Us</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
			<h3>To get started head over to the <a href="downloads.php">Downloads</a> Page</h3>
		</div>
		

	</body>
</html>