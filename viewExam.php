<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewExams</title>
    <link rel="StyleSheet" type="text/css" href="viewExamStyles.css">
</head>
<body>
<div class="container">
        <div class="sidebar">
            <div class="logo">
            <img src="images/logo.png" alt="Logo">
                </div>
                <ul>
                    <li><a href="#">
                        <img src="Images/exams.png" alt="exam" class="icon">Exams</a>
                    </li>  
                    <li><a href="#">
                        <img src="images/download.png" alt="gpa" class="icon">GPA</a>
                    </li> 
                </ul>
        </div>
        <div class="view">
            <h1>Exam Schedule</h1>
            <?php
            include "conf.php";
            
            $sql = "SELECT * FROM exam";
            $result = mysqli_query($conn, $sql);
            
            echo <<<HTML
            <div class="table1">
                <table class="table centered">
                    <thead>
                        <tr>
                            <th>Exam number</th>
                            <th>Module</th>
                            <th>Date</th>
                            <th style="color:black;">Time</th>
                        </tr>
                    </thead>
                    <tbody> 
            HTML;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo <<<HTML
                        <tr>
                            <td>{$row['ExamID']}</td>
                            <td>{$row['ExamName']}</td>
                            <td>{$row['ExamDate']}</td>
                            <td style="color:black;">{$row['ExamTime']}</td>
                            
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