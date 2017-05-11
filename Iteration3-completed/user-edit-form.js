/*
@Author Michael Butchko
@Section Itec 471
Validates Admin Profile
*/

/*
Empty -> Empty
@returns any error messages back to the form if they exist
- The form will not be able to submitted to the server if an error exists
*/
function validateAll(){
 var form_is_valid = false;
 
 if(validateUserName() == true && validatePassword() == true)
 {
	form_is_valid = true;
 }

 else
 {
    form_is_valid = false;  
 }
 
 return form_is_valid;
}


/*
String,String -> message
@param $id The paragraph id
@param $message The message being sent to the paragraph
@return A error message to the chosen paragraph
*/
function reportErrors(id,message){
  document.getElementById(id).innerHTML = message;
}

/*
@return A a boolean determining if the username field has an error or not
** A username 
- Cannot be empty
- Cannot exceed 30 characters
*/
function validateUserName(){

var no_username_error = true;

//checks to see if username is empty
 var u_name = document.forms["myUserForm"]["username"].value;
    if (u_name == null || u_name == "") 
    {
        reportErrors("username_err","<span>Username Required. <span>");
        no_username_error = false;
    }
    
//checks to see if username name is beyond 30 characters long
//not necessary by max length.
var name_length = u_name.length;
    if(name_length > 30)
    {
        reportErrors("username_err","<span>Username too long, must be 30 characters or less.” <span>");
        no_username_error = false;
    }

//no errors, clears the field 
if(no_username_error == true)
{
reportErrors("username_err","");
}
return no_username_error;
}




/*
@return A a boolean determining if the password field has an error or not
** A passsword 
- Cannot be empty
- Cannot exceed 30 characters
*/
function validatePassword(){

var no_password_error = true;

//checks to see if password is empty
 var p_name = document.forms["myUserForm"]["password"].value;
    if (p_name == null || p_name == "") 
    {
        reportErrors("password_err","<span>Password Required. <span>");
        no_password_error = false;
    }
    
//checks to see if password name is beyond 30 characters long
//not necessary by max length.
var pass_length = p_name.length;
    if(pass_length > 30)
    {
        reportErrors("password_err","<span>Password too long, must be 30 characters or less.” <span>");
        no_password_error = false;
    }

//no errors, clears the field 
if(no_password_error == true)
{
reportErrors("password_err","");
}
return no_password_error;
}


/** 
  * converts raw-text into equivalent html-text
  * @param $output gives back the sanitized input
*/
function sanitize($output){
    return nl2br(htmlspecialchars(get_magic_quotes_gpc() ? stripslashes($output) : $output));
}









