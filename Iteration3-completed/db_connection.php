<?php
  ini_set('display_errors', True); 
  ini_set('display_startup_errors', True);  // pointless -- startup is already finished.
  error_reporting(E_ALL | E_STRICT); 


//@author: Michael Butchko

require_once('password.php'); 
//establishes connection with the database
$connection2 = mysql_connect("localhost", $user, $pass);
$db = mysql_select_db($user, $connection2);

?>