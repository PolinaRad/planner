function formValidation()
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