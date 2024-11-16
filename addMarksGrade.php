<?php
    include "conf.php";

    $student = $_POST['Student'];
    $module = $_POST['Module'];
    $marks = $_POST['Marks'];
    $grade = $_POST['GradeInput'];

    $sql = "INSERT INTO marksandgrade (SName,Module,Marks,Grade) VALUES ('$student','$module','$marks','$grade')";
    
    if(mysqli_query($conn, $sql))
     {
        header("Location: gpaCal.php");
       } else
       
       {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
        
?>

