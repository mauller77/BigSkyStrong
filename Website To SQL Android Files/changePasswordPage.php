<?php
	session_start();
	if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
   		$username = $_SESSION['username'];
   		if ($username == "guest"){
   			header("Location:changeGuestPasswordError.php");
   			exit;
   		}
	}else{
		header("Location:index.html");
		exit;
	}
?>

<html lang="en-US">
<head>
	<title>Change Password</title>

<style type="text/css">

body {
	background-image: url("../images/Montana1.jpg");
}

.login{
	position: absolute;
	top: 375px;
	left: calc(50% - 100px);
	height: 150px;
	width: 350px;
	padding: 10px;
	margin-botton: 10px;
	
}

.homeButton{
	position:absolute;
	top:540px;
	left: calc(50% - 90px);
	
}

label{
	margin-botton: 5px;
}


</style>
</head>
<body>
	<img src="../images/BSS.jpg" style="width= 500px; position: absolute; top: 50px; left: calc(50% - 200px);">
	<h1 style="position: absolute; top: 275px; left: calc(50% - 185px); font-size: 50px;">Change Password</h1>

	<form action='changePassword.php' method='POST'>
		<div class='login'>
			<input type="password" placeholder="Old Password" name="op"><br>
			<label></label><br>
			<input type="password" placeholder="New Password" name="np"><br>
			<label></label><br>
			<input type="password" placeholder="Retype New Password" name="np1"><br>
			<label></label><br>
			<input type="submit" value="Change">
			
		</div>
	</form>
		
	<form action="../main.php">
		<div class="homeButton">
			<input type="submit" value="Home">
		</div>
	</form>
</body>


</html>