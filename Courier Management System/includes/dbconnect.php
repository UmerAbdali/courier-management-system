<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "courier_management";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn) {
    die("Database Connection Failed");
}
?>