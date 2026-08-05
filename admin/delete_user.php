<?php
session_start();

include '../db/connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != "admin") {
    header("Location: ../login.php");
    exit();
}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // Check the user's role
    $check = mysqli_query($conn, "SELECT role FROM users WHERE id='$id'");
    $user = mysqli_fetch_assoc($check);

    // Prevent deleting admin
    if($user && $user['role'] != "admin"){

        mysqli_query($conn, "DELETE FROM users WHERE id='$id'");

    }

}

header("Location: manage_users.php");
exit();
?>