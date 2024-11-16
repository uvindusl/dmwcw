<?php

include "config3.php";

$id = $_GET['id'];

$sql = "SELECT * FROM lecturer WHERE LID='$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1)
{
    $row = mysqli_fetch_assoc($result);
    $name = $row['LName'];
    $cnt = $row['LPhoneNum'];
    $email = $row['LEmail'];
    $address = $row['LAddress'];
    
}

if(isset($_POST['submit'])){
    $new_lname = $_POST['lecname'];
    $new_contact = $_POST['contact'];
    $new_email = $_POST['email'];
    $new_address = $_POST['address'];
    

    $update_sql = "UPDATE lecturer SET  LName='$new_lname' , LPhoneNum='$new_contact' , LEmail='$new_email' , LAddress='$new_address' WHERE LID='$id'";

    if(mysqli_query($conn, $update_sql)) {
		header("Location: ViewLecture.php");

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
                <input type="text" id="lecname" name="lecname"  value="<?php echo $name; ?>">

                <label for="contact">Contact</label>
                <input type="tel" id="contact" name="contact" value="<?php echo $cnt; ?>">

                <label for="email">Email</label>
                <input type="email" id="email" name="email"  value="<?php echo $email; ?>">

                <label for="address">Address</label>
                <input type="text" id="address" name="address"  value="<?php echo $address; ?>">

                

                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>