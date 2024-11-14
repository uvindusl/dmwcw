function DoValidate(){

    var form = document.forms["addStudentForm"];

    if (form["studentName"].value == "") { 
        alert("Please enter a Name!");
        return false; 
    }
    if (form["age"].value == "") {
        alert("Please enter an Age!"); 
        return false; 
    }
    if (form["email"].value == "") { 
        alert("Please enter an Email!"); 
        return false; 
    }
    if (form["address"].value == "") { 
        alert("Please enter an Address!"); 
        return false; 
    }
    if (form["contact"].value == "") { 
        alert("Please enter a Contact Number!"); 
        return false; 
    }
    if (form["password"].value == "") { 
        alert("Please enter a Password!"); 
        return false; 
    }

    return true;
}