<?php
session_start();

include '../db/connection.php';

// Check Admin Login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != "admin") {
    header("Location: ../login.php");
    exit();
}

if(isset($_GET['id'])){

    $request_id = intval($_GET['id']);

    mysqli_query($conn,
    "DELETE FROM requests
    WHERE request_id='$request_id'");

}

header("Location: manage_requests.php");
exit();
?>