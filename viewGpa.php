<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewGPA</title>
    <link rel="StyleSheet" type="text/css" href="viewExamStyles.css">
</head>
<body class="Gpa">
<div class="container">
        <div class="sidebar">
            <div class="logo">
            <img src="images/logo.png" alt="Logo">
                </div>
                <ul>
                    <li><a href="viewExam.php#">
                        <img src="Images/exams.png" alt="exam" class="icon">Exams</a>
                    </li>  
                    <li><a href="#">
                        <img src="images/download.png" alt="gpa" class="icon">GPA</a>
                    </li> 
                </ul>
        </div>
        <div class="view">
            <h1>GPA</h1>
            <?php
            include "conf.php";
            
            $sql = "SELECT SID,SName,SGPA FROM student";
            $result = mysqli_query($conn, $sql);
            
            echo <<<HTML
            <div class="table1">
                <table class="table centered">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>GPA</th>
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