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
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Student</a>
                        <ul>
                            <li><a href="viewStudentforlec.php">View Students</a></li>
                        </ul>
                    </li>
                    <li><a href="addModule.html">Module</a>
                        <ul>
                            <li><a href="addModule.html">Add Module</a></li>
                            <li><a href="viewmoduleforlec.php">Manage Module</a></li>
                        </ul>
                    </li>
                    <li><a href="addexams(base).php">Exam</a>
                        <ul>
                            <li><a href="addexams(base).php">Add Exam</a></li>
                            <li><a href="viewexams2.php">Manage Exam</a></li>
                        </ul>
                    </li>
                    <li><a href="gpaCal.php">GPA</a>
                        <ul>
                            <li><a href="gpaCal.php">Calculate GPA</a></li>
                        </ul>
                    </li>
                    <li><a href="login.html">Log Out</a></li>
                </ul>
            </nav>
        </header>
        <div class="content">
            <h1>View Student</h1>
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
        </div>
        <footer class="footer">
            <pre>
                <a href="mailto:programes@nibm.lk">Contact Us</a>
                or call +94 75 468 3291  |  &copy; 2024 DUTH College
            </pre>
        </footer>
    </div>
</body>
</html>