<?php

include "config3.php";

if(isset($_GET['id'])){
    $s_id = $_GET['id'];

    $sql = "DELETE FROM lecturer WHERE LID='$s_id'";

        $result = mysqli_query($conn, $sql);

        if($result == TRUE) {
            header("Location: ViewLecture.php");
        }
        else{
            echo "Error:" . $sql . "<br>" . mysqli_error($conn);
        }
}
?>