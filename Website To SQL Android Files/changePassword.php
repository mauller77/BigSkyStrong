
<?php
	session_start();
	if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
   		
	}else{
		header("Location:index.html");
		exit;
	}
?>

<html>
<head>
<style>

.button{
	position: absolute;
	left: calc(50% - 125px);
	top: 100px;
	
}
body {
	background-image: url("https://images4.alphacoders.com/294/29486.jpg");
}

</style>
</head>

<body>

/*
<?php

$sqlserver = "localhost";
$sqlusername = "mybiycqt_joshuamoller";
$sqlpassword = "@Basilisk77";
$sqldatabase = "mybiycqt_bsg";


mysql_connect($sqlserver,$sqlusername,$sqlpassword) or die ("Connection Failed");


mysql_select_db($sqldatabase) or dies ("DB failed");

$result = mysql_query("SELECT * FROM Login");

$username = $_SESSION["username"];
$opEntered = $_POST["op"];
$npEntered = $_POST["np"];
$npEntered = $_POST["np1"];

if($np != $np1){
	header("Location:changePasswordError.php");
	exit;
}


while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
	$userSearch = $row['Username'];
	$passSearch = $row['Password'];
	
	if ($username == $userSearch && $op==$passSearch)
	{	
		
		mysql_query("INSERT INTO Login ('Password') VALUES ("$np")";
		$message = "has"
		
	}

}

$message = "has not"

?> 
*/

	<p style="position: absolute; left: calc(50% - 275px); font-size: 30px; background-color: white;"><strong>Your Password Has Been Changed Successfully</strong></p>
	
<div class="button">	
	<form action='main.php'>
		<input type='submit' value="Click Here to Return to Main Page">
	</form>
</div>
</body>
</html> 