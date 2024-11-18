<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Delete Student</title>
    <link rel="stylesheet" href="viewStudent.css">
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
                        <a href="addstudent.html">Student</a>
                        <ul>
                            <li><a href="addstudent.html">Add Students</a></li>
                            <li><a href="viewStudent.php">Manage Students</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="AddLecture.html">Lectures</a>
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
            
            $sql = "SELECT * FROM student";
            $result = mysqli_query($conn, $sql);
            
            echo <<<HTML
            <div class="table-container">
                <table class="table centered">
                    <thead>
                        <tr>
                            <th>SID</th>
                            <th>SName</th>
                            <th>SAge</th>
                            <th>SAddress</th>
                            <th>SEmail</th>
                            <th>SContact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
            HTML;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo <<<HTML
                        <tr>
                            <td>{$row['SID']}</td>
                            <td>{$row['SName']}</td>
                            <td>{$row['SAge']}</td>
                            <td>{$row['SAddress']}</td>
                            <td>{$row['SEmail']}</td>
                            <td>{$row['SContact']}</td>
                            <td>
                                <a class="button" href="updateStudent.php?id={$row['SID']}">Update</a>&nbsp;
                                <a class="button" href="deleteStudent.php?id={$row['SID']}">Delete</a>
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
                <a href="mailto:programes@nibm.lk">Contact Us</a>
                or call +94 75 468 3291  |  &copy; 2024 DUTH College
            </pre>
        </footer>
    </div>
</body>
</html>
