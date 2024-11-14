<?php
    include 'conf.php';

    $userName = $_POST['txtName'];
    $password = $_POST['txtPassword'];

    //if()

    $sql = "SELECT * FROM admin WHERE AName = '$userName' AND Password = '$password'";

    $results = mysqli_query($conn,$sql);

    if (mysqli_num_rows($results) > 0)
    {
        //echo "Login Succesful";
        header("Location: dashbord.html");
    }
    else
    {
        echo "enter correct username and password";
    }
?>
