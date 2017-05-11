<?php
//@author: Michael Butchko
include('session.php');
//establish connection
//include('db_connection.php');

 ini_set('display_errors', True); 
 error_reporting(E_ALL | E_STRICT); 

 
 //creates variables from Get array
    $username = mysql_real_escape_string($_GET['username']);
    
//if user has accepted a friend request allow them to delete the friend
//double checking data
//NOTE - FRIEND ADDED USER TO THE FRIEND DATA BASE
if ($RequestAccepted == TRUE)
{
    	//Inserts Freindship into table and assigns a pending status
    	//Assign to friend removed
         $query = "UPDATE Friends SET Status = 0, Sent_Request = ''
              WHERE User ='$screen_name' And Friend = '$username' And Status = 2";
        
        $data = mysql_query ($query)or die(mysql_error());
        //Successful redirects user to friends profile with updated status update
        header("Location: friends_profile.php?username=$username"); // Redirecting To Home Page
}

//if user has accepted a friend request allow them to delete the friend
//double checking data
//NOTE - FRIEND ADDED USER TO THE FRIEND DATA BASE
if ($RequestAccepted2 == TRUE)
{
    	//Inserts Freindship into table and assigns a pending status
    	//Assign to friend removed
         $query = "UPDATE Friends SET Status = 0, Sent_Request = ''
              WHERE User ='$username' And Friend = '$screen_name' And Status = 2";
        
        $data = mysql_query ($query)or die(mysql_error());
        //Successful redirects user to friends profile with updated status update
        header("Location: friends_profile.php?username=$username"); // Redirecting To Home Page
}

?>