<?php
// CSS By: Rawand Shamdin
// PHP By: Mike Butchko
// Tools used: W3 schools CSS package, W3 schools tutorials
//TUTORIALS that greatly helped my understanding and knowledge of building this program
//http://www.formget.com/login-form-in-php/
//http://www.w3schools.com/php/default.asp
//http://www.w3schools.com/sql/
//http://code.tutsplus.com/tutorials/user-membership-with-php--net-1523
include('admin_login_handle.php'); // Includes Login Script
if(isset($_SESSION['login_user'])) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="w3.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" type="text/css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" type="text/css">
    <style type="text/css">
html,body,h1,h2,h3,h4,h5 {
    font-family: "Raleway", sans-serif
    }

    .w3-sidenav a,.w3-sidenav h4 {
    font-weight: bold
    }
    </style>
</head>

<body class="w3-light-blue w3-content" style="max-width:1600px">
    <script type="text/javascript" src="user-edit-form.js">
</script>
    <!-- Header -->

    <header class="w3-container w3-blue w3-border w3-border-rounded w3-center">
        <h1><b>Advertisement Interactive!</b></h1>
    </header><br>
    <br>
    <br>
    <!--- sdfkdsfds -->

    <div class="w3-container w3-light-blue w3-topbar w3-bottombar w3-rightbar w3-leftbar w3-border-blue" id="main">
        <div class="w3-container w3-blue">
        <h1><span>Admin Login</span></h1>
        </div>

        <div id="login">
            <form class="w3-container" name="myAdminForm" action="" method="post" onsubmit="return validateAll()">
                <p id="username_err"></p>

                <center>
                    <span><label class="w3-label w3-text-black"><b>Username:</b></label>
                    <input id="name" name="username" onblur="return validateUserName()" placeholder="username" maxlength="30" type="text"></span>
                </center>

                <p id="password_err"></p>

                <center>
                    <span><label class="w3-label w3-text-black"><b>Password:</b></label>
                    <input id="password" name="password" onblur="return validatePassword()" placeholder="**********" maxlength="30" type="password"></span>
                </center>

                <center>
                    <input name="submit" type="submit" value=" Login ">
                    <span><?php echo $error; ?></span>
                </center>
            </form>
        </div>
    </div>
</body>
</html>
