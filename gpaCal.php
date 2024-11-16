<!DOCTYPE html>
<html>
    <head>
        <title>Calculate Gpa</title>
        <link rel="StyleSheet" href="gpaCal.css">
            <script> 

                function calcGrade()
                {
                    var marks = document.getElementById('Marks').value;
                    var grade = '';
                    let points = 0;

                    if (marks <= 24)
                    {
                        grade = 'E';
                        points = 0.0; 
                    } 
                    else if(marks <= 29)
                    {
                        grade = 'D';
                        points = 1.0;
                    } 
                    else if(marks <= 34)
                    {
                        grade = 'D+';
                        points = 1.3;
                    } 
                    else if(marks <= 39)
                    {
                        grade = 'C-';
                        points = 1.7;
                    }
                    else if(marks <= 44)
                    {
                        grade = 'C';
                        points = 2.0;
                    }
                    else if(marks <= 49)
                    {
                        grade = 'C+';
                        points = 2.3;
                    }
                    else if(marks <= 54)
                    {
                        grade = 'B-';
                        points = 2.7;
                    }
                    else if(marks <= 59)
                    {
                        grade = 'B';
                        points = 3.0;
                    }
                    else if(marks <= 64)
                    {
                        grade = 'B+';
                        points = 3.3;
                    }
                    else if(marks <= 69)
                    {
                        grade = 'A-';
                        points= 3.7;
                    }
                    else if(marks <= 84)
                    {
                        grade = 'A';
                        points = 4.0;
                    }
                    else if(marks <= 100)
                    {
                        grade = 'A+';
                        points = 4.0;
                    }

                    document.getElementById('Grade').innerHTML = grade;
                    document.getElementById('GradeInput').value = grade; 
                    
                    document.getElementById('Points').innerHTML = points;
                    document.getElementById('PointsInput').value = points;// Update hidden input      

                    return true;
                } 

                function addToTable()
                {
                    var module = document.getElementById('Module').value;
                    var marks = document.getElementById('Marks').value;
                    var grade = document.getElementById('GradeInput').value;
                    var points = document.getElementById('PointsInput').value;

                    var table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
                    var newRow = table.insertRow();

                    newRow.insertCell(0).innerHTML = module;
                    newRow.insertCell(1).innerHTML = marks;
                    newRow.insertCell(2).innerHTML = grade;
                    newRow.insertCell(3).innerHTML = points;

                    return false;

                }
                
                document.addEventListener('DOMContentLoaded',function()                 
                {
                    document.getElementById('Marks').addEventListener('input', calcGrade);
                    document.getElementById('Points').addEventListener('input', calcGrade); 
                });

            </script>
    </head>
    <body>
        <div class="container">
            <div class="sidebar">
                <div class="logo">
                    <img src="images/logo.png" alt="Logo">
                </div>
                <ul>
                    <li><a href="addstudent.html#"><img src="" alt="exam" class="icon">add Students</a></li>
                    <li><a href="dashbord.html#"><img src="images/dashboard.png" alt="dash" class="icon">Dashboard</a></li>
                    <li><a href="#"><img src="images/student.png" alt="student" class="icon">Students</a></li>
                    <li><a href="#"><img src="images/lectures.png" alt="lectures" class="icon">Lecturers</a></li>
                    <li><a href="viewmodule.php#"><img src="images/course.png" alt="Courses" class="icon">Modules</a></li> 
                </ul>
            </div>
            <div class="form">
                <h1>Calculate Student GPA</h1>
                <?php

                    include "conf.php";

                    $sql = "SELECT SName FROM student";
                    $result = mysqli_query($conn,$sql);

                    $sql1 = "SELECT MName FROM module";
                    $result1 = mysqli_query($conn,$sql1);

                    echo <<<HTML

                    <form class="form1" action="addMarksGrade.php" method="POST">

                    <label for="Student-Name">Student Name</label>
                    <select id="Student" name="Student">
                    HTML;

                        if(mysqli_num_rows($result)>0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo <<<HTML
                                
                                    <option>{$row['SName']}</option>
                                    
                                HTML;
                            }
                        }
                        echo <<<HTML
                        </select><br><br>
                        HTML;
                        
                        echo <<<HTML
                        <label for="Module-name">Module Name</label>
                        <select id="Module" name="Module">
                        HTML;

                        if(mysqli_num_rows($result1)>0)
                        {
                            while($row = mysqli_fetch_assoc($result1))
                            {
                                echo <<<HTML
                                
                                    <option>{$row['MName']}</option>
                                    
                                HTML;
                            }
                        }
                        echo <<<HTML
                        </select><br><br>
                        HTML;

                        echo <<<HTML

                        <label for="Marks">Marks</label>
                        <input type="number" id="Marks" name="Marks" min="0" max="100"><br><br>
                       

                        <label for="Grade">Grade</label>
                        <output id="Grade" name="Grade"></output>
                        <input type="hidden" id="GradeInput" name="GradeInput"><br><br>

                        <label for="Points">Points</label>
                        <output id="Points" name="Points"></output>
                        <input type="hidden" id="PointsInput" name="PointsInput"><br><br>

                        <button type="button" onclick="addToTable()">Add to Table</button>
                        <button type = "submit">Submit to Database</button>

                    </form>

                    HTML;
                    echo <<<HTML
                    <div class="tableDiv">
                        <table id="dataTable" calss="table">
                            <thead>
                                <tr>
                                    <th>Module</th>
                                    <th>Marks</th>
                                    <th>Grade</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                    HTML;
                            if ($_SERVER["REQUEST_METHOD"] == "POST")
                            {                   
                            $module = $_POST['Module'];
                            $marks = $_POST['Marks'];
                            $grade = $_POST['GradeInput'];   
                            $points = $_POST['PointsInput'];

                            echo <<<HTML
                                    <tr>
                                        <td>$module</td>
                                        <td>$marks</td>
                                        <td>$grade</td>
                                        <td>$points</td>
                                    </tr>
                            HTML;
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