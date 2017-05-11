<?php
//@author: Michael Butchko


  ini_set('display_errors', True); 
  ini_set('display_startup_errors', True);  // pointless -- startup is already finished.
  error_reporting(E_ALL | E_STRICT); 

//setup connection
include('db_connection.php');

session_start();// Starting Session

// Storing Session
$user_check=$_SESSION['login_user'];

//Fetch Complete Information Of User

//username
$ses_sql=mysql_query("select login from Admins where login='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);

//create variables for later use
$login_session =$row['login'];

if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: admin_login.php'); // Redirecting To Home Page
}
?>