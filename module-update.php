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
    $module_id = intval($_POST['module-id']);
    $module_name = $_POST['module-name'];
    $description = $_POST['description'];

    $sql = "UPDATE module SET MDiscription = '$description', MName = '$module_name' WHERE MID = $module_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: viewmodule.php");
    } else {
        echo "<p style='color:red;'>Error updating exam: " . mysqli_error($conn) . "</p>";
    }
}

$module_id = isset($_GET['MID']) ? intval($_GET['MID']) : 0;
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
<body style="background-image: url('Images/bgimg.webp'); background-size: cover; background-position: center;">
    <div class="sidebar">
        <img src="Images/Untitled_design__2_-removebg-preview.png" width="100px">
        <nav>
            <ul>
                <li><a href=""><img src="Images/download-removebg-preview (4) (1).png"> Dashboard </a></li>
                <li><a href=""><img src="Images/download-removebg-preview (5) (1).png"> Students </a></li>
                <li><a href=""><img src="Images/download-removebg-preview (6) (1).png"> Lecturer </a></li>
                <li><a href=""><img src="Images/c.png"> Courses </a></li>
            </ul>
        </nav>
    </div>

    <div class="content">
        <h1>Update Module</h1>
        <div class="fill">
            <form class="module-form" id="module-form" method="post" action="module-update.php" onsubmit="return Validate()">
                <label for="module-id">Module ID</label></br>
                <input type="text" id="module-id" name="module-id" value="<?php echo htmlspecialchars($module_id); ?>" readonly></br></br>

                <label for="module-name">Module Name</label></br>
                <input type="text" id="module-name" name="module-name" value="<?php echo htmlspecialchars($module_name); ?>"></br></br>

                <label for="description">Description</label></br>
                <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($description); ?>"></br></br>

                <button type="submit">Update Module</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>
