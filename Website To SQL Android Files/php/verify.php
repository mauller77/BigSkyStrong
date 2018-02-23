<!DOCTYPE html>
<html>
<body>

<?php


$sqlserver = "localhost";
$sqlusername = "mybiycqt_joshuamoller";
$sqlpassword = "@Basilisk77";
$sqldatabase = "mybiycqt_bsg";



mysql_connect($sqlserver,$sqlusername,$sqlpassword) or die ("Connection Failed");


mysql_select_db($sqldatabase) or dies ("DB failed");



if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
    $hash = mysql_escape_string($_GET['hash']); // Set hash variable
                 
    $search = mysql_query("SELECT Username, Password, Email, Hash FROM Verify WHERE Email='".$email."' AND Hash='".$hash."'") or die("SQL FAILURE"); 
    $row = mysql_fetch_array($search);
    $match  = mysql_num_rows($search);
                 
    if($match > 0){
        // We have a match, activate the account
        
        $verifyUsername = $row['Username'];
        $verifyPassword = $row['Password'];
        $verifyEmail = $row['Email'];
        $verifyHash = $row['Hash'];
        
        
        mysql_query("INSERT INTO Login (Username, Password, Email) VALUES ('$verifyUsername', '$verifyPassword','$verifyEmail')") or die("SQL FAILURE");
        
    }
}


?>

<p>You Have Successfully Registered!!!!</p>
<p><a href="../index.html">Click Here</a> to go to the login page!</p>



</body>
</html>