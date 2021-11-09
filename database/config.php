<?php
$servername = "localhost";
$username = "admin";
$password = "123";
$dbname = "car-repair-shop";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {

    die("connection failed: " . $conn->connect_error);

}












