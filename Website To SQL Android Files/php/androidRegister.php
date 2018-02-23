<?php

$sqlserver = "localhost";
$sqlusername = "mybiycqt_joshuamoller";
$sqlpassword = "@Basilisk77";
$sqldatabase = "mybiycqt_bsg";



$usernameEntered = $_POST["username"];
$emailEntered = $_POST["email"];


mysql_connect($sqlserver,$sqlusername,$sqlpassword) or die ("Connection Failed");


mysql_select_db($sqldatabase) or dies ("DB failed");

$loginResult = mysql_query("SELECT * FROM Login");



//-----------check if username and email are both filled out------------
if(empty($usernameEntered) || empty($emailEntered)){
	
	echo 'One or More Fields are Empty!';
	exit;
	
}

//----------check if email is in the correct format---------------------


if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $emailEntered)){
    // Return Error - Invalid Email
    echo 'Email is Invalid';
    exit;
}


//------------make sure there are no duplicates already in the tabel------------

while($row = mysql_fetch_array($loginResult)){   //Creates a loop to loop through results
	$userSearch = $row['Username'];
	$emailSearch = $row['Email'];
	
	if ($usernameEntered == $userSearch || $emailEntered == $emailSearch)
	{	
		echo 'This Email Address Has Already Been Registered';
    		
    		exit;
		
	}

}

//----------------setting user variables-----------------

$hash = md5(rand(0,1000));
$randomPassword = rand(1000,5000);



//--------------------enter info into the verify table-------------

mysql_query("INSERT INTO Verify (Username, Password, Email, Hash) VALUES(
'". mysql_escape_string($usernameEntered) ."', 
'". mysql_escape_string($randomPassword) ."', 
'". mysql_escape_string($emailEntered) ."', 
'". mysql_escape_string($hash) ."') ") or die(mysql_error());




//------------creating the message to send to the registering user-----------------------


$to = $emailEntered;
$subject = "Activation Code For Big Sky Strong";
$message='
Thank you for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

----------------------------------
Username: '.$usernameEntered.'
Password: '.$randomPassword.'
----------------------------------

Please click this link to activate your account:
https://www.mybigskystrong.com/php/verify.php?email='.$emailEntered.'&hash='.$hash.'

';
$headers = "From: bigskystrong@gmail.com";

if (mail($to, $subject, $message)) {
   echo $emailEntered;
  } else {
   echo 'Email Delivery Failed!';
  }




?>