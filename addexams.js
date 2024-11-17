function Validate() 
{
    let examname = document.getElementById("Module").value.trim();
    let examdate = document.getElementById("exam-date").value.trim();
    let examtime = document.getElementById("exam-time").value.trim();

    let errorMessage = "";

    if (!examname) 
    {
        errorMessage += "Please enter a exam name.\n";
    } 
    else if (examname.length > 255) 
    {
        errorMessage += "Exam name is too long (maximum 255 characters).\n";
    }

    if (!examdate) 
    {
        errorMessage += "Please enter a exam date.\n";
    }

    if(!examtime)
    {
        errorMessage += "Please enter exam time. \n";
    }
    if (errorMessage)
    {
        alert(errorMessage);
        return false; // Prevent form submission if there are errors
    } 
    else
    {
        return true;
    }
}
