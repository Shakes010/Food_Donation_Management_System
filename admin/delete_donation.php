<?php
session_start();

include '../db/connection.php';

// Check if user is logged in as Admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != "admin") {
    header("Location: ../login.php");
    exit();
}

// Check if donation ID is provided
if (isset($_GET['id'])) {

    $donation_id = intval($_GET['id']);

    // Check if donation exists
    $check = mysqli_query($conn, "SELECT * FROM donations WHERE donation_id = '$donation_id'");

    if (mysqli_num_rows($check) > 0) {

        // Delete donation
        $delete = mysqli_query($conn, "DELETE FROM donations WHERE donation_id = '$donation_id'");

        if ($delete) {
            echo "<script>
                    alert('Donation deleted successfully.');
                    window.location='manage_donations.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error deleting donation.');
                    window.location='manage_donations.php';
                  </script>";
        }

    } else {

        echo "<script>
                alert('Donation not found.');
                window.location='manage_donations.php';
              </script>";
    }

} else {

    header("Location: manage_donations.php");
    exit();
}
?>