/*
@Author Michael Butchko
@Section Itec 472
Validates Admin Profile
*/

/*
Empty -> Empty
@returns any error messages back to the form if they exist
- The form will not be able to submitted to the server if an error exists
*/
function validateAll(){
 var form_is_valid = false;
 
 if(validateURL() == true && validateBirthday() == true)
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
@return A a boolean determining if the password field has an error or not
** A passsword 
- Cannot be empty
- Cannot exceed 30 characters
*/
function validateBirthday(){

var no_birthday_error = false;

//gets the value of birthday
var birthday = document.forms["myUserForm"]["birthday"].value;
 
var birthdayPattern = new RegExp("^[0-3][0-9]/[0-3][0-9]/(?:[0-9][0-9])?[0-9][0-9]$");

if (birthday.match(birthdayPattern)) 
    {
        no_birthday_error = true;
        sanitize(birthday);
    }
    
    else
    {
    	reportErrors("birthday_err","<span>Not a valid date, use format dd/mm/yyyy <span>");
        no_birthday_error = false;
    }  

//no errors, clears the field 
if(no_birthday_error == true)
{
reportErrors("birthday_err","");
}
return no_birthday_error;
}



/*
@return A a boolean determining if the username field has an error or not
** A username 
- Cannot be empty
- Cannot exceed 30 characters
*/
function validateURL(){

var no_url_error = true;

//checks to see if username is empty
 var URL = document.forms["myUserForm"]["profile_picture"].value;
 
 //expression used to match with a valid url
 var pattern = new RegExp("/^((http[s]?|ftp):\/)?\/?([^:\/\s]+)((\/\w+)*\/)([\w\-\.]+[^#?\s]+)(.*)?(#[\w\-]+)?$/");
 
    if (URL.match(pattern)) 
    {
        no_url_error = true;
        sanitize(URL);
    }
    
    else
    {
    	reportErrors("url_err","<span>Not a valid URL <span>");
        no_url_error = false;
    }
    

//no errors, clears the field 
if(no_url_error == true)
{
reportErrors("url_err","");
}
return no_url_error;


}

/** 
  * converts raw-text into equivalent html-text
  * @param $output gives back the sanitized input
*/
function sanitize($output){
    return nl2br(htmlspecialchars(get_magic_quotes_gpc() ? stripslashes($output) : $output));
}








