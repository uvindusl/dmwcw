<?php
    include 'config.php';

    $userName = $_POST['txtName'];
    $password = $_POST['txtPassword'];
    $userType = $_POST['user'];

    if($userType == "admin")

    {
        $sql = "SELECT * FROM admin WHERE AName = '$userName' AND Password = '$password'";

        $results = mysqli_query($conn,$sql);
    
        if (mysqli_num_rows($results) > 0)
        {
            //echo "Login Succesful";
            header("Location: dashboardadmin.html");
        }
        else
        {
            echo "enter correct username and password";
        }

    }
    if($userType == "student")

    {
        $sql = "SELECT * FROM student WHERE SName = '$userName' AND Password = '$password'";

        $results = mysqli_query($conn,$sql);
    
        if (mysqli_num_rows($results) > 0)
        {
            //echo "Login Succesful";
            header("Location: dashboardstudent.html");
        }
        else
        {
            echo "enter correct username and password";
        }

    }
    if($userType == "lecturer")

    {
        $sql = "SELECT * FROM lecturer WHERE LName = '$userName' AND Password = '$password'";

        $results = mysqli_query($conn,$sql);
    
        if (mysqli_num_rows($results) > 0)
        {
            //echo "Login Succesful";
            header("Location: dashboardlecuters.html");
        }
        else
        {
            echo "enter correct username and password";
        }

    }

?>
