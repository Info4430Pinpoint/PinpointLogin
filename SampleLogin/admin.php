<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page.
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}

if($_SESSION["id"]!=16)
{
   header('Location: home.php');
   echo 'console.log("Admin Connected")';
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
				<a href="registerUser.php"><i class="fas fa-plus-circle"></i>Register a User</a>
				<a href="downloads.php"><i class="fas fa-download"></i>Downloads</a>
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

 <h2>Uplaod a new file</h2>
 <form action="upload.php" method="post" enctype="multipart/form-data">
  Select file to upload: <br><br>
  <input type="file" name="userfile" id="fileToUpload"><br><br>
  <input type="submit" value="Upload File" name="submit">
</form>




		</div>
	</body>
</html>