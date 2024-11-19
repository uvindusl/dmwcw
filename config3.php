<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmw_cw";

$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection failed" .mysqli_connect_error());
}else{
    
}
?>