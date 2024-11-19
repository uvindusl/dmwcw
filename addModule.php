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

    $module_name = $_POST['module-name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO module (MDiscription, MName) VALUES ('$description', '$module_name')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('add successs, redirecting to the view page...');</script>";
        echo "<script>window.location.href = 'viewmoduleforlec.php';</script>";
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}

mysqli_close($conn);
?>