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
<title>Admin Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
</style>
<body class="w3-grey w3-content" style="max-width:1600px">
</head>
<body>

 <!-- Header -->
 <center>
  <header class="w3-container w3-blue">
    <h1><b>Hello <g><?php echo $login_session;?></g> welcome!</b></h1>
  </header>
</center>


<ul class="w3-ul w3-center w3-hoverable w3-border">
	<li>
		<a href="logout.php">Log Out</a>
	</li>
<li>
<b>Welcome select your metric options!</b><br>
<form action="metrics.php" method="post">
	<select name="ad_id">
	<?php
	//creates connection to database
	$connection = mysql_connect("localhost", "rshamdin", "rshamdin1");
	
	// Selecting Database
	$db = mysql_select_db("rshamdin", $connection);
		
	// SQL Query To Fetch Complete Information Of Interaction facts
	$sql=mysql_query("select distinct(ad_id) from Interaction_fact order by ad_id asc", $connection);
	
	//loop grabs data from database and creates a dropdown menu
	while ($row = mysql_fetch_assoc($sql))
	{
		$ad_id = $row["ad_id"];
		echo "<option>
			$ad_id
			</option>";
	}
	
	// Closing Connection
	mysql_close($connection); 
	?>
	
	<label>Email :</label>
	<input type = "email" id="name" name="email" o placeholder="email"
	required>
	
	<input type="submit" value="Submit">
	</select>	

</form>
</li>


<li>
<b id="welcome">Welcome select an advertisement!</b><br>
<form action="display.php" method="post">
	<select name="ad_name">
	<?php
	//creates connection to database
	$connection = mysql_connect("localhost", "rshamdin", "rshamdin1");
	
	// Selecting Database
	$db = mysql_select_db("rshamdin", $connection);
		
	// SQL Query To Fetch Complete Information Of Advertisements
	$sql=mysql_query("select ad from Advertisements", $connection);
	
	//loop grabs data from database and creates a dropdown menu
	while ($row = mysql_fetch_assoc($sql))
	{
		$ad = $row["ad"];
		echo "<option>
			$ad
			</option>";
	}
	
	// Closing Connection
	mysql_close($connection); 
	?>
	<input type="submit" value="Submit">
	</select>	
</form>
</li>
</ul>
 <!-- Footer -->
 <footer class="w3-container w3-padding-hor-32 w3-blue w3-center">
  <p>Advertisement Interactive</p>
</footer>
</body>
</html>