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
    $exam_id = intval($_POST['exam-id']);
    $exam_name = $_POST['exam-name'];
    $exam_date = $_POST['exam-date'];
    $exam_time = $_POST['exam-time'];
    $mid = intval($_POST['MID']);

    $check = "SELECT MID FROM module WHERE MID = '$mid'";
    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0)
    {
        $sql = "UPDATE exam SET ExamName = '$exam_name', ExamDate = '$exam_date', ExamTime = '$exam_time', MID = '$mid' WHERE ExamID = $exam_id";
        if (mysqli_query($conn, $sql)) 
        {
            header("Location: viewexams.php");
            exit();
        }
        else 
        {
            echo "<script>alert('Error: Cannot update exam');</script>";
        }
    }
    else 
    {
        echo "<script>alert('Error: The MID does not exist.');</script>";
    }
}

$exam_id = isset($_GET['ExamID']) ? intval($_GET['ExamID']) : 0;
$exam_name = '';
$exam_date = '';
$exam_time = '';
$mid = '';

if ($exam_id > 0) {
    $sql = "SELECT * FROM exam WHERE ExamID = $exam_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $exam_name = $row['ExamName'];
        $exam_date = $row['ExamDate'];
        $exam_time = $row['ExamTime'];
        $mid = $row['MID'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Exams</title>
    <link rel="stylesheet" href="addexams.css">
    <script type="text/javascript" src="addexams.js"></script>
</head>
<body style="background-image: url('Images/Abstract-Dark-Blue-Vector-Background-Graphics-10784211-1.jpg'); background-size: cover; background-position: center;">
    <div class="sidebar">
        <img src="Images/Untitled_design__2_-removebg-preview.png" width="100px">
        <nav>
            <ul>
                <li><a href=""><img src="Images/download-removebg-preview (4) (1).png"> Dashboard </a></li>
                <li><a href=""><img src="Images/download-removebg-preview (5) (1).png"> Students </a></li>
                <li><a href="addexams.html"><img src="Images/images-removebg-preview (3) (1)"> Exams </a></li>
                <li><a href="addmodule.html"><img src="Images/c.png"> Modules </a></li>
            </ul>
        </nav>
    </div>

    <div class="content">
        <h1>Update Exams</h1>
        <div class="fill">
            <form class="exam-form" id="exam-form" method="post" action="updateexams.php?ExamID=<?php echo $exam_id; ?>" onsubmit="return Validate()">
                <label for="exam-id">Exam ID</label></br>
                <input type="text" id="exam-id" name="exam-id" value="<?php echo htmlspecialchars($exam_id); ?>" readonly></br></br>

                <label for="exam-name">Exam Name</label></br>
                <input type="text" id="exam-name" name="exam-name" value="<?php echo htmlspecialchars($exam_name); ?>"></br></br>

                <label for="exam-date">Exam Date</label></br>
                <input type="date" id="exam-date" name="exam-date" value="<?php echo htmlspecialchars($exam_date); ?>"></br></br>

                <label for="exam-time">Exam Time</label></br>
                <input type="time" id="exam-time" name="exam-time" value="<?php echo htmlspecialchars($exam_time); ?>"></br></br>

                <label for="MID">MID</label></br>
                <input type="number" id="MID" name="MID" value="<?php echo htmlspecialchars($mid); ?>"></br></br>

                <button type="submit">Update Exam</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>