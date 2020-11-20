<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// if ( mysqli_connect_errno() ) {
// 	// If there is an error with the connection, stop the script and display the error.
// 	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
// }



if(isset($_POST['submit'])){
    $secretKey = '6LePZ-UZAAAAAGgKRtTIKlI-_vwHFB4RxvHt4g62';
    $responseKey = $_POST['g-recaptcha-response'];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
    $response = file_get_contents($url);
    $response = json_decode($response);

    if($response->success){
        // Now we check if the data from the login form was submitted, isset() will check if the data exists.


        //Code HERE
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT email, color FROM accounts WHERE email = ? AND color = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('ss', $_POST['email'], $_POST['color']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($email, $color);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['color'] = $color;
//         header('Location: resetpassword.html');
} 
else{
    echo "<script>
	        alert('Email not found or Color incorrect');
	        window.location.href='resetForm.html';
	        </script>";
}
}

// $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
$stmt = $con->prepare('UPDATE accounts SET password = ?  WHERE email = ?') ;
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
$stmt->bind_param('ss', $password, $_POST['email']);
$stmt->execute();
echo "<script>
alert('Reset successfull, click OK to continue to the login page.');
window.location.href='login.html';
</script>";
$con->close();
$stmt->close();


}
    else{
        echo "<script>
	        alert('Capatcha Not Completed');
	        window.location.href='resetForm.html';
	        </script>";
	}
}




?>