<?php

$sqlserver = "localhost";
$sqlusername = "mybiycqt_joshuamoller";
$sqlpassword = "@Basilisk77";
$sqldatabase = "mybiycqt_bsg";


mysql_connect($sqlserver,$sqlusername,$sqlpassword) or die ("Connection Failed");


mysql_select_db($sqldatabase) or dies ("DB failed");

$result = mysql_query("SELECT * FROM Login");

$usernameEntered = $_POST["username"];




while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
	$userSearch = $row['Username'];
	$program = $row['Program'];
	
	
	if ($usernameEntered == $userSearch)
	{	
		
		
		echo $program;
    		exit;
		
	}

}


exit;



?>