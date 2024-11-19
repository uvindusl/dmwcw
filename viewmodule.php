<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "dmw_cw";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']);
    $sql = "DELETE FROM module WHERE MID = $id";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update and Delete Modules</title>
    <link rel="stylesheet" href="viewModule.css">
</head>
<body>
<body>
        <div class="container">
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
                    <li> <a href="">Module</a> 
                        <ul> 
                            <li><a href="viewmodule.php">view module</a></li> 
                        </ul> 
                    </li>
                    <li><a href="login.html">Log Out</a></li>
                </ul>
            </nav>
            </header>

    <div class="content">
        <h1>Update & Delete Modules</h1>
        <div class="table1">
            <table class="table centered">
                <thead>
                    <tr>
                        <th>Module number</th>
                        <th>Discription</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM module";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['MID'] . "</td>";
                            echo "<td>" . $row['MDiscription'] . "</td>";
                            echo "<td>" . $row['MName'] . "</td>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
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
