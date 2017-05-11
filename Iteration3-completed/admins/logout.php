<?php
  ini_set('display_errors', True); 
  ini_set('display_startup_errors', True);  // pointless -- startup is already finished.
  error_reporting(E_ALL | E_STRICT); 


//@author: Michael Butchko
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: admin_login.php"); // Redirecting To Home Page
}
?>