<?php
	session_start();
	if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
   		$username = $_SESSION['username'];
	}else{
		header("Location:../index.html");
		exit;
	}
	
	
	$sqlserver = "localhost";
	$sqlusername = "mybiycqt_joshuamoller";
	$sqlpassword = "@Basilisk77";
	$sqldatabase = "mybiycqt_bsg";


	mysql_connect($sqlserver,$sqlusername,$sqlpassword) or die ("Connection Failed");


	mysql_select_db($sqldatabase) or dies ("DB failed");

	if ($username == "guest"){
		header("Location:deleteGuestError.php");
		
	}else{
	
	mysql_query("DELETE FROM Login WHERE Username = '".$username."'");
	header("Location:../index.html");
	
	
	}

	
?>