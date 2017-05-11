<?php
//@author: Michael Butchko
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Settings</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src = "edit-profile-form.js">
</script>
</head>
<body>
<div id="profile">
<h1>Edit your settings!</h1>
<table id="T01">
  <tr>
  	<th><a href="home.php">Home</a></th>
    <th><a href="user_profile.php">Profile</a></th>
    <th><a href="edit_profile.php">Edit Profile</a></th>
    <th><a href="friends.php">Friends</a></th>
    <th><a href="logout.php">Log Out</a></th>
</table>
<br/>

<form name="myUserForm" action="edit_profile_handle.php" method="post" onsubmit="return validateAll()">
<label>Display Name:</label>
<input id="name" name="display_name" placeholder="Enter a name" type="text" onblur="return sanitize(this.value)">

<p id = birthday_err><p>
<label>Birthday</label>
<input id="name" name="birthday" placeholder="Format 00/00/0000" type="text" onblur = "return validateBirthday()">

<label>Location:</label>
<input id="name" name="location" placeholder="Radford" type="text"  onblur="sanitize(this.value)">

<label>About me</label>
<input id="password" name="about_me" placeholder="What describes you?" type="text" onblur="sanitize(this.value)">

<p id = url_err><p>
<label>Picture</label>
<input id="password" name="profile_picture" placeholder="" type="text" onblur = "return validateURL()">

<label>City</label>
<input id="name" name="city" placeholder="Enter a city" type="text"  onblur="sanitize(this.value)">

<label>State</label>
<p>
  <select name="state">
  <option value="">Select</option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>
</p> 

<label>Gender</label>
<p>
  <select name="gender">
     <option value="">Select</option>
     <option value="M">Male</option>
     <option value="F">Female</option>
  </select>
</p> 

<label>Display Birthday?</label>
<p>
  <select name="Birthday_Display">
  	<option value="">Select</option>
     <option value="TRUE">Yes</option>
     <option value="FALSE">No</option>
  </select>
</p> 

<label>Display Gender?</label>
<p>
  <select name="Gender_Display">
  <option value="">Select</option>
     <option value="TRUE">Yes</option>
     <option value="FALSE">No</option>
  </select>
</p> 

<label>Display Rank?</label>
<p>
  <select name="Rank_Display">
     <option value="">Select</option>
     <option value="TRUE">Yes</option>
     <option value="FALSE">No</option>
  </select>
</p> 

<input name="submit" type="submit" value=" Submit changes ">


</div>
</body>
</html>
