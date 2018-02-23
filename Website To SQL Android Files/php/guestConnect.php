<?php
	session_start();
		
	$_SESSION['username']="guest";
		
	header("Location:../main.php");
    	exit;
    		
    		
?>