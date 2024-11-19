<?php

$sname = "localhost";
$uname = "root";
$pass = "";
$dbname = "dmw_cw";
$conn = mysqli_connect($sname, $uname, $pass, $dbname,3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $module_id = intval($_POST['module-id']);
    $module_name = $_POST['module-name'];
    $description = $_POST['description'];

    $sql = "UPDATE module SET MDiscription = '$description', MName = '$module_name' WHERE MID = $module_id";
    if (mysqli_query($conn, $sql)) 
    {
        header("Location: viewmodule.php");
    }
     else 
    {
        echo "<p style='color:red;'>Error updating exam: " . mysqli_error($conn) . "</p>";
    }
}

$module_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$module_name = '';
$description = '';

if ($module_id > 0) {
    $sql = "SELECT * FROM module WHERE MID = $module_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $module_name = $row['MName'];
        $description = $row['MDiscription'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Modules</title>
    <link rel="stylesheet" href="module-update.css">
    <script type="text/javascript" src="module.js"></script>
</head>
<body style="background-image: url('Images2/newbackground.png'); background-size: cover; background-position: center;">
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
                            <a href="">Modules</a>
                            <ul>
                                <li><a href="addModule.html">Add Modules</a></li>
                                <li><a href="viewmoduleforlec.php">Manage Modules</a></li>
                            </ul>
                        </li>
                        <li><a href="login.html">Log Out</a></li>
                    </ul>
                </nav>
            </header>

        <div class = "content">
            <div class = "fill">
                <div class = "heading">
            <h1> Update Module </h1>
                </div>
            <form class = "module-form" id = "module-form" method="post" action="module-update.php" onsubmit="return Validate()">
                    <label for="module-id">Module ID</label></br>
                    <input type="text" id="module-id" name="module-id" value="<?php echo htmlspecialchars($module_id); ?>" readonly></br></br>
                    <label for="module-name">Module Name</label></br>
                    <input type="text" id="module-name" name="module-name" value="<?php echo htmlspecialchars($module_name); ?>"></br></br>
                    <label for="description">Description</label></br>
                    <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($description); ?>"></br></br>
                <button type = "submit">Update Module</button>
            </form>
            </div>
        </div>
        <div class = "footer">
            <pre>
                <img src="Images/Untitled_design__2_-removebg-preview.png" alt = "Institute logo">
                <a href = "mailto:programes@nibm.lk">Contact Us</a>
                or with +94 75 468 3291  |  &copy; 2024 DUTH College
            </pre>
        </div>
</body>
</html>

<?php mysqli_close($conn); ?>
