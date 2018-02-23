<?php

$sqlserver = "localhost";
$sqlusername = "mybiycqt_joshuamoller";
$sqlpassword = "@Basilisk77";
$sqldatabase = "mybiycqt_bsg";


mysql_connect($sqlserver,$sqlusername,$sqlpassword) or die ("Connection Failed");


mysql_select_db($sqldatabase) or dies ("DB failed");

$username = $_POST["username"];
$opEntered = $_POST["op"];
$npEntered = $_POST["np"];
$np1Entered = $_POST["np1"];

$result = mysql_query("SELECT * FROM Login");

if($npEntered != $np1Entered){
	echo 'Your New Passwords Are Not Identical';
	exit;
}


if( $opEntered=="" || $npEntered=="" || $np1Entered==""){
	
	echo 'All Fields Must Be Filled Out';
	exit;
}




while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
	$userSearch = $row['Username'];
	$passSearch = $row['Password'];
	
	
	
	if ($username == $userSearch && $opEntered == $passSearch)
	{	
		echo 'Success';
		
		mysql_query("UPDATE Login SET Password = '".$npEntered."' WHERE Username = '".$username."'");
		
		
		
		exit;
	}
	
	

}

echo 'Old Password Does Not Match Our Records';




?>