<?php
session_start();

include 'db/connection.php';

// Check login
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != "donor"){
    header("Location: login.php");
    exit();
}

// Check request ID
if(!isset($_GET['id'])){
    header("Location: donor_requests.php");
    exit();
}

$request_id = $_GET['id'];

// Get the donation ID from the request
$sql = "SELECT donation_id FROM requests WHERE request_id='$request_id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);
    $donation_id = $row['donation_id'];

    // Update request status
    $update_request = "UPDATE requests
                       SET request_status='Approved'
                       WHERE request_id='$request_id'";

    mysqli_query($conn, $update_request);

    // Update donation status
    $update_donation = "UPDATE donations
                        SET status='Reserved'
                        WHERE donation_id='$donation_id'";

    mysqli_query($conn, $update_donation);

    echo "<script>
            alert('Request Approved Successfully!');
            window.location='donor_requests.php';
          </script>";

}
else{

    echo "<script>
            alert('Invalid Request!');
            window.location='donor_requests.php';
          </script>";
}
?>