function formValidation()
{
var login = document.registration.user_login;
var pass = document.registration.user_password;
var pass2 = document.registration.user_password2;   
var email = document.registration.user_email;   

    if(login_validation(login,5,12))
    {
        if(ValidateEmail(email))
        {

            if(pass_validation(pass,pass2,7,12))
            {
            alert('Form Succesfully Submitted');
                return true;
            }
        }
    }
   return false;
} 



function login_validation(login,mx,my)
{
    var login_len = login.value.length;
    var letters = /^[0-9a-zA-Z]+$/;
    if (login_len == 0 || login_len >= my || login_len < mx)
    {
        alert("Login should not be empty / length be between "+mx+" to "+my);
        login.focus();
        return false;
    }
    else if (!(login.value.match(letters)))
        {
            alert('Login must have alphanumeric characters only');
            login.focus();
            return false;
        }
    
         else
    {
        return true;
    }
    
}

function pass_validation(pass,pass2,mx,my)
{
    var pass_len = pass.value.length;
    if (pass_len == 0 ||pass_len >= my || pass_len < mx)
    {
        alert("Password should not be empty / length be between "+mx+" to "+my);
        pass.focus();
        return false;
    }
    else if (pass.value != pass2.value)
        { 
            alert("Passwords do not match");
            pass.focus();
            return false;
            
        }
  
  return true;

    
}

function ValidateEmail(uemail)
{
    var email_len = uemail.value.length;

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email_len != 0 )
        {
            if(uemail.value.match(mailformat))
            {
        return true;
        }
        
        else
        {
        alert("You have entered an invalid email address!");
        return false;
        }
        }
    else 
    {
        alert("Email should not be empty");
        uemail.focus();
        return false;
    }
} 
