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
		header("Location: view.php");

    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<html lang="en">
<head></head>
<body>
    <h2>Edit Record</h2>
    <form method="post" action="">
        Student Name:<input type="text" id="StudentName" name="StudentName" value="<?php echo $sname; ?>"><br><br>
        Age:<input type="number" id="Age" name="Age" value="<?php echo $sage; ?>"><br><br>
        Address:<input type="text" id="Address" name="Address" value="<?php echo $saddress; ?>"><br><br>
        Email:<input type="text" id="Email" name="Email" value="<?php echo $semail; ?>"><br><br>
        Contact:<input type="text" id="Contact" name="Contact" value="<?php echo $scontact; ?>"><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>