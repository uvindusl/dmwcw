<?php
    include "conf.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    $student = $_POST['Student'];
    $module = $_POST['Module'];
    $marks = $_POST['Marks'];
    $grade = $_POST['GradeInput'];   
    $points = $_POST['PointsInput'];

    $sql = "INSERT INTO marksandgrade (SName,Module,Marks,Grade,Points) VALUES ('$student','$module','$marks','$grade','$points')";
    
    if(mysqli_query($conn, $sql))
     {
        header("Location: gpaCal.php");
        echo "wade harida?";
       } else
       
       {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
    }
?>

