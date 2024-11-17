<?php

include "config.php";

if(isset($_POST['submit'])) {
    $sname = $_POST['studentName'];
    $sage = $_POST['age'];
    $semail = $_POST['email'];
    $saddress = $_POST['address'];
    $scontact = $_POST['contact'];
    $spassword = $_POST['password'];


    $sql = "INSERT INTO student (SName, SAge , SAddress , SEmail , SContact , Password) VALUES ('$sname','$sage','$saddress' , '$semail' , '$scontact' , '$spassword')";

    if(mysqli_query($conn, $sql)) {
        header("Location: addstudent.html");
       } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
}
else{
    echo "No Data received";
}
    mysqli_close($conn);

?>
