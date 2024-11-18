<?php
include "conf.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update and Delete Modules</title>
    <link rel="stylesheet" href="viewModule.css">
</head>
<body>
    <div class="sidebar">
        <img src="Images/Untitled_design__2_-removebg-preview.png" width="100px">
        <nav>
            <ul>
                <li><a href="dashbord.html#"><img src="Images/download-removebg-preview (4) (1).png"> Dashboard </a></li>
                <li><a href="viewStudent.php#"><img src="Images/download-removebg-preview (5) (1).png"> Students </a></li>
                <li><a href="#"><img src="Images/download-removebg-preview (6) (1).png"> Lecturer </a></li>
                <li><a href="viewmodule.php#"><img src="Images/c.png"> Modules </a></li>
                <li><a href="addModule.html"><img src="Images/c.png">Add Modules </a></li>
            </ul>
        </nav>
    </div>

    <div class="content">
        <h1>Update & Delete Modules</h1>
        <div class="table1">
            <table class="table centered">
                <thead>
                    <tr>
                        <th>Module number</th>
                        <th>Discription</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM module";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['MID'] . "</td>";
                            echo "<td>" . $row['MDiscription'] . "</td>";
                            echo "<td>" . $row['MName'] . "</td>";
                            echo "<td class='actions'>
                                <a href='module-update.html?id=" . $row['MID'] . "' class='btn update-btn'>Update</a>
                                <form action='' method='POST' style='display: inline;'>
                                    <input type='hidden' name='delete_id' value='" . $row['MID'] . "'>
                                    <button type='submit' class='btn delete-btn'>Delete</button>
                                </form>
                              </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
