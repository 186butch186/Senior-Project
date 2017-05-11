<?php
//@author: Michael Butchko
//Class 471 Spike Exercise

//Includes users session information
include('session.php');
//establishes connection with the database
include('db_connection.php');


//Display errors
  ini_set('display_errors', True); 
  ini_set('display_startup_errors', True);  // pointless -- startup is already finished.
  error_reporting(E_ALL | E_STRICT);

$no_data_error = true;

   
//If display name field is not empty update 
if(!empty($_POST['display_name'])){

$display_name = mysql_real_escape_string($_POST['display_name']);
$checkDisplayName = mysql_query("SELECT * FROM users WHERE display_name = '".$display_name."'");

	//Name is in use, display an error message
	//checks database to see if that display name exists
     if(mysql_num_rows($checkDisplayName) == 1)
     {
        $no_data_error = false;
     }
	
	//Name not already in use, insert into the database
	else{
    $display_name = mysql_real_escape_string($_POST['display_name']);
    $query = "UPDATE users SET display_name ='$display_name'
              WHERE username ='$screen_name'";
    $data = mysql_query ($query)or die(mysql_error()); }
    }


//If birthday field is not empty update 
if(!empty($_POST['birthday'])){
    $birthday = mysql_real_escape_string($_POST['birthday']);
    $query = "UPDATE users SET birthday ='$birthday'
              WHERE username ='$screen_name'";
    $data = mysql_query ($query)or die(mysql_error()); 
    }

  
//If location field is not empty update 
if(!empty($_POST['location'])){
    $location = mysql_real_escape_string($_POST['location']);
    $query = "UPDATE users SET location ='$location'
              WHERE username ='$screen_name'";
    $data = mysql_query ($query)or die(mysql_error()); 
    }
    
//If about_me field is not empty update 
if(!empty($_POST['about_me'])){

    $about_me = mysql_real_escape_string($_POST['about_me']);
    $query = "UPDATE users SET about_me ='$about_me'
              WHERE username ='$screen_name'";
    $data = mysql_query ($query)or die(mysql_error()); 
    }
    
//If profile_picture field is not empty update 
if(!empty($_POST['profile_picture'])){

    $profile_picture = mysql_real_escape_string($_POST['profile_picture']);
    $query = "UPDATE users SET picture ='$profile_picture'
              WHERE username ='$screen_name'";
    $data = mysql_query ($query)or die(mysql_error()); 
    }

//If city field is not empty update 
if(!empty($_POST['city'])){

    $city = mysql_real_escape_string($_POST['city']);
    $query = "UPDATE users SET city ='$city'
              WHERE username ='$screen_name'";
    $data = mysql_query ($query)or die(mysql_error()); 
    }

//If state is not empty update        
if(array_key_exists('state', $_POST) && $_POST['state'] != ""){
    $state = ($_POST['state']);
    $query = "UPDATE users SET state ='$state'
              WHERE username ='$screen_name'";
    $data = mysql_query ($query)or die(mysql_error()); 
    }

  
//If gender is not empty update        
if(array_key_exists('gender', $_POST) && $_POST['gender'] != ""){
    $gender = ($_POST['gender']);
    $query = "UPDATE users SET gender ='$gender'
              WHERE username ='$screen_name'";
    $data = mysql_query ($query)or die(mysql_error()); 
    }

//If Birthday_Display is not empty update        
if(array_key_exists('Birthday_Display', $_POST) && $_POST['Birthday_Display'] != ""){
    $Birthday_Display = ($_POST['Birthday_Display']);
    $query = "UPDATE users SET Birthday_Display ='$Birthday_Display'
              WHERE username ='$screen_name'";
    $data = mysql_query ($query)or die(mysql_error()); 
    }

//If Gender_Display is not empty update        
if(array_key_exists('Gender_Display', $_POST) && $_POST['Gender_Display'] != ""){
    $Gender_Display = ($_POST['Gender_Display']);
    $query = "UPDATE users SET Gender_Display ='$Gender_Display'
              WHERE username ='$screen_name'";
    $data = mysql_query ($query)or die(mysql_error()); 
    }
    
//If Rank_Display is not empty update        
if(array_key_exists('Rank_Display', $_POST) && $_POST['Rank_Display'] != ""){
    $Rank_Display = ($_POST['Rank_Display']);
    $query = "UPDATE users SET Rank_Display ='$Rank_Display'
              WHERE username ='$screen_name'";
    $data = mysql_query ($query)or die(mysql_error()); 
    }
                 
if($no_data_error == true)
header("location: user_profile.php");

else
{
		echo "<center>";
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
        echo "<a href= \"edit_profile.php\"> Edit Profile</a>";
        echo "</center>";
}            
            
            

?>

