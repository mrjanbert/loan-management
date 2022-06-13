<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "loan-management");

// Check connection
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
  }
?>