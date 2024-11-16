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
    $exam_name = $_POST['exam-name'];
    $exam_date = $_POST['exam-date'];
    $exam_time = $_POST['exam-time'];
    $mid = $_POST['mid'];

    $check = "SELECT MID FROM module WHERE MID = '$mid'";
    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0)
    {
        $sql = "INSERT INTO exam (ExamName, ExamDate, ExamTime, MID) VALUES ('$exam_name', '$exam_date', '$exam_time', '$mid')";
        if (mysqli_query($conn, $sql)) 
        {
            header("Location: viewexams.php");
            exit();
        }
        else 
        {
            echo "<script>alert('Error: Cannot insert exam');</script>";
        }
    }
    else 
    {
        echo "<script>alert('Error: The MID does not exist.');</script>";
    }
   
}

mysqli_close($conn);
?>
