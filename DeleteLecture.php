<?php

include "config3.php";

if(isset($_GET['id'])){
    $s_id = $_GET['id'];

    $sql = "DELETE FROM lecturer WHERE LID='$s_id'";

        $result = mysqli_query($conn, $sql);

        if($result == TRUE) {
            echo "<script>alert('delete successs, redirecting to the view page...');</script>";
            echo "<script>window.location.href = 'ViewLecture.php';</script>";

        }
        else{
            echo "Error:" . $sql . "<br>" . mysqli_error($conn);
        }
}
?>