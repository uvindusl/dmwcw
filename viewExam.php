<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "dmw_cw";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']);
    $sql = "DELETE FROM exam WHERE ExamID = $id";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update and Delete Exams</title>
    <link rel="stylesheet" href="viewexams2.css">
</head>
<body>
    <div class="sidebar">
    <header>
    <div class="logo">
                <img src="images/logo.png" alt="Logo">
                <h1>STUDENT COURSE TRACKER</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="dashboardstudent.html">Dashboard</a></li>
                    <li> <a href="viewExam.php">Exam</a> 
                        <ul> 
                            <li><a href="viewExam.php">View Exam Dates</a></li> 
                        </ul> 
                    </li>
                    <li> <a href="viewGpa.php">GPA</a> 
                        <ul> 
                            <li><a href="viewGpa.php">View GPA</a></li> 
                        </ul> 
                    </li>
                    <li><a href="login.html">Log Out</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="content">
        <h1>Update & Delete Exams</h1>
        <div class="table1">
            <table class="table centered">
                <thead>
                    <tr>
                        <th>ExamID</th>
                        <th>ExamName</th>
                        <th>ExamDate</th>
                        <th>ExamTime</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM exam";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['ExamID'] . "</td>";
                            echo "<td>" . $row['ExamName'] . "</td>";
                            echo "<td>" . $row['ExamDate'] . "</td>";
                            echo "<td>" . $row['ExamTime'] . "</td>";
                        
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
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
