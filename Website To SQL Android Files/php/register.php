<?php




$sqlserver = "localhost";
$sqlusername = "mybiycqt_joshuamoller";
$sqlpassword = "@Basilisk77";
$sqldatabase = "mybiycqt_bsg";


mysql_connect($sqlserver,$sqlusername,$sqlpassword) or die ("Connection Failed");


mysql_select_db($sqldatabase) or dies ("DB failed");

$result = mysql_query("SELECT * FROM Login");

$usernameEntered = $_POST["username"];
$passwordEntered = $_POST["password"];
$emailEntered = $_POST["email"];
$code = substr(md5(mt_rand()),0,15);


//check to make sure email is in the right format
/*if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $emailEntered)){
    header("Location:../emailInvalid.php");
    exit;
}
*/



while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
	$userSearch = $row['Username'];
	$passSearch = $row['Password'];
	$emailSearch = $row['Email'];
	
	if ($usernameEntered == $userSearch || $emailEntered == $emailSearch)
	{	
		header("Location:../registerUsernamePasswordFail.php");
    		
    		exit;
		
	}

}

echo 'just got past while loop';

if(empty($usernameEntered) || empty($passwordEntered) || empty($emailEntered)){
	
	header("Location:../registerEmpty.php");
	exit;
	
}
if(!empty($usernameEntered) && !empty($passwordEntered) && !empty($emailEntered)){
	mysql_query("INSERT INTO Login (Username, Password, Email) VALUES ('$usernameEntered', '$passwordEntered','$emailEntered')");

	header("Location:../index.html");

	exit;
}
	




}



?>