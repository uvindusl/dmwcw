<?php
$sname = "localhost";
$uname = "root";
$pass = "";
$dbname = "dmw_cw";

$conn = mysqli_connect($sname, $uname, $pass, $dbname, 3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exam_name = $_POST['Module'];
    $exam_date = $_POST['exam-date'];
    $exam_time = $_POST['exam-time'];


        $sql = "INSERT INTO exam (ExamName, ExamDate, ExamTime) VALUES ('$exam_name', '$exam_date', '$exam_time')";
        if (mysqli_query($conn, $sql)) 
        {
            header("Location: viewexams2.php");
            exit();
        }
        else 
        {
            echo "<script>alert('Error: Cannot insert exam');</script>";
        }
    
}

mysqli_close($conn);
?>
