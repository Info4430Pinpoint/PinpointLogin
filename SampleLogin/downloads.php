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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">

		<nav class="navtop">
			<div>
				<h1>Downloads</h1>
                <a href="home.php"><i class="fas fa-home"></i>Home</a>
                <a href="userContact.php"><i class="fas fa-question"></i>Contact Us</a>
                <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">

			<?php
$handle = opendir('files');

if($handle){
    while(($entry = readdir($handle)) !== false){
        if($entry != '.' && $entry != '..' && $entry != '.htaccess'){
          echo "<button style=\" background: url(fileThumb.png);
          background-color:white;color:black;text-align:center;margin:25px;
          font-family: 'Roboto', sans-serif;
          margin-left: 200px;
          font-size: 20px; font-weight:bold;
          width:356px; height:200px;border: none;cursor:pointer;
          \" 
          onMouseOver=\"this.style.color='#4CAF50'\"
          onMouseOut=\"this.style.color='black'\"
          id=\"btn\" onclick=\"location.href='files/$entry'\"><h4>$entry</h4></button> ";
          
        }
    }
    closedir($handle);
}
?>

		</div>
		

</body>
</html>

