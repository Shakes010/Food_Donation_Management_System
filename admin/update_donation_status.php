<?php
session_start();

include '../db/connection.php';

// Check Admin Login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != "admin") {
    header("Location: ../login.php");
    exit();
}

// Check if donation ID is provided
if (isset($_GET['id'])) {

    $donation_id = intval($_GET['id']);

    // Get current donation status
    $sql = "SELECT status FROM donations WHERE donation_id = '$donation_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        // Toggle status
        if ($row['status'] == "Available") {
            $new_status = "Collected";
        } else {
            $new_status = "Available";
        }

        // Update status
        $update = "UPDATE donations
                   SET status='$new_status'
                   WHERE donation_id='$donation_id'";

        mysqli_query($conn, $update);

    }

}

// Redirect back
header("Location: manage_donations.php");
exit();
?>