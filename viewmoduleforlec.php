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
    echo "<script>alert('update successs, redirecting to the view page...');</script>";
    echo "<script>window.location.href = 'Viewmoduleforlec.php';</script>";
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
                    <li><a href="dashboardlecuters.html">Dashboard</a></li>
                    <li> <a href="#">Student</a> 
                        <ul> 
                            <li><a href="viewStudentforlec.php">View Students</a></li> 
                        </ul> 
                    </li>
                    <li><a href="">Module</a>
                        <ul> 
                            <li><a href="addModule.html">Add Module</a></li>
                            <li><a href="viewmoduleforlec.php">Manage Module</a></li> 
                        </ul> 
                    </li>
                    <li><a href="">Exam</a>
                        <ul> 
                            <li><a href="addexams(base).php">Add Exam</a></li>
                            <li><a href="viewexams2.php">Manage Exam</a></li> 
                        </ul> 
                    </li>
                    <li> <a href="">GPA</a> 
                        <ul> 
                            <li><a href="gpaCal.php">Calculate GPA</a></li> 
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
                        <th>Actions</th>
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
                            echo "<td class='actions'>
                                <a href='module-update.php?id=" . $row['MID'] . "' class='btn update-btn'>Update</a>
                                <form action='' method='POST' style='display: inline;'>
                                    <input type='hidden' name='delete_id' value='" . $row['MID'] . "'>
                                    <button type='submit' class='btn delete-btn'>Delete</button>
                                </form>
                              </td>";
                            echo "</tr>";
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
    </div>
</body>
</html>