<?php
$sname = "localhost";
$uname = "root";
$pass = "";
$dbname = "dmw_cw";

$conn = mysqli_connect($sname, $uname, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $module_id = $_POST['module-id'];
    $module_name = $_POST['module-name'];
    $description = $_POST['description'];

    $sql = "UPDATE module SET MDiscription='$description', MName='$module_name' WHERE MID='$module_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: viewmodule.php");
        echo "<p style='color:green;'>Module updated successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}

mysqli_close($conn);
?>
