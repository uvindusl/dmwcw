<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "dmw_cw";

$conn = mysqli_connect($server,$username,$password,$dbname,3307);

if(!$conn)
{
    die("connection failed" . mysqli_connect_error());
}
echo "connected successsfuly<br>"

?>