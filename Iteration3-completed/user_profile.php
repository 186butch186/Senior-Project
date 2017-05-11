<?php
//@author: Michael Butchko
include('session.php');
//establish connection
include('db_connection.php');

  ini_set('display_errors', True); 
  ini_set('display_startup_errors', True);  // pointless -- startup is already finished.
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

<b id="greeting">This is your profile <g><?php echo $fname;?></g></b>
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
echo '<img src="'.$profile_pic.'" alt="Profile Picture" style="width:300px; height:300px;"><br/>';
echo '<h3>Name</h3>';
echo '<p>'.$display_name.' </p><br/>';

if($Birthday_Display == "TRUE"){
echo '<h3>Birthday</h3>';
echo '<p>'.$birthday.' </p><br/>';
}

if($Gender_Display == "TRUE"){
echo '<h3>gender</h3>';
echo '<p>'.$gender.' </p><br/>';
}

echo '<h3>City</h3>';
echo '<p>'.$city.' </p><br/>';

echo '<h3>State</h3>';
echo '<p>'.$state.' </p><br/>';

echo '<h3>About Me</h3>';
echo '<p>'.$about_me.' </p><br/>';

echo '<h3>Rank Banner</h3>';
echo '<p>'.$rank_banner.' </p><br/>';

echo '<h3>Location</h3>';
echo '<p>'.$location.' </p><br/>';

if($Rank_Display == "TRUE"){
echo '<h3>Rank</h3>';
echo '<p>'.$rank.' </p><br/>';
}
?>



</div> 
</body>
</html>
