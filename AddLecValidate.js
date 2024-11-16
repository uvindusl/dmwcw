
function validate()
{
    if(document.lecd.lecname.value == "")
    {
        alert("Enter Lecture");
        return false;
    }   

    if(document.lecd.contactno.value == "")
    {
        alert("Enter contact number");
        return false;
    }  

    if(document.lecd.address.value == "")
    {
       alert("Enter address");
       return false;
    }  
        
    return true;
}