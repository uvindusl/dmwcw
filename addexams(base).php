<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title> Add Exams </title>
        <link rel = "stylesheet" href = "addexams.css">
        <script type = "text/javascript" src = "addexams.js"></script>
    </head>
    <body style="background-image: url('Images2/newbackground.png'); background-size: cover; background-position: center;">
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
                        <a href="addModule.html">Modules</a>
                        <ul>
                            <li><a href="addModule.html">Add Modules</a></li>
                            <li><a href="viewmodule.php">Manage Modules</a></li>
                        </ul>
                    </li>
                    <li><a href="login.html">Log Out</a></li>
                </ul>
            </nav>
        </header>

        <div class = "content">
        <div class = "fill">
            <div class = "heading">
            <h1> Add Exams </h1>
            </div>
            <form class = "exam-form" id = "exam-form" method="post" action="addexams.php" onsubmit="return Validate()">
                <!--<label for="exam-name">Exam Name</label></br>
                <input type="text" id="exam-name" name="exam-name"></br></br>-->

                <label for="Module-name">Module Name</label>
                <select id="Module" name="Module">
                    <?php

                    $sname = "localhost";
                    $uname = "root";
                    $pass = "";
                    $dbname = "dmw_cw";
                    $conn = mysqli_connect($sname, $uname, $pass, $dbname);

                    $sql1 = "SELECT MName FROM module";
                    $result1 = mysqli_query($conn, $sql1);
                    
                    if (mysqli_num_rows($result1) > 0) 
                    {
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo "<option>{$row['MName']}</option>";
                        }
                    }
                    ?>
                </select><br><br>
    
                <label for="exam-date">Exam Date</label></br>
                <input type="date" id="exam-date" name="exam-date"></br></br>
    
                <label for="exam-time">Exam Time</label></br>
                <input type="time" id="exam-time" name="exam-time"></br></br>
    
               <!-- <label for="mid">Module ID</label></br>
                <input type="number" id="mid" name="mid"></br></br>--->
    
                <button type = "submit">Add Exam</button>
            </form>
            </div>
        </div>
        <footer class="footer">
            <pre>
                <img src="Images/logo.png" alt="Institute logo">
                <a href="mailto:programes@nibm.lk">Contact Us</a>
                or call +94 75 468 3291  |  &copy; 2024 DUTH College
            </pre>
        </footer>
    </body>
</html>