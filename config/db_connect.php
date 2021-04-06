<?php 

// MySQLi or PDO
// connect to database
$conn = mysqli_connect('localhost', 'psfict', 'wifirocks266', 'first_website');

// check the connection
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
