<?php
/**
if ( !empty($_POST) ) {}
if ($_POST['email'] == '186butch186@gmail.com')


*/

if (!empty($_POST['email'])) {
//creates connection to the database
$connection = mysql_connect("localhost", "rshamdin", "rshamdin1");

// Selecting Database
$db = mysql_select_db("rshamdin", $connection);

//variable for individual advertisement
$ad_id = $_POST["ad_id"];

//variable for email sent
$to = $_POST["email"];

// SQL Queries To Fetch Complete Information of metrics
$sql=mysql_query("select * from Users", $connection);
$sql2=mysql_query("select * from Interaction_fact", $connection);
$sql3=mysql_query("select * from Interaction_fact where ad_id='$ad_id'", $connection);
$sql4=mysql_query("select distinct(user_id) from Interaction_fact where ad_id='$ad_id'", $connection);

//selects rows from selected queries
$row = mysql_fetch_assoc($sql);
$row2 = mysql_fetch_assoc($sql2);
$row3 = mysql_fetch_assoc($sql3);
$row4 = mysql_fetch_assoc($sql4);

//counts num of total users
$userCount = mysql_num_rows($sql);

//counts num of total interactions
$interactionCount = mysql_num_rows($sql2);

//counts num of interactions per ad
$interactionCountPerAd = mysql_num_rows($sql3);

//counts num of users per ad
$userCountPerAd = mysql_num_rows($sql4);
mysql_close($connection); 



$subject = 'Advertisment Metrics';

$header = 'From: 186butch186@gmail.com';
$message = <<<EMAIL

Ad Id: $ad_id

Overall amount of users: $userCount
Overall amount of interactions: $interactionCount
Total amount of interactions of selected ad: $interactionCountPerAd
Total amount of users of selected ad: $userCountPerAd


EMAIL;


mail($to,$subject,$message,$header);

header("Location: admin_profile.php");
}

else {
echo "incorrect email for metrics";
}

?>


