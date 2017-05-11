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
		$request_SQL = "SELECT * FROM Friends WHERE Friend = '".$screen_name."' And User = '".$username."' And Status = 1";
		$run_rs1 = mysql_query($request_SQL);
//user deny friend request. since user did not send the request he is the Friend in the database		
	if(mysql_num_rows($run_rs1) == 1){
		//set to pending
         $query = "UPDATE Friends SET Status = 0, Sent_Request = ''
              WHERE User ='$username' And Friend = '$screen_name' And Status = 1";
        
        $data = mysql_query ($query)or die(mysql_error());
        //Successful redirects user to friends profile with updated status update
        header("Location: friends.php"); // Redirecting To friend Page
}

?>