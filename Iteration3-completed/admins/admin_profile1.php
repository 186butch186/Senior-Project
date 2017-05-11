<?php
// CSS By: Rawand Shamdin
// PHP By: Mike Butchko
// Tools used: W3 schools CSS package, W3 schools tutorials
include('session.php');
include('db_connection.php');
ini_set('display_errors', True); 
ini_set('display_startup_errors', True);  // pointless -- startup is already finished.
error_reporting(E_ALL | E_STRICT); 
?>

<!DOCTYPE html>
<html>
<title>Admin Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
</style>
<body class="w3-light-blue w3-content" style="max-width:1600px">

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-blue w3-animate-left" style="z-index:3;width:300px;"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding-large" title="close menu">&#88;
    </a><br><br>
  </div>
  <a class="w3-padding w3-blue">Welcome back <?php echo $login_session; ?>!</a>
  <a href="home.php" class="w3-padding w3-light-blue">Home</a> 
  <a href="logout.php" class="w3-padding">Logout</a>
  
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-leftbar w3-border-light-blue w3-round-xlarge" style="margin-left:300px">

  <!-- Header -->
  <header class="w3-container w3-blue">
    <a href="#"><img src="<?php echo $profile_pic ?>" style="width:85px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-opennav w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()">&#9776;</span>
    <h1><b><?php echo $login_session; ?>'s Profile</b></h1>
  </header>
  

  <ul class="w3-ul w3-center w3-hoverable w3-border">
  <li>Name: <?php echo $display_name; ?></li>
  <li>Birthday: <?php echo $birthday; ?></li>
  <li>Gender: <?php echo $gender; ?></li>
  <li>City: <?php echo $city; ?></li>
  <li>State: <?php echo $state; ?></li>
  <li>About me: <?php echo $about_me; ?></li>
  <li>Rank banner: <?php echo $rank_banner; ?></li>
  <li>Location: <?php echo $location; ?></li>
  </ul>
 
 <!-- Footer -->
 <footer class="w3-container w3-padding-hor-32 w3-blue w3-center">
  <p>Advertisement Interactive</p>
</footer>

<!-- End page content -->
</div>

<script>
// Script to open and close sidenav
function w3_open() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
    document.getElementsByClassName("w3-overlay")[0].style.display = "block";
}
 
function w3_close() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
    document.getElementsByClassName("w3-overlay")[0].style.display = "none";
}
</script>

</body>
</html>
