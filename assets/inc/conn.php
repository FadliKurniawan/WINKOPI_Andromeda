<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "db_winkopi";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Memeriksa koneksi database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
