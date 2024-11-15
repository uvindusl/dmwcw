<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Delete Student</title>
    <link rel="stylesheet" href="view.css">
</head>
<body>
<div class="container">
        <div class="sidebar">
            <div class="logo">
                <img src="images/logo.png" alt="Logo">
            </div>
            <ul>
                <li><a href="#"><img src="images/dashboard.png" alt="dash" class="icon">Dashboard</a></li>
                <li><a href="addstudent.html"><img src="images/student.png" alt="student" class="icon">Students</a></li>
                <li><a href="#"><img src="images/lectures.png" alt="lectures" class="icon">Lecturers</a></li>
                <li><a href="#"><img src="images/course.png" alt="Courses" class="icon">Courses</a></li>
                <li><a href="#"><img src="images/exam.png" alt="exam" class="icon">Exams</a></li>
            </ul>
        </div>
        <div class="login">
            <h1>Update & Delete Student</h1>
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
                            <td>
                                <a class="button" href="update.php?id={$row['SID']}">Update</a>&nbsp;
                                <a class="button" href="delete.php?id={$row['SID']}">Delete</a>
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
        </div>
    </div>
</body>
</html>
