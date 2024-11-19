<?php

$sname = "localhost";
$uname = "root";
$pass = "";
$dbname = "dmw_cw";
$conn = mysqli_connect($sname, $uname, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exam_id = intval($_POST['exam-id']);
    $exam_name = $_POST['exam-name'];
    $exam_date = $_POST['exam-date'];
    $exam_time = $_POST['exam-time'];


        $sql = "UPDATE exam SET ExamName = '$exam_name', ExamDate = '$exam_date', ExamTime = '$exam_time' WHERE ExamID = $exam_id";
        if (mysqli_query($conn, $sql)) 
        {
            header("Location: viewexams2.php");
            exit();
        }
        else 
        {
            echo "<script>alert('Error: Cannot update exam');</script>";
        }
    
 
}

$exam_id = isset($_GET['ExamID']) ? intval($_GET['ExamID']) : 0;
$exam_name = '';
$exam_date = '';
$exam_time = '';


if ($exam_id > 0) {
    $sql = "SELECT * FROM exam WHERE ExamID = $exam_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $exam_name = $row['ExamName'];
        $exam_date = $row['ExamDate'];
        $exam_time = $row['ExamTime'];
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
<body style="background-image: url('Images2/newbackground.png'); background-size: cover; background-position: center;">
        <div class="container">
        <header>
            <div class="logo">
                <img src="images/logo.png" alt="Logo">
                <h1>STUDENT COURSE TRACKER</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="dashboardadmin.html">Dashboard</a></li>
                    <li>
                        <a href="">Student</a>
                        <ul>
                            <li><a href="addstudent.html">Add Students</a></li>
                            <li><a href="viewStudent.php">Manage Students</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Modules</a>
                        <ul>
                            <li><a href="addModule.html">Add Modules</a></li>
                            <li><a href="viewmodule.php">Manage Modules</a></li>
                        </ul>
                    </li>
                    <li><a href="login.html">Log Out</a></li>
                </ul>
            </nav>
        </header>

    <div class="content">
    <div class="fill">
        <div class = "header">
        <h1>Update Exams</h1>
        </div>

            <form class="exam-form" id="exam-form" method="post" action="updateexams.php?ExamID=<?php echo $exam_id; ?>" onsubmit="return Validate()">
                <label for="exam-id">Exam ID</label></br>
                <input type="text" id="exam-id" name="exam-id" value="<?php echo htmlspecialchars($exam_id); ?>" readonly></br></br>

                <label for="exam-name">Exam Name</label></br>
                <input type="text" id="exam-name" name="exam-name" value="<?php echo htmlspecialchars($exam_name); ?>"></br></br>

                <label for="exam-date">Exam Date</label></br>
                <input type="date" id="exam-date" name="exam-date" value="<?php echo htmlspecialchars($exam_date); ?>"></br></br>

                <label for="exam-time">Exam Time</label></br>
                <input type="time" id="exam-time" name="exam-time" value="<?php echo htmlspecialchars($exam_time); ?>"></br></br>



                <button type="submit">Update Exam</button>
            </form>
        </div>
    </div>
    <footer class="footer">
            <pre>
                <img src="Images/logo.png" alt="Institute logo">
                <a href="mailto:programes@nibm.lk">Contact Us</a>
                or call +94 75 468 3291  |  &copy; 2024 DUTH College
            </pre>
        </footer>
</body>
</html>

<?php mysqli_close($conn); ?>
