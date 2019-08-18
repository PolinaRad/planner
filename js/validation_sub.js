function formValidation()
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
