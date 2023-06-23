<?php

//Connect to server
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "aiml";

$conn = mysqli_connect($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    echo '<script>alert("Connection failed: ' . $conn->connect_error . '");</script>';
} else {
    echo "<script>alert('Connection with database successful')</script>";
}

// $selectalreadycreateddatabase = mysqli_select_db($conn, $db_name);
// if ($selectalreadycreateddatabase) {
//     echo "<script>alert('Selected ", $db_name, " database!')</script>";
//     //echo "<br /> Existing database selected successfully";
// } else {
//     echo "<script>alert('Selected Database Not Found')</script>";
// }