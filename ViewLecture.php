<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Delete Lecturers</title>
    <link rel="stylesheet" href="ViewLecture.css">
</head>
<body>
<div class="container">
        <div class="sidebar">
            <div class="logo">
                <img src="images/logo.png" alt="Logo">
            </div>
            <ul>
                <li><a href="addstudent.html#"><img src="Images/student.png" alt="student" class="icon">Students</a></li>
                <li><a href="dashbord.html#"><img src="Images/dashboard.png" alt="dash" class="icon">Dashboard</a></li>
                <li><a href="#"><img src="Images/student.png" alt="student" class="icon">Students</a></li>
                <li><a href="#"><img src="Images/lectures.png" alt="lectures" class="icon">Lecturers</a></li>
                <li><a href="viewmodule.php#"><img src="Images/course.png" alt="Courses" class="icon">Modules</a></li>              
            </ul>
        </div>
        <div class="login">
            <h1>Update & Delete Lecture</h1>
            <?php
            include "config3.php";
            
            $sql = "SELECT * FROM lecturer";
            $result = mysqli_query($conn, $sql);
            
            echo <<<HTML
            <div class="table1">
                <table class="table centered">
                    <thead>
                        <tr>
                            <th>LID</th>
                            <th>LName</th>
                            <th>LPhoneNum</th>
                            <th>LEmail</th>
                            <th>SAddress</th>
                            
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
                            
                            <td>
                                <a class="button" href="updateStudent.php?id={$row['LID']}">Update</a>&nbsp;
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
        </div>
    </div>
</body>
</html>