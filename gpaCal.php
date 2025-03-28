<!DOCTYPE html>
<html>
<head>
    <title>Calculate GPA</title>
    <link rel="stylesheet" href="gpaCalStyle.css">
    <script type="text/javascript" src="jquery-3.7.1.min.js"></script>

    <script type="text/javascript">
            $(document).ready(function() {
                $("#navtable").hide();
                $("#dataTable").hide();
                $("#button1").click(function() {
                    $("#dataTable").show("slow");
                    $("#navtable").show("slow");
                });
                
                
            });
        </script>

    <script>
        
        function calcGrade() 
        {
            var marks = document.getElementById('Marks').value;
            var grade = '';
            var points = 0;

            if (marks <= 24) 
            {
                grade = 'E';
                points = 0.0;
            } else if (marks <= 29) 
            {
                grade = 'D';
                points = 1.0;
            } else if (marks <= 34) 
            {
                grade = 'D+';
                points = 1.3;
            } else if (marks <= 39) 
            {
                grade = 'C-';
                points = 1.7;
            } else if (marks <= 44) 
            {
                grade = 'C';
                points = 2.0;
            } else if (marks <= 49) 
            {
                grade = 'C+';
                points = 2.3;
            } else if (marks <= 54) 
            {
                grade = 'B-';
                points = 2.7;
            } else if (marks <= 59) 
            {
                grade = 'B';
                points = 3.0;
            } else if (marks <= 64) 
            {
                grade = 'B+';
                points = 3.3;
            } else if (marks <= 69) 
            {
                grade = 'A-';
                points = 3.7;
            } else if (marks <= 84) 
            {
                grade = 'A';
                points = 4.0;
            } else if (marks <= 100) 
            {
                grade = 'A+';
                points = 4.0;
            }

            document.getElementById('Grade').innerHTML = grade;
            document.getElementById('GradeInput').value = grade;
            document.getElementById('Points').innerHTML = points;
            document.getElementById('PointsInput').value = points;

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

            calculateSum(); // Update sum of points

            // Clear form inputs after adding to the table
            document.getElementById('Module').value = '';
            document.getElementById('Marks').value = '';
            document.getElementById('Grade').innerHTML = '';
            document.getElementById('Points').innerHTML = '';
            document.getElementById('GradeInput').value = '';
            document.getElementById('PointsInput').value = '';

            return false; // Prevent form submission for adding to table only
        }

        function calculateSum() 
        {
            var table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
            var rows = table.getElementsByTagName('tr');
            var sum = 0; 
            var gpa = 0;
            for (var i = 0; i < rows.length; i++) 
            { 
                var points = parseFloat(rows[i].cells[3].innerHTML);
                sum += points; 
                
            }
            gpa = sum/rows.length;

            document.getElementById('GPA').innerHTML = gpa.toFixed(2); 
            document.getElementById('GPAInput').value = gpa.toFixed(2);
        }

        function prepareTableData() 
        {
            var table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
            var tableData = [];
            for (var i = 0, row; row = table.rows[i]; i++) {
                var rowData = {
                    'module': row.cells[0].innerHTML,
                    'marks': row.cells[1].innerHTML,
                    'grade': row.cells[2].innerHTML,
                    'points': row.cells[3].innerHTML
                };
                tableData.push(rowData);
            }
            document.getElementById('tableData').value = JSON.stringify(tableData);
        }

        document.addEventListener('DOMContentLoaded', function() 
        {
            document.getElementById('Marks').addEventListener('input', calcGrade);
        });

    </script>
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
                    <li><a href="dashboardlecuters.html">Dashboard</a></li>
                    <li><a href="#dataTable" id="navtable">Table</a></li>
                    <li> <a href="#">Student</a> 
                        <ul> 
                            <li><a href="viewStudentforlec.php">View Students</a></li> 
                        </ul> 
                    </li>
                    <li><a href="">Module</a>
                        <ul> 
                            <li><a href="addModule.html">Add Module</a></li>
                            <li><a href="viewmoduleforlec.php">Manage Module</a></li> 
                        </ul> 
                    </li>
                    <li><a href="">Exam</a>
                        <ul> 
                            <li><a href="addexams(base).php">Add Exam</a></li>
                            <li><a href="viewexams2.php">Manage Exam</a></li> 
                        </ul> 
                    </li>
                    <li> <a href="">GPA</a> 
                        <ul> 
                            <li><a href="gpaCal.php">Calculate GPA</a></li> 
                        </ul> 
                    </li>
                    <li><a href="login.html">Log Out</a></li>
                </ul>
            </nav>
        </header>
        <div class="form">
            <h1>Calculate Student GPA</h1>
            <?php
                include "config3.php";

                $sql = "SELECT SName FROM student";
                $result = mysqli_query($conn, $sql);

                $sql1 = "SELECT ExamName FROM exam";
                $result1 = mysqli_query($conn, $sql1);
            ?>
            <form class="form1" action="addMarksGrade.php" method="POST" onsubmit="prepareTableData()">
                <label for="Student-Name">Student Name</label>
                <select id="Student" name="Student">
                    <?php
                    if (mysqli_num_rows($result) > 0) 
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                            echo "<option>{$row['SName']}</option>";
                        }
                    }
                    ?>
                </select><br><br>

                <label for="Module-name">Module Name</label>
                <select id="Module" name="Module">
                    <?php
                    if (mysqli_num_rows($result1) > 0) 
                    {
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo "<option>{$row['ExamName']}</option>";
                        }
                    }
                    ?>
                </select><br><br>

                <label for="Marks">Marks</label>
                <input type="number" id="Marks" name="Marks" min="0" max="100"><br><br>

                <label for="Grade">Grade</label>
                <output id="Grade" name="Grade"></output>
                <input type="hidden" id="GradeInput" name="GradeInput"><br><br>

                <label for="Points">Points</label>
                <output id="Points" name="Points"></output>
                <input type="hidden" id="PointsInput" name="PointsInput"><br><br>

                <input type="hidden" id="tableData" name="tableData"> <!-- Hidden input for table data -->
                <input type="hidden" id="GPAInput" name="GPAInput">

                <button type="button" onclick="addToTable()" id="button1">Add to Table</button>
                <button type="submit">Save</button><br><br>

                <strong>GPA: </strong>
                <output id="GPA">0.00</output> 
            </form>
            <div class="tableDiv">
                <table id="dataTable" class="table">
                    <thead>
                        <tr>
                            <th>Module</th>
                            <th>Marks</th>
                            <th>Grade</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") 
                        {
                            $module = $_POST['Module'];
                            $marks = $_POST['Marks'];
                            $grade = $_POST['GradeInput'];
                            $points = $_POST['PointsInput'];
                            echo "<tr> <td>$module</td> <td>$marks</td> <td>$grade</td> <td>$points</td> </tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div>                     
                </div>
            </div>
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