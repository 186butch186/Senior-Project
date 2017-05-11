<?php
include("session.php");

//@author: Michael Butchko
include_once("config.php");
include_once("inc/twitteroauth.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login with Twitter using PHP by CodexWorld</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="profile">
<div id="heading">
<div id="heading">

<b id="greeting">Hello <g><?php echo $screen_name;?></g></b>
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


<h3>Select an advertisement to interacted with</h3>


<?php
		//Show welcome message
		//echo '<img src="'.$profile_pic.'" alt="Profile Picture" style="width:100px; height:100px;"><br/>';
		//echo '<div class="welcome_txt">Welcome <strong>'.$screen_name.'</strong> (Twitter ID : '.$twitter_id.')</div>';
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauth_token, $oauth_token_secret);
		
		//If user wants to tweet using form.
		if(isset($_POST["updateme"])) 
		{
		// Defines ad from the selected choices
		$ad = $_POST["ad"];
		

		// To protect MySQL injection for Security purpose
		$ad = stripslashes($ad);
		$_POST["updateme"] = stripslashes($_POST["updateme"]);
		$ad = mysql_real_escape_string($ad);
		$_POST["updateme"] = mysql_real_escape_string($_POST["updateme"]);
		
		//query to pull from data base
		$ses_sql=mysql_query("select hashtag from Advertisements where ad='$ad'", $connection2);
		$row = mysql_fetch_assoc($ses_sql);
		//grabbing the ad
		$hashtag =$row['hashtag'];
		
		//appending the text
		$_POST["updateme"] = $hashtag." ".$_POST["updateme"];
		
			//Post text to twitter
			$my_update = $connection->post('statuses/update', array('status' => $_POST["updateme"]));
			die('<script type="text/javascript">window.top.location="index.php"</script>'); //redirect back to index.php
		}
		
		//show tweet form
		echo '<center>';
		echo '<div class="tweet_box">';
		echo '<form method="post" action="home.php"><table width="200" border="0" cellpadding="3">';
		
		//pulls hashtag for specific advertisment from data base
		$p_SQL = 'SELECT ad FROM Advertisements WHERE ad <> ""';
		$rs_P = mysql_query($p_SQL);

		echo "<p>";
		echo '<select name="ad">';
		// Loop the recordset $rs
		// Each row will be made into an array ($row) using mysql_fetch_array
		while($row = mysql_fetch_array($rs_P)) 
		{
		// Write the value of the column FirstName (which is now in the array $row)
		echo '<option value="'.$row['ad'].'">'.$row['ad'].'</option>';
	 	}//end of while
	  
 	  	echo "</select>";
	  	echo "</p>";
		echo '<tr>';
		echo '<td><textarea name="updateme" cols="60" rows="4" maxlength="125"></textarea></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td><input type="submit" value="Tweet" /></td>';
		echo '</tr></table></form>';
		echo '</div>';
		echo '<center>';
		
		//Get latest tweets
		$my_tweets = $connection->get('statuses/user_timeline', array('screen_name' => $screen_name, 'count' => 5));
		
		echo '<div class="tweet_list"><strong>Latest Tweets : </strong>';
		echo '<ul>';
		foreach ($my_tweets  as $my_tweet) {
			echo '<li>'.$my_tweet->text.' <br />-<i>'.$my_tweet->created_at.'</i></li>';
		}
		echo '</ul></div>';

?>  
</body>
</html>
