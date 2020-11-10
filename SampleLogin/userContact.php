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
		<title>Contact Us</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">

		<nav class="navtop">
			<div>
                <h1>Contact Us</h1>
                <a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="downloads.php"><i class="fas fa-download"></i>Downloads</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="cognito">
<script src="https://www.cognitoforms.com/s/LiP7zdZOj0m2-6BMDXZMqQ"></script>
<script>Cognito.load("forms", { id: "3" });</script>
</div>
		</div>
	</body>
</html>