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

    // Get current status
    $sql = "SELECT pickup_status FROM requests WHERE request_id='$request_id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        if($row['pickup_status'] == "Pending"){
            $new_status = "Picked";
        }else{
            $new_status = "Pending";
        }

        mysqli_query($conn,
        "UPDATE requests
        SET pickup_status='$new_status'
        WHERE request_id='$request_id'");

    }

}

header("Location: manage_requests.php");
exit();
?>