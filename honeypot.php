<?php
$hostname = "localhost";
$dbuser = "php_admin";
$password = "phpadmin";
$db = "xss_webapp";

$dbconnect = mysqli_connect($hostname, $dbuser, $password, $db);

if ($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
}
$ip_addr = $_SERVER['REMOTE_ADDR'];

$sql = "call block_ip('" . $_SERVER['REMOTE_ADDR']. "');";
$query = mysqli_query($dbconnect, $sql);

echo '<br> get blocked your trash dude - '. $_SERVER['REMOTE_ADDR'];
?>