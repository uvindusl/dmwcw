<?php

include "config.php";

$id = $_GET['id'];

$sql = "SELECT * FROM student WHERE SID='$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1)
{
    $row = mysqli_fetch_assoc($result);
    $sname = $row['SID'];
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
		header("Location: viewStudent.php");

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
        <div class="sidebar">
            <div class="logo">
                <img src="images/logo.png" alt="Logo">
            </div>
            <ul>
                
                <li><a href="dashboardadmin.html">
                    <img src="images/dashboard.png" alt="dash" class="icon">Dashboard</a></li>
                <li><a href="addstudent.html">
                    <img src="images/student.png" alt="student" class="icon">Students</a></li>
                <li><a href="AddLecture.html">
                    <img src="images/lectures.png" alt="lectures" class="icon">Lecturers</a></li>
                
            </ul>
        </div>
        <div class="login">
            <h1>Update</h1>
            <form class="form" method="post" action="">

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
</body>
</html>