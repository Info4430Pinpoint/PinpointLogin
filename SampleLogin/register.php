<?php
require_once "db.php";


function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $secretKey = '6LePZ-UZAAAAAGgKRtTIKlI-_vwHFB4RxvHt4g62';
    $responseKey = $_POST['g-recaptcha-response'];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
    $response = file_get_contents($url);
    $response = json_decode($response);

    if($response->success){
        // Now we check if the data from the login form was submitted, isset() will check if the data exists.


        // Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['color'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['color']) ) {
	// One or more values are empty.
	exit('Please complete the registration form');
}



// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		// echo 'Username exists, please choose another!';
		echo "<script>
	alert('Username exists, please choose another!');
	window.location.href='login.html';
	</script>";
	} else {
		// Username doesnt exists, insert new account
if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, color) VALUES (?, ?, ?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'], $_POST['color']);
    $stmt->execute();
    echo "<script>
alert('Registration successfull, click OK to continue to the home page.');
window.location.href='admin.php';
</script>";
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();



}
	
	
	
	else{
        echo "<script>
	        alert('Capatcha Not Completed');
	        window.location.href='registerUser.html';
	        </script>";
    }


}


?>