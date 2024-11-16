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

    $sql = "INSERT INTO exam (ExamName, ExamDate, ExamTime, MID) VALUES ('$exam_name', '$exam_date', '$exam_time', '$mid')";

    if (mysqli_query($conn, $sql)) {
        header("Location: viewexams.php");
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}

mysqli_close($conn);
?>
