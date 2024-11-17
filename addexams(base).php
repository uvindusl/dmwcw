<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title> Add Exams </title>
        <link rel = "stylesheet" href = "addexams.css">
        <script type = "text/javascript" src = "addexams.js"></script>
    </head>
    <body style="background-image: url('Images/Abstract-Dark-Blue-Vector-Background-Graphics-10784211-1.jpg'); background-size: cover; background-position: center;"></body>
        <div class = "sidebar">
            <img src = "Images/Untitled_design__2_-removebg-preview.png" width="100px">
            <nav>
                <ul>
                    <li><a href = "dashboardlecuters.html"><img src = "Images/download-removebg-preview (4) (1).png"> Dashboard </a></li>
                    <li><a href = "viewStudentforlec.php"><img src = "Images/download-removebg-preview (5) (1).png"> Students </a></li>
                    <li><a href = "viewmoduleforlec.php"><img src = "Images/c.png"> Courses </a></li>
                    <li><a href = "viewexams2.php"><img src = "Images/images-removebg-preview (3) (1).png"> Exams </a></li>
                </ul>
            </nav>
        </div>

        <div class = "content">
            <h1> Add Exams </h1>
            <div class = "fill">
            <form class = "exam-form" id = "exam-form" method="post" action="addexams.php" onsubmit="return Validate()">
                <!--<label for="exam-name">Exam Name</label></br>
                <input type="text" id="exam-name" name="exam-name"></br></br>-->

                <label for="Module-name">Module Name</label>
                <select id="Module" name="Module">
                    <?php

                    include "config3.php";

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
    </body>
</html>