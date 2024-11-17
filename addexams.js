function Validate() 
{
    let module = document.getElementById("Module").value.trim();
    let examdate = document.getElementById("exam-date").value.trim();
    let examtime = document.getElementById("exam-time").value.trim();

    let errorMessage = "";

    if (!module) 
    {
        errorMessage += "Please select module.\n";
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
