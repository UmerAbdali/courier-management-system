<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "courier_management";

$connection = mysqli_connect($server, $username, $password, $database);

if(!$connection) {
    die("Database Connection Failed");
}
?>