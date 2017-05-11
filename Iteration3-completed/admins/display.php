<?php
//creates connection to database
$connection = mysql_connect("localhost", "rshamdin", "rshamdin1");

// Selecting Database
$db = mysql_select_db("rshamdin", $connection);

//variable for individual advertisement
$ad_name = $_POST["ad_name"];

//SQL update query for Display table
	$sql_update = "UPDATE Display SET ad_id=(SELECT ad_id FROM Advertisements WHERE ad='$ad_name'), 
	company_id=(SELECT company_id FROM Advertisements WHERE ad='$ad_name')";

	
	if(mysql_query($sql_update, $connection))
	{
		echo "this worked!";
		
	}
	else{die('Error: ' . mysql_error());}


header("Location: admin_profile.php"); // Redirecting To Home Page
mysql_close($connection);  
?>


