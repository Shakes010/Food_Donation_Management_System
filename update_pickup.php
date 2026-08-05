<?php
session_start();

include 'db/connection.php';

// Check login
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != "ngo"){
    header("Location: login.php");
    exit();
}

// Check request ID
if(!isset($_GET['id'])){
    header("Location: pickup_food.php");
    exit();
}

$request_id = $_GET['id'];

// Get donation ID
$sql = "SELECT donation_id FROM requests WHERE request_id='$request_id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);
    $donation_id = $row['donation_id'];

    // Update pickup status
    mysqli_query($conn,
    "UPDATE requests
     SET pickup_status='Picked'
     WHERE request_id='$request_id'");

    // Update donation status
    mysqli_query($conn,
    "UPDATE donations
     SET status='Completed'
     WHERE donation_id='$donation_id'");

    echo "<script>
            alert('Food Picked Up Successfully!');
            window.location='pickup_food.php';
          </script>";

}else{

    echo "<script>
            alert('Invalid Request!');
            window.location='pickup_food.php';
          </script>";

}
?>