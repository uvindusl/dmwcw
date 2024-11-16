<?php

include "config3.php";

$id = $_GET['id'];

$sql = "SELECT * FROM lecturer WHERE SID='$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1)
{
    $row = mysqli_fetch_assoc($result);
    $lname = $row['LName'];
    $email = $row['LEmail'];
    $contactno = $row['LPhoneNum'];
    $saddress = $row['LAddress'];
    
}

if(isset($_POST['submit'])){
    $new_lname = $_POST['LName'];
    $new_contactno = $_POST['PhoneNum'];
    $new_lemail = $_POST['Email'];
    $new_laddress = $_POST['Address'];
    

    $update_sql = "UPDATE lecturer SET  LName='$new_lname' , PhoneNum='$new_sage' , SAddress='$new_saddress' , SEmail='$new_semail' , SContact='$new_scontact' WHERE SID='$id'";

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
                
                <li><a href="#">
                    <img src="images/dashboard.png" alt="dash" class="icon">Dashboard</a></li>
                <li><a href="addstudent.html">
                    <img src="images/student.png" alt="student" class="icon">Students</a></li>
                <li><a href="#">
                    <img src="images/lectures.png" alt="lectures" class="icon">Lecturers</a></li>
                <li><a href="#">
                    <img src="images/course.png" alt="Courses" class="icon">Courses</a></li>
                <li><a href="#">
                    <img src="images/exam.png" alt="exam" class="icon">Exams</a></li>
                
            </ul>
        </div>
        <div class="login">
            <h1>Update</h1>
            <form class="form" method="post" action="">

                <label for="name">Student Name</label>
                <input type="text" id="LName" name="LName"  value="<?php echo $lname; ?>">

                <label for="contactno">Contact no</label>
                <input type="number" id="PhoneNum" name="PhoneNum" value="<?php echo $contactno; ?>">

                <label for="email">Email</label>
                <input type="email" id="Email" name="Email"  value="<?php echo $email; ?>">

                <label for="address">Address</label>
                <input type="text" id="Address" name="Address"  value="<?php echo $saddress; ?>">

               

                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>