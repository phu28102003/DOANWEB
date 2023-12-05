<?php
$hostname = "localhost";
$username = "root";
$password = "20032810";
$database = "WEBSITE_DULICH";

// Thực hiện kết nối
$conn =  mysqli_connect($hostname, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
