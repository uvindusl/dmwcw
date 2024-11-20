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
        echo "<script>alert('update successs, redirecting to the view page...');</script>";
        echo "<script>window.location.href = 'ViewLecture.php';</script>";
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
    <link rel="stylesheet" href="Updatelecture.css">
    <script type="text/javascript" src="updatelecvalidate.js"></script>
</head>
<body>
<header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
            <h1>STUDENT COURSE TRACKER</h1>
        </div>
        <nav>
                <ul>
                    <li><a href="dashboardadmin.html">Dashboard</a></li>
                    <li><a href="#">Students</a>
                        <ul>
                            <li><a href="addstudent.html">Add Students</a></li>
                            <li><a href="viewStudent.php">Manage Students</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Lecturers</a>
                        <ul>
                            <li><a href="AddLecture.html">Add Lectures</a></li>
                            <li><a href="ViewLecture.php">Manage Lectures</a></li>
                        </ul>
                    </li>
                    <li><a href="login.html">Log Out</a></li>
                </ul>
            </nav>
    </header>
        
        <div class="content">
        <div class = "fill">
            <div class = "heading">
            <h1>Update Lecturer</h1>
            </div>
            <form class="form" method="post" action="" name="lecd" onsubmit="return validate()">

                <label for="name">Lecturer Name</label><br>
                <input type="text" id="lecname" name="lecname"  value="<?php echo $name; ?>">

                <label for="contact">Contact</label><br>
                <input type="tel" id="contact" name="contact" value="<?php echo $cnt; ?>">

                <label for="email">Email</label><br>
                <input type="email" id="email" name="email"  value="<?php echo $email; ?>">

                <label for="address">Address</label><br>
                <input type="text" id="address" name="address"  value="<?php echo $address; ?>">

                

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
</div>

    
</body>
</html>