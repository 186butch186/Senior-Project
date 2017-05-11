<?php
//@author: Michael Butchko
session_start(); // Starting Session

  ini_set('display_errors', True); 
  ini_set('display_startup_errors', True);  // pointless -- startup is already finished.
  error_reporting(E_ALL | E_STRICT); 
  //include('constants.php');

//setup connection
include('db_connection.php');

$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {

//If username or password is empty
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";}

else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from Admins where pass='$password' AND login='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: admin_profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is not in database";
}
mysql_close($connection); // Closing Connection
}
}
?>