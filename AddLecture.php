<?php

include "config3.php";

if(isset($_POST['submit'])) {
    $lname = $_POST['lecname'];
    $lcno = $_POST['contactno'];
    $lemail = $_POST['email'];
    $laddress = $_POST['address'];
    

    $sql = "INSERT INTO lecturer (LName, LPhoneNum , LEmail , LAddress) VALUES ('$lname','$lcno' , '$lemail' , '$laddress')";

    if(mysqli_query($conn, $sql)) {
        header("Location: AddLecture.html");
       } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
}
else{
    echo "No Data received";
}
    mysqli_close($conn);

?>