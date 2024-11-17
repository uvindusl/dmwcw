<?php
include 'conf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student = $_POST['Student'];
    if (isset($_POST['tableData'])) {
        $tableData = json_decode($_POST['tableData'], true);
        foreach ($tableData as $rowData) {
            $module = $rowData['module'];
            $marks = $rowData['marks'];
            $grade = $rowData['grade'];
            $points = $rowData['points'];
            $sql = "INSERT INTO marksandgrade (SName,Module,Marks,Grade,Points) VALUES ('$student', '$module', '$marks', '$grade', '$points')";
            if (!mysqli_query($conn, $sql)) {
                echo "Error inserting record: " . mysqli_error($conn);
            }
        }
        header("Location: copilat.php");
        echo "Records inserted successfully.";
    }
}
mysqli_close($conn);
?>