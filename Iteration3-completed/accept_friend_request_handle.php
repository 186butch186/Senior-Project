<?php
//@author: Michael Butchko
include('session.php');
//establish connection
//include('db_connection.php');

 ini_set('display_errors', True); 
 error_reporting(E_ALL | E_STRICT); 

 
 //creates variables from Get array
    $username = mysql_real_escape_string($_GET['username']);


//Double check that query is correct
//friend added user
		$request_SQL = "SELECT * FROM Friends WHERE Friend = '".$screen_name."' And User = '".$username."' And Status = 1";
		$run_rs1 = mysql_query($request_SQL);
//user accepts friend request. since user did not send the request he is the Friend in the database		
	if(mysql_num_rows($run_rs1) == 1){
		//set to pending
         $query = "UPDATE Friends SET Status = 2
              WHERE User ='$username' And Friend = '$screen_name' And Status = 1";
        
        $data = mysql_query ($query)or die(mysql_error());
        //Successful redirects user to friends profile with updated status update
        header("Location: friends.php"); // Redirecting To friend Page
        }
        
        
//Double check that query is correct
//User added friend
		$request_SQL2 = "SELECT * FROM Friends WHERE Friend = '".$username."' And User = '".$screen_name."' And Status = 1";
		$run_rs2 = mysql_query($request_SQL2);
//user accepts friend request. since user did not send the request he is the Friend in the database		
	if(mysql_num_rows($run_rs2) == 1){
		//set to pending
         $query = "UPDATE Friends SET Status = 2
              WHERE User ='$screen_name' And Friend = '$username' And Status = 1";
        
        $data = mysql_query ($query)or die(mysql_error());
        //Successful redirects user to friends profile with updated status update
        header("Location: friends.php"); // Redirecting To friend Page
}

?>