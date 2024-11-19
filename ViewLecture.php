<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Delete Student</title>
    <link rel="stylesheet" href="viewLecture.css">
</head>
<body>
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
                        <a href="">Lectures</a>
                        <ul>
                            <li><a href="AddLecture.html">Add Lectures</a></li>
                            <li><a href="ViewLecture.php">Manage Lectures</a></li>
                        </ul>
                    </li>
                    <li><a href="login.html">Log Out</a></li>
                </ul>
            </nav>
        </header>

        <main class="content">
            <h1>Update & Delete Student</h1>
            <?php
            include "config.php";
            
            $sql = "SELECT * FROM lecturer";
            $result = mysqli_query($conn, $sql);
            
            echo <<<HTML
            <div class="table-container">
                <table class="table centered">
                    <thead>
                        <tr>
                            <th>LID</th>
                            <th>Name</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Passowrd</th>
                            
                        </tr>
                    </thead>
                    <tbody> 
            HTML;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo <<<HTML
                        <tr>
                            <td>{$row['LID']}</td>
                            <td>{$row['LName']}</td>
                            <td>{$row['LPhoneNum']}</td>
                            <td>{$row['LEmail']}</td>
                            <td>{$row['LAddress']}</td>
                            <td>{$row['Password']}</td>
                            <td>
                                <a class="button" href="updateLecturer.php?id={$row['LID']}">Update</a>&nbsp;
                                <a class="button" href="deleteStudent.php?id={$row['LID']}">Delete</a>
                            </td>
                        </tr>
            HTML;
                }
            }
            
            echo <<<HTML
                    </tbody>
                </table>
            </div>
            HTML;
            ?>
        </main>

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