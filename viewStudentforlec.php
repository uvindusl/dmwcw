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
        <div class="sidebar">
            <div class="logo">
                <img src="images/logo.png" alt="Logo">
            </div>
            <ul>
                <li><a href="dashboardlecuters.html"><img src="images/dashboard.png" alt="dash" class="icon">Dashboard</a></li>
                <li><a href="viewStudentforlec.php"><img src="images/student.png" alt="student" class="icon">Students</a></li>
                <li><a href="viewmoduleforlec.php"><img src="images/course.png" alt="Courses" class="icon">Modules</a></li>              
            </ul>
        </div>
        <div class="login">
            <h1>View Student</h1>
            <?php
            include "config.php";
            
            $sql = "SELECT * FROM student";
            $result = mysqli_query($conn, $sql);
            
            echo <<<HTML
            <div class="table1">
                <table class="table centered">
                    <thead>
                        <tr>
                            <th>SID</th>
                            <th>SName</th>
                            <th>SAge</th>
                            <th>SAddress</th>
                            <th>SEmail</th>
                            <th>SContact</th>
                            <th>SGPA</th>
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
                            <td>{$row['SGPA']}</td>
                            
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
    </div>
</body>
</html>
