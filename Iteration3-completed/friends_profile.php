<?php
//@author: Michael Butchko
include('session.php');
//establish connection
include('db_connection.php');

  ini_set('display_errors', True); 
  error_reporting(E_ALL | E_STRICT); 

?>
<!DOCTYPE html>
<html>
<head>
<title>User Profile</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<div id="heading">

<b id="greeting"><g><?php echo $username;?> Profile</g></b>
<br/><br/>

<table id="T01">
  <tr>
    <th><a href="home.php">Home</a></th>
    <th><a href="user_profile.php">Profile</a></th>
    <th><a href="edit_profile.php">Edit Profile</a></th>
    <th><a href="friends.php">Friends</a></th>
    <th><a href="logout.php">Log Out</a></th>
</table>
</div>
<?php

echo '<img src="'.$profile_pic2.'" alt="Profile Picture" style="width:300px; height:300px;"><br/>';
/**
-Section of code that deals with user being able to add, or delete a user
*/
//if user has never added a friend give them the option to
if ($NotInDataBase == TRUE)
{
	echo "<a href='add_friend_handle.php?username=".$username."'>Add Friend</a> <br />";
}

/**
Three scenerios (all will be in if statements)
1-Request pending, notify the user
2-Request accepted, let user delete friend
3-Request denied, let user send another request
*/
	else
	{
		if($PendingRequest == TRUE || $PendingRequest2 == TRUE)
		{
			echo"Friend Request Sent!";
		}
			else if($RequestAccepted == TRUE || $RequestAccepted2 == TRUE)
			{
				echo "<a href='remove_friend_handle.php?username=".$username."'>Remove Friend</a> <br />";
			}
				else if ($RequestDenied == TRUE || $RequestDenied2 == TRUE)
				{
					echo "<a href='add_friend_handle.php?username=".$username."'>Add Friend</a> <br />";
				}
	}

echo '<h3>Name</h3>';
echo '<p>'.$display_name2.' </p><br/>';

if($Birthday_Display == "TRUE"){
echo '<h3>Birthday</h3>';
echo '<p>'.$birthday2.' </p><br/>';
}

if($Gender_Display == "TRUE"){
echo '<h3>gender</h3>';
echo '<p>'.$gender2.' </p><br/>';
}

echo '<h3>City</h3>';
echo '<p>'.$city2.' </p><br/>';

echo '<h3>State</h3>';
echo '<p>'.$state2.' </p><br/>';

echo '<h3>About Me</h3>';
echo '<p>'.$about_me2.' </p><br/>';

echo '<h3>Rank Banner</h3>';
echo '<p>'.$rank_banner2.' </p><br/>';

echo '<h3>Location</h3>';
echo '<p>'.$location2.' </p><br/>';

if($Rank_Display2 == "TRUE"){
echo '<h3>Rank</h3>';
echo '<p>'.$rank2.' </p><br/>';
}


?>



</div> 
</body>
</html>
