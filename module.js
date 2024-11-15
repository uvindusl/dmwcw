function Validate() 
{
    let moduleName = document.getElementById("module-name").value.trim();
    let description = document.getElementById("description").value.trim();
    let errorMessage = "";

    if (!moduleName) 
    {
        errorMessage += "Please enter a module name.\n";
    } 
    else if (moduleName.length > 255) 
    {
        errorMessage += "Module name is too long (maximum 255 characters).\n";
    }

    if (!description) 
    {
        errorMessage += "Please enter a module description.\n";
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
