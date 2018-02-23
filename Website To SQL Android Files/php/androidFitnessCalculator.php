<?php

$sqlserver = "localhost";
$sqlusername = "mybiycqt_joshuamoller";
$sqlpassword = "@Basilisk77";
$sqldatabase = "mybiycqt_bsg";


mysql_connect($sqlserver,$sqlusername,$sqlpassword) or die ("Connection Failed");


mysql_select_db($sqldatabase) or dies ("DB failed");

$username = $_POST["username"];
$aEntered = $_POST["age"];
$hEntered = $_POST["height"];
$wEntered = $_POST["weight"];
$gWEntered = $_POST["goalWeight"];
$pEntered = $_POST["program"];
$bTEntered = $_POST["bodyType"];

$result = mysql_query("SELECT * FROM Login");



if( $wEntered=="" || $gWEntered==""){
	
	echo 'Both Weight and Goal Weight Must Be Entered';
	exit;
}




while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
	$userSearch = $row['Username'];
	
	
	
	if ($username == $userSearch )
	{	
		echo 'Success';
		
		mysql_query("UPDATE Login SET Age = '".$aEntered."' WHERE Username = '".$username."'");
		mysql_query("UPDATE Login SET Height = '".$hEntered."' WHERE Username = '".$username."'");
		mysql_query("UPDATE Login SET Weight = '".$wEntered."' WHERE Username = '".$username."'");
		mysql_query("UPDATE Login SET GoalWeight = '".$gWEntered."' WHERE Username = '".$username."'");
		mysql_query("UPDATE Login SET Program = '".$pEntered."' WHERE Username = '".$username."'");
		mysql_query("UPDATE Login SET BodyType = '".$bTEntered."' WHERE Username = '".$username."'");
		
		
		
		exit;
	}
	
	

}

echo 'Old Password Does Not Match Our Records';




?>