<?php

include "config.php";

$id = $_GET['id'];

$sql = "SELECT * FROM student WHERE SID='$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1)
{
    $row = mysqli_fetch_assoc($result);
    $sname = $row['SName'];
    $sage = $row['SAge'];
    $semail = $row['SEmail'];
    $saddress = $row['SAddress'];
    $scontact = $row['SContact'];
}

if(isset($_POST['submit'])){
    $new_sname = $_POST['StudentName'];
    $new_sage = $_POST['Age'];
    $new_semail = $_POST['Email'];
    $new_saddress = $_POST['Address'];
    $new_scontact = $_POST['Contact'];

    $update_sql = "UPDATE student SET  SName='$new_sname' , SAge='$new_sage' , SAddress='$new_saddress' , SEmail='$new_semail' , SContact='$new_scontact' WHERE SID='$id'";

    if(mysqli_query($conn, $update_sql)) {
        echo "<script>alert('update successs, redirecting to the view page...');</script>";
        echo "<script>window.location.href = 'viewStudent.php';</script>";


    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="addstudent.css">
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
                    <li><a href="dashboardadmin.html">Dashboard</a></li>
                    <li>
                        <a href="">Student</a>
                        <ul>
                            <li><a href="addstudent.html">Add Students</a></li>
                            <li><a href="viewStudent.php">Manage Students</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Lectures</a>
                        <ul>
                            <li><a href="AddLecture.html">Add Lectures</a></li>
                            <li><a href="ViewLecture.php">Manage Lectures</a></li>
                        </ul>
                    </li>
                    <li><a href="login.html">Log Out</a></li>
                </ul>
            </nav>
        </header>
        <div class="login">
            
            <form class="form" method="post" action="">
                <h1>Update Student</h1>
                <label for="name">Student Name</label>
                <input type="text" id="StudentName" name="StudentName"  value="<?php echo $sname; ?>">

                <label for="age">Age</label>
                <input type="number" id="Age" name="Age" value="<?php echo $sage; ?>">

                <label for="email">Email</label>
                <input type="email" id="Email" name="Email"  value="<?php echo $semail; ?>">

                <label for="address">Address</label>
                <input type="text" id="Address" name="Address"  value="<?php echo $saddress; ?>">

                <label for="contact">Contact</label>
                <input type="tel" id="Contact" name="Contact" value="<?php echo $scontact; ?>">

                <button type="submit" name="submit">Update</button>
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