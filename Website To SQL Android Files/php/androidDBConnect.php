<?php

$sqlserver = "localhost";
$sqlusername = "mybiycqt_joshuamoller";
$sqlpassword = "@Basilisk77";
$sqldatabase = "mybiycqt_bsg";


mysql_connect($sqlserver,$sqlusername,$sqlpassword) or die ("Connection Failed");


mysql_select_db($sqldatabase) or dies ("DB failed");

$result = mysql_query("SELECT * FROM Login");

$usernameEntered = $_POST["userid"];
$passwordEntered = $_POST["pswrd"];



while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
	$userSearch = $row['Username'];
	$passSearch = $row['Password'];
	
	if ($usernameEntered == $userSearch && $passwordEntered==$passSearch)
	{	
		echo "success";
    		exit;
		
	}

}

echo "fail";
exit;





?>