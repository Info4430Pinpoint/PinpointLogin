<?php
session_start();
// Change this to your connection info.
require_once "db.php";


//Capatcha ------------------------------------------------------------------------------------------------------------

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $secretKey = '6LePZ-UZAAAAAGgKRtTIKlI-_vwHFB4RxvHt4g62';
    $responseKey = $_POST['g-recaptcha-response'];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
    $response = file_get_contents($url);
    $response = json_decode($response);

    if($response->success){
        // Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}


// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has loggedin!
            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;



        if($_SESSION["id"]==11)
            {
                header('Location: admin.php');
   exit;
}


            header('Location: home.php');
        } else {
            // Incorrect password
            // echo 'Incorrect username and/or password!';
            echo "<script>
	        alert('Incorrect username and/or password!');
	        window.location.href='index.html';
	        </script>";
        }
    } else {
        // Incorrect username
        // echo 'Incorrect username and/or password!';
        echo "<script>
	        alert('Incorrect username and/or password!');
	        window.location.href='index.html';
	        </script>";
    }

	$stmt->close();
}
    }else{
        echo "<script>
	        alert('Capatcha Not Completed');
	        window.location.href='index.html';
	        </script>";
    }
    
}


//End Capatcha ------------------------------------------------------------------------------------------------------------

?>


