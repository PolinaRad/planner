


function formValidation()
{
var login = document.login.user_login;
var pass = document.login.user_password;


    if(login_validation(login))
    {   
         if(pass_validation(pass))
            {
                 return true;
            }
       
    }
   return false;
} 



function login_validation(login)
{
   
    var letters = /^[0-9a-zA-Z]+$/;
    var login_len = login.value.length;
    var letters = /^[0-9a-zA-Z]+$/;
    if (login_len == 0)
    {
        alert("Login should not be empty");
        login.focus();
        return false;
    }
    else if (!(login.value.match(letters)))
        {
            alert('Username must have alphanumeric characters only');
            login.focus();
            return false;
        }
    else
    {
        return true;
    }
}
function pass_validation(pass)
{
    var pass_len = pass.value.length;
    if (pass_len == 0)
    {
        alert("Password should not be empty");
        pass.focus();
        return false;
    }
  
    return true;
}

