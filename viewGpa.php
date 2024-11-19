<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewGPA</title>
    <link rel="StyleSheet" type="text/css" href="viewexams2.css">
</head>
<body class="Gpa">
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
        <div class="view">
            <h1>GPA</h1>
            <?php
            include "config3.php";
            
            $sql = "SELECT GpaId,SName,Gpa FROM gpa";
            $result = mysqli_query($conn, $sql);
            
            echo <<<HTML
            <div class="table1">
                <table class="table centered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>GPA</th>
                        </tr>
                    </thead>
                    <tbody> 
            HTML;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo <<<HTML
                        <tr>
                            <td>{$row['GpaId']}</td>
                            <td>{$row['SName']}</td>
                            <td>{$row['Gpa']}</td>
                            
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
                <img src="Images/logo.png" alt="Institute logo">
                <a href="mailto:programes@nibm.lk">Contact Us</a>
                or call +94 75 468 3291  |  &copy; 2024 DUTH College
            </pre>
    </footer>
    </div>
</body>
</html>