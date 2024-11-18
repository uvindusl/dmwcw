
function validate()
{
    if(document.lecform.lecname.value == "")
    {
        alert("Enter Lecture");
        return false;
    }   

    if(document.lecform.contactno.value == "")
    {
        alert("Enter contact number");
        return false;
    }  
    if(document.lecform.email.value == "")
        {
            alert("Enter email");
            return false;
        }  

    if(document.lecform.address.value == "")
    {
       alert("Enter address");
       return false;
    }  
    if(document.lecform.password.value == "")
        {
           alert("Enter password");
           return false;
        }  
        
    return true;
}