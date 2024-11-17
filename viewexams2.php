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
        <img src="Images/Untitled_design__2_-removebg-preview.png" width="100px">
        <nav>
            <ul>
                <li><a href="dashboardlecuters.html"><img src="Images/download-removebg-preview (4) (1).png"> Dashboard </a></li>
                <li><a href="viewStudentforlec.php"><img src="Images/download-removebg-preview (5) (1).png"> Students </a></li>
                
                <li><a href="viewmoduleforlec.php"><img src="Images/c.png"> Courses </a></li>
            </ul>
        </nav>
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
                        <th>Actions</th>
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
                            echo "<td class='actions'>
                                <a href='updateexams.php?ExamID=" . $row['ExamID'] . "&ExamName=" . urlencode($row['ExamName']) . "&ExamDate=" . urlencode($row['ExamDate']) . "&ExamTime=" . urlencode($row['ExamTime']) . "' class='btn update-btn'>Update</a>
                                <form action='' method='POST' style='display: inline;'>
                                    <input type='hidden' name='delete_id' value='" . $row['ExamID'] . "'>
                                    <button type='submit' class='btn delete-btn'>Delete</button>
                                </form>
                              </td>";
                            echo "</tr>";
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
</body>
</html>
