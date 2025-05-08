<?php
// Establish the database connection
$connection = mysqli_connect("localhost", "root", "", "banking_system");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
