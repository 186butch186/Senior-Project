<?php
//@author: Michael Butchko ,Chris Grant
//TUTORIALS that greatly helped my understanding and knowledge of building this program
//http://www.formget.com/login-form-in-php/
//http://www.w3schools.com/php/default.asp
//http://www.w3schools.com/sql/
//http://code.tutsplus.com/tutorials/user-membership-with-php--net-1523
include('admin_login_handle.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: admin_profile.php");
}

  ini_set('display_errors', True); 
  ini_set('display_startup_errors', True);  // pointless -- startup is already finished.
  error_reporting(E_ALL | E_STRICT);  
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src = "admin-edit-form.js">
</script>
</head>
<body>
<div id="main">
<h1><span>Admin Login</h1>
<div id="login">

<form name="myAdminForm" action="" method="post" onsubmit="return validateAll()">

<p id = username_err><p>
<label>UserName :</label>
<input id="name" name="username" onblur = "return validateUserName()" placeholder="username"
maxlength = "30" type="text">

<p id = password_err><p>
<label>Password :</label>
<input id="password" name="password" onblur = "return validatePassword()" placeholder="**********" 
maxlength = "30" type="password">

<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>