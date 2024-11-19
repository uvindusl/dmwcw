<?php
include 'conf.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $student = $_POST['Student'];
        $gpa = $_POST['GPAInput'];

        if (isset($_POST['tableData'])) 
        {
            $tableData = json_decode($_POST['tableData'], true);
            

            foreach ($tableData as $rowData) 
            {
                $module = $rowData['module'];
                $marks = $rowData['marks'];
                $grade = $rowData['grade'];
                $points = $rowData['points'];

                $sql = "INSERT INTO marksandgrade (SName,Module,Marks,Grade,Points) VALUES ('$student', '$module', '$marks', '$grade', '$points')";

                if (!mysqli_query($conn, $sql)) 
                {
                    echo "Error inserting record: " . mysqli_error($conn);
                }
            }

            $sql1 = "INSERT INTO gpa (SName,Gpa) VALUES ('$student','$gpa')";
            if (!mysqli_query($conn, $sql1)) 
            {
                echo "Error inserting record: " . mysqli_error($conn);
            }
            echo "<script>alert('Records inserted successfully, redirecting to the view page...');</script>";
            echo "<script>window.location.href = 'gpaCal.php';</script>";
        }
    }

mysqli_close($conn);
?>