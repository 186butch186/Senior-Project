<?php
//@author: Michael Butchko
include('session.php');
//establish connection
//include('db_connection.php');

 ini_set('display_errors', True); 
 error_reporting(E_ALL | E_STRICT); 

 
 //creates variables from Get array
    $username = mysql_real_escape_string($_GET['username']);
    
//if user has never added a friend give them the option to
//double checking data
if ($NotInDataBase == TRUE)
{
    	//Inserts Freindship into table and assigns a pending status
        $query = "INSERT INTO Friends (User,Friend,Status,Sent_Request)
        VALUES ('$screen_name','$username',1,'$screen_name')"; 
        
        $data = mysql_query ($query)or die(mysql_error());
        //Successful redirects user to friends profile with updated status update
        header("Location: friends_profile.php?username=$username"); // Redirecting To Home Page
}

//if friend has already removed the user update the inforamtion in the database to pending
//NOTE - USER ADDED FRIEND TO THE FRIEND DATA BASE
if ($RequestDenied == TRUE)
{
		//set to pending
         $query = "UPDATE Friends SET Status = 1, Sent_Request = '$screen_name'
              WHERE User ='$screen_name' And Friend = '$username' And Status = 0";
        
        $data = mysql_query ($query)or die(mysql_error());
        //Successful redirects user to friends profile with updated status update
        header("Location: friends_profile.php?username=$username"); // Redirecting To Home Page
}

//if friend has already removed the user update the inforamtion in the database to pending
//NOTE - FRIEND ADDED USER TO THE FRIEND DATA BASE
if ($RequestDenied2 == TRUE)
{
		//set to pending
         $query = "UPDATE Friends SET Status = 1, Sent_Request = '$screen_name'
              WHERE User ='$username' And Friend = '$screen_name' And Status = 0";
        
        $data = mysql_query ($query)or die(mysql_error());
        //Successful redirects user to friends profile with updated status update
        header("Location: friends_profile.php?username=$username"); // Redirecting To Home Page
}

?>