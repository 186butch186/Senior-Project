<?php

/**
session.php
@Author: Michael Butchko
@Purpose: Store all user information for page to call back to
*/

//Display errors
  ini_set('display_errors', True); 
  ini_set('display_startup_errors', True);  // pointless -- startup is already finished.
  error_reporting(E_ALL | E_STRICT); 


//start session
session_start();
//includes database information to store user variables from database
include("db_connection.php");

//Checks to see if user is logged in, if so generate login data
if(isset($_SESSION['status']) && $_SESSION['status'] == 'verified') 
{

//Retrive variables from twitter database using the users sessions
		$screen_name 		= $_SESSION['request_vars']['screen_name'];
		$twitter_id			= $_SESSION['request_vars']['user_id'];
		$oauth_token 		= $_SESSION['request_vars']['oauth_token'];
		$oauth_token_secret = $_SESSION['request_vars']['oauth_token_secret'];

//Rerive information from the local database	
//first name
$ses_sql0=mysql_query("select fname from users where username='$screen_name'", $connection2);
$row0 = mysql_fetch_assoc($ses_sql0);
/**	
$ses_sql1=mysql_query("select picture from users where username='$screen_name'", $connection);
$row1 = mysql_fetch_assoc($ses_sql1);


//create variables for later use
$fname = $row0['fname'];
$profile_pic = $row1['picture'];
*/

//display_name
$ses_sql2=mysql_query("select display_name from users where username='$screen_name'", $connection2);
$row2 = mysql_fetch_assoc($ses_sql2);

//birthday
$ses_sql3=mysql_query("select birthday from users where username='$screen_name'", $connection2);
$row3 = mysql_fetch_assoc($ses_sql3);

//gender
$ses_sql4=mysql_query("select gender from users where username='$screen_name'", $connection2);
$row4 = mysql_fetch_assoc($ses_sql4);

//city
$ses_sql5=mysql_query("select city from users where username='$screen_name'", $connection2);
$row5 = mysql_fetch_assoc($ses_sql5);

//state
$ses_sql6=mysql_query("select state from users where username='$screen_name'", $connection2);
$row6 = mysql_fetch_assoc($ses_sql6);

//about me
$ses_sql7=mysql_query("select about_me from users where username='$screen_name'", $connection2);
$row7 = mysql_fetch_assoc($ses_sql7);

//rank_banner
$ses_sql8=mysql_query("select rank_banner from users where username='$screen_name'", $connection2);
$row8 = mysql_fetch_assoc($ses_sql8);

//picture
$ses_sql9=mysql_query("select picture from users where username='$screen_name'", $connection2);
$row9 = mysql_fetch_assoc($ses_sql9);

//Rank
$ses_sql10=mysql_query("select Rank from users where username='$screen_name'", $connection2);
$row10 = mysql_fetch_assoc($ses_sql10);

//Location
$ses_sql11=mysql_query("select Location from users where username='$screen_name'", $connection2);
$row11 = mysql_fetch_assoc($ses_sql11);

//Rank_Display
$ses_sql12=mysql_query("select Rank_Display from users where username='$screen_name'", $connection2);
$row12 = mysql_fetch_assoc($ses_sql12);

//Birthday_Display
$ses_sql13=mysql_query("select Birthday_Display from users where username='$screen_name'", $connection2);
$row13 = mysql_fetch_assoc($ses_sql13);

//Gender_Display
$ses_sql14=mysql_query("select Gender_Display from users where username='$screen_name'", $connection2);
$row14 = mysql_fetch_assoc($ses_sql14);




//create variables from database for later use
$fname =$row0['fname'];
$display_name =$row2['display_name'];
$birthday =$row3['birthday'];
$gender =$row4['gender'];
$city =$row5['city'];
$state =$row6['state'];
$about_me =$row7['about_me'];
$rank_banner =$row8['rank_banner'];
$profile_pic =$row9['picture'];
$rank =$row10['Rank'];
$location =$row11['Location'];

//display options
$Rank_Display =$row12['Rank_Display'];
$Birthday_Display =$row13['Birthday_Display'];
$Gender_Display =$row14['Gender_Display'];


}



