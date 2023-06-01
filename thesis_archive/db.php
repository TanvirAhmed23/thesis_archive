<?php

$host = "localhost";
$user = "root";
$pass = "";
$bd = "thesis_archive";

$conn = new mysqli($host, $user, $pass, $bd);
if($conn->connect_error){
    die("connection failed" . $conn->connect_errno);
}
?>