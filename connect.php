<?php
$host = "localhost";      // database host
$user = "root";           // your MySQL username (default is root in XAMPP)
$pass = "";               // your MySQL password (empty by default in XAMPP)
$db   = "asyx";           // your database name

// Create connection
$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>

