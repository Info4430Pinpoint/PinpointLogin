<?php
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uplaoded</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>File Upload</h1>
                <a href="admin.php"><i class="fas fa-sign-out-alt"></i>Go Back</a>
			</div>
		</nav>
</body>
</html>

<?php
$directory = "./files";

  $File_name = $_FILES["userfile"]["name"];
  $Type  = $_FILES["userfile"]["type"] ;
  $Size   = ($_FILES["userfile"]["size"] / 1024); 
  $File_temp_name  = $_FILES["userfile"]["tmp_name"];
  if($Size<= 0){
	  
	  die('cant upload file, file size is 0 ');
	  }
if (file_exists($directory . " / " .  $_FILES["userfile"]["name"]))
      {
      die($_FILES["userfile"]["name"] . " already exists. ");
      }

  if(is_uploaded_file($_FILES["userfile"]["tmp_name"])){
	  
	  if(!move_uploaded_file($File_temp_name,$directory."/".$File_name)){
		      die('cant not file'.$File_name);
		  }
	  }
	  else
	  {
	    die('attack on file');
		  }	  
		  echo $File_name . "  is sucessfully uploaded " . " <br/> " ;
		  echo "file size : " .$Size. " <br/> ";
          echo"type :".$Type." <br/> ";
          
  
 ?>