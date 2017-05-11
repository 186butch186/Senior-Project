<?php
//@author: Michael Butchko
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Friends</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src = "edit-profile-form.js">
</script>
</head>
<body>
<div id="profile">
<h1>Find your friends</h1>
<table id="T01">
  <tr>
  	<th><a href="home.php">Home</a></th>
    <th><a href="user_profile.php">Profile</a></th>
    <th><a href="edit_profile.php">Edit Profile</a></th>
    <th><a href="friends.php">Friends</a></th>
    <th><a href="logout.php">Log Out</a></th>
</table>
<br/>

<?php
//List all pending requests for this user
//Friend originally added user
		$request_SQL = "SELECT * FROM Friends WHERE Friend = '".$screen_name."' And Status = 1 And Sent_Request <> '".$screen_name."'";
		$run_rs1 = mysql_query($request_SQL);
echo "<h3>Friend Requests</h3>";		
	if(mysql_num_rows($run_rs1) > 0)
	 {
		// Loop the recordset $rs
		// Each row will be made into an array ($row) using mysql_fetch_array
		while($row = mysql_fetch_array($run_rs1)) 
		{
			// Write the value of the columns
			//Provides a link using $_GET of the okaymons more detailed history
		    echo "-".$row['User']." "."<a href='accept_friend_request_handle.php?username=".$row['User']."'>Accept</a> 
		    <a href='deny_friend_request_handle.php?username=".$row['User']."'>Deny</a><br />";
	    }
     }	
     
//List all pending requests for this user
//User originally added friend
		$request_SQL2 = "SELECT * FROM Friends WHERE User = '".$screen_name."' And Status = 1 And Sent_Request <> '".$screen_name."'";
		$run_rs3 = mysql_query($request_SQL2);		
	if(mysql_num_rows($run_rs3) > 0)
	 {
		// Loop the recordset $rs
		// Each row will be made into an array ($row) using mysql_fetch_array
		while($row3 = mysql_fetch_array($run_rs3)) 
		{
			// Write the value of the columns
			//Provides a link using $_GET of the okaymons more detailed history
		    echo "-".$row3['Friend']." "."<a href='accept_friend_request_handle.php?username=".$row3['Friend']."'>Accept</a> 
		    <a href='deny_friend_request_handle.php?username=".$row3['Friend']."'>Deny</a><br />";
	    }
     }	
?>

<?php
/**List all of users friends
Friends are in two categories
1 - User sent request (user =  user in database, friend = friend)
2 - User recived a request (user = friend in database, friend = user )
*/

//List all pending requests for this user (2)
		$Friend_SQL = "SELECT * FROM Friends WHERE Friend = '".$screen_name."' And Status = 2";
		$run_rs2 = mysql_query($Friend_SQL);
echo "<h3>Friends</h3>";		
	if(mysql_num_rows($run_rs2) > 0)
	 {
	 
		// Loop the recordset $rs
		// Each row will be made into an array ($row) using mysql_fetch_array
		while($row2 = mysql_fetch_array($run_rs2)) 
		{
			// Write the value of the columns
			//Provides a link using $_GET 
		    echo "- <a href='friends_profile.php?username=".$row2['User']."'>".$row2['User']."</a> <br />";
	    }
     }	
     
//List all pending requests for this user (1)
		$Friend_SQL2 = "SELECT * FROM Friends WHERE User = '".$screen_name."' And Status = 2";
		$run_rs4 = mysql_query($Friend_SQL2);		
	if(mysql_num_rows($run_rs4) > 0)
	 {
	 
		// Loop the recordset $rs
		// Each row will be made into an array ($row) using mysql_fetch_array
		while($row4 = mysql_fetch_array($run_rs4)) 
		{
			// Write the value of the columns
			//Provides a link using $_GET 
		    echo "- <a href='friends_profile.php?username=".$row4['Friend']."'>".$row4['Friend']."</a> <br />";
	    }
     }		
?>




<form name="myUserForm" action="" method="post" ">
<label>Search Users:</label>
<input id="name" name="search_friend" placeholder="Enter a Username" type="text"">


<input name="submit" type="submit" value=" Submit changes ">

<?php
		//submit button pressed, find friends.
		if(isset($_POST["search_friend"])) 
		{
		// Defines ad from the selected choices
		$search_friend = $_POST["search_friend"];
		// To protect MySQL injection for Security purpose
		$search_friend = stripslashes($search_friend);
		$search_friend = mysql_real_escape_string($search_friend);
		
		//NOTE CHANGE login TO username AND Users TO users
		//usernames that match the users choices
		$users_SQL = "SELECT * FROM users WHERE username LIKE '%".$search_friend."%' AND username <> '".$screen_name."'";
		$run_rs = mysql_query($users_SQL);
		
		echo "<h3>Users</h3>";
		
		// Loop the recordset $rs
		// Each row will be made into an array ($row) using mysql_fetch_array
		while($row = mysql_fetch_array($run_rs)) 
		{
			// Write the value of the columns
			//Provides a link using $_GET of the okaymons more detailed history
		    echo "- <a href='friends_profile.php?username=".$row['username']."'>".$row['username']."</a> <br />";
	    }
		
}
?>
</div>
</body>
</html>
