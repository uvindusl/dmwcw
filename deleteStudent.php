<?php

include "config.php";

if(isset($_GET['id'])){
    $s_id = $_GET['id'];

    $sql = "DELETE FROM student WHERE SID='$s_id'";

        $result = mysqli_query($conn, $sql);

        if($result == TRUE) {
            header("Location: viewStudent.php");
        }
        else{
            echo "Error:" . $sql . "<br>" . mysqli_error($conn);
        }
}
?>