<?php


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $secretKey = '6LePZ-UZAAAAAGgKRtTIKlI-_vwHFB4RxvHt4g62';
    $responseKey = $_POST['g-recaptcha-response'];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
    $response = file_get_contents($url);
    $response = json_decode($response);

    if($response->success){
        // Now we check if the data from the login form was submitted, isset() will check if the data exists.


        //Code HERE



}
    }else{
        echo "<script>
	        alert('Capatcha Not Completed');
	        window.location.href='login.html';
	        </script>";
    }
    


?>

