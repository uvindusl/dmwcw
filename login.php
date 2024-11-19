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
            echo "<script>alert('login successs, redirecting to the view page...');</script>";
            echo "<script>window.location.href = 'dashboardadmin.html';</script>";
    
            //echo "Login Succesful";
        }
        else
        {
            echo "<script>alert('login unsuccesss, redirecting to the view page...');</script>";
            echo "<script>window.location.href = 'login.html';</script>";
        }

    }
    if($userType == "student")

    {
        $sql = "SELECT * FROM student WHERE SName = '$userName' AND Password = '$password'";

        $results = mysqli_query($conn,$sql);
    
        if (mysqli_num_rows($results) > 0)
        {
            echo "<script>alert('login successs, redirecting to the view page...');</script>";
            echo "<script>window.location.href = 'dashboardstudent.html';</script>";
        }
        else
        {
            echo "<script>alert('login unsuccesss, redirecting to the view page...');</script>";
            echo "<script>window.location.href = 'login.html';</script>";
        }

    }
    if($userType == "lecturer")

    {
        $sql = "SELECT * FROM lecturer WHERE LName = '$userName' AND Password = '$password'";

        $results = mysqli_query($conn,$sql);
    
        if (mysqli_num_rows($results) > 0)
        {
            echo "<script>alert('login successs, redirecting to the view page...');</script>";
            echo "<script>window.location.href = 'dashboardlecuters.html';</script>";
            //echo "Login Succesful";
        }
        else
        {
            echo "<script>alert('login unsuccesss, redirecting to the view page...');</script>";
            echo "<script>window.location.href = 'login.html';</script>";
        }

    }

?>