//If looking at a users profile, go into this session
if(isset($_GET['username'])) {
//shorthand from _Get
$username = mysql_real_escape_string($_GET['username']);

//The following variables work is User looks up friends profile first
$PendingRequest = False;
$RequestAccepted = False;
$RequestDenied = False;

//The following variables work if User was added by the friend
$PendingRequest2 = False;
$RequestAccepted2 = False;
$RequestDenied2 = False;

//NO MATCH
//Checks database to see if the logged in user has added this account before
$check_User_added = mysql_query("SELECT * FROM Friends WHERE User = '".$screen_name."' And Friend = '".$username."'");
//Checks database to see if this users page has add the logged in users account before
$check_Friend_added = mysql_query("SELECT * FROM Friends WHERE User = '".$username."' And Friend = '".$screen_name."'");


//MATCH, PENDING
//Checks database to see if the logged in user request is pending
$check_User_added_Pending = mysql_query("SELECT * FROM Friends WHERE User = '".$screen_name."' And Friend = '".$username."' 
								And Status = 1");
//Checks database to see if the logged in user request is pending from third column in database
$check_User_added_Pending2 = mysql_query("SELECT * FROM Friends WHERE User = '".$username."' And Friend = '".$screen_name."' 
								And Status = 1");

//MATCH, ACCEPTED
//Checks database to see if the logged in user request is pending from third column in database
$check_User_added_Accepted = mysql_query("SELECT * FROM Friends WHERE User = '".$screen_name."' And Friend = '".$username."' 
								And Status = 2");
//Checks database to see if the logged in user request is pending
$check_User_added_Accepted2 = mysql_query("SELECT * FROM Friends WHERE User = '".$username."' And Friend = '".$screen_name."' 
								And Status = 2");								
								
//MATCH, DENIED
//Checks database to see if the logged in user request is pending
$check_User_added_Denied = mysql_query("SELECT * FROM Friends WHERE User = '".$screen_name."' And Friend = '".$username."' 
								And Status = 0");
//Checks database to see if the logged in user request is pending
$check_User_added_Denied2 = mysql_query("SELECT * FROM Friends WHERE User = '".$username."' And Friend = '".$screen_name."' 
								And Status = 0");																	

//checks database to see if there is no match for these two friendships
if((mysql_num_rows($check_User_added) == 0) && (mysql_num_rows($check_Friend_added) == 0) )
{
	//No rows exist in the database, they are not friends
	$NotInDataBase = True;
}

else
{
 	$NotInDataBase = False;
	//checks database to see if friend request is pending
	//display option to user that friend request has been sent
	 if((mysql_num_rows($check_User_added_Pending) == 1))
	{
		//No rows exist in the database, they are not friends
		$PendingRequest = True;
	}
	//second column check
	else if((mysql_num_rows($check_User_added_Pending2) == 1))
	{
		//No rows exist in the database, they are not friends
		$PendingRequest2 = True;
	}

		//checks database to see if friend request is accepted
		//then display a remove friend option
		else if((mysql_num_rows($check_User_added_Accepted) == 1))
		{
			//Remove friend option
			//Will turn status to 0 - no longer friends if deleted
			$RequestAccepted = True;
		}
		//third column check
		else if((mysql_num_rows($check_User_added_Accepted2) == 1))
		{
			//Remove friend option
			//Will turn status to 0 - no longer friends if deleted
			$RequestAccepted2 = True;
		}

			//checks database to see if friend request has been denied or removed
			//allow user to send a request
			else if((mysql_num_rows($check_User_added_Denied) == 1))
			{
			//No rows exist in the database, they are not friends
			$RequestDenied = True;
			}
			
			else if((mysql_num_rows($check_User_added_Denied2) == 1))
			{
			//No rows exist in the database, they are not friends
			$RequestDenied2 = True;
			}
}

$ses_sql15=mysql_query("select fname from users where username='$username'", $connection2);
$row15 = mysql_fetch_assoc($ses_sql15);

//display_name
$ses_sql16=mysql_query("select display_name from users where username='$username'", $connection2);
$row16 = mysql_fetch_assoc($ses_sql16);

//birthday
$ses_sql17=mysql_query("select birthday from users where username='$username'", $connection2);
$row17 = mysql_fetch_assoc($ses_sql17);

//gender
$ses_sql18=mysql_query("select gender from users where username='$username'", $connection2);
$row18 = mysql_fetch_assoc($ses_sql18);

//city
$ses_sql19=mysql_query("select city from users where username='$username'", $connection2);
$row19 = mysql_fetch_assoc($ses_sql19);

//state
$ses_sql20=mysql_query("select state from users where username='$username'", $connection2);
$row20 = mysql_fetch_assoc($ses_sql20);

//about me
$ses_sql21=mysql_query("select about_me from users where username='$username'", $connection2);
$row21 = mysql_fetch_assoc($ses_sql21);

//rank_banner
$ses_sql22=mysql_query("select rank_banner from users where username='$username'", $connection2);
$row22 = mysql_fetch_assoc($ses_sql22);

//picture
$ses_sql23=mysql_query("select picture from users where username='$username'", $connection2);
$row23 = mysql_fetch_assoc($ses_sql23);

//Rank
$ses_sql24=mysql_query("select Rank from users where username='$username'", $connection2);
$row24 = mysql_fetch_assoc($ses_sql24);

//Location
$ses_sql25=mysql_query("select Location from users where username='$username'", $connection2);
$row25 = mysql_fetch_assoc($ses_sql25);

//Rank_Display
$ses_sql26=mysql_query("select Rank_Display from users where username='$username'", $connection2);
$row26 = mysql_fetch_assoc($ses_sql26);

//Birthday_Display
$ses_sql27=mysql_query("select Birthday_Display from users where username='$username'", $connection2);
$row27 = mysql_fetch_assoc($ses_sql27);

//Gender_Display
$ses_sql28=mysql_query("select Gender_Display from users where username='$username'", $connection2);
$row28 = mysql_fetch_assoc($ses_sql28);




//create variables from database for later use for the selected profile
$fname2 =$row15['fname'];
$display_name2 =$row16['display_name'];
$birthday2 =$row17['birthday'];
$gender2 =$row18['gender'];
$city2 =$row19['city'];
$state2 =$row20['state'];
$about_me2 =$row21['about_me'];
$rank_banner2 =$row22['rank_banner'];
$profile_pic2 =$row23['picture'];
$rank2 =$row24['Rank'];
$location2 =$row25['Location'];

//display options
$Rank_Display2 =$row26['Rank_Display'];
$Birthday_Display2 =$row27['Birthday_Display'];
$Gender_Display2 =$row28['Gender_Display'];
}
?>