function formValidationSub()
{
var name = document.subject.sub_name;
var code = document.subject.sub_id;


    if(alphanumeric(name))
    {
        if((alphanumeric(code))
        { 
        }

    }
return false;

} 


function alphanumeric(name)
{
    var letters = /^[0-9a-zA-Z]+$/;
    var name_len = name.value.length;
    if (name_len == 0 )
    {
        alert("Assignment name should not be empty");
        name.focus();
        return false;
    }
    else if (!(name.value.match(letters)))
        {
            alert('Assignment name should have alphanumeric characters only');
            login.focus();
            return false;
        }
    else{
        return true;
    }
}
function formValidationAs()
{
var name = document.assignment.as_name;
var cur_date = document.assignment.as_cur_date;
var due_date = document.assignment.as_due_date;
    
var mark = document.assignment.as_mark;
    var max_mark = document.assignment.as_max_mark;
    var percent = document.assignment.as_percent;
    


    if(alphanumeric(name))
    {
        if(allnumeric(percent))
        { 
            if(allnumeric(max_mark))
            {
                if(allnumeric(mark))
                {
                    if(ValidateDate(cur_date))
                    {
                        if(ValidateDate(due_date))
                        {
                        }
                    } 
                }
            } 
        }

    }
return false;

} 


function alphanumeric(name)
{
    var letters = /^[0-9a-zA-Z]+$/;
    var name_len = name.value.length;
    if (name_len == 0 )
    {
        alert("Assignment name should not be empty");
        name.focus();
        return false;
    }
    else if (!(name.value.match(letters)))
        {
            alert('Assignment name should have alphanumeric characters only');
            login.focus();
            return false;
        }
    
        return true;
    
}
/*
function allnumeric(mark)
{ 
    var numbers = /^[0-9]+$/;
    mark_len=mark.value.length;
    if(mark.value.match(numbers) || mark.value == NULL)
    {
        return true;
    }
    else
    {
        alert('The enter should have numeric characters only');
        mark.focus();
        return false;
    }
}
*/
function ValidateDate(date)
{ 
    var date_format = /^\d{2}([.\/-])\d{2}\1\d{4}$/;
    if(date.value.match(date_format))
    {
        return true;
    }
    else
    {
        alert("You have entered an invalid date!");
        date.focus();
        return false;
    }

} 
        
        


function formValidationLogin()
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

function formValidationReg()
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
    else{
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
    else{
        return true;
    }
    
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
