<?php
session_start();
include 'db/connection.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != "ngo"){
    header("Location: login.php");
    exit();
}

$ngo_id = $_SESSION['user_id'];
$donation_id = $_GET['id'];

$sql = "INSERT INTO requests (ngo_id, donation_id, pickup_status, request_status)
VALUES ('$ngo_id', '$donation_id', 'Pending', 'Pending')";

mysqli_query($conn, $sql);

echo "<script>
alert('Food Request Sent Successfully');
window.location='request_food.php';
</script>";
?>