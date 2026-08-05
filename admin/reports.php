<?php
session_start();

include "../db/connection.php";

if(!isset($_SESSION['user_id']) || $_SESSION['role']!="admin"){
    header("Location: ../login.php");
    exit();
}

// Counts
$totalUsers = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM users"))['total'];

$totalDonors = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM users WHERE role='donor'"))['total'];

$totalNGOs = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM users WHERE role='ngo'"))['total'];

$totalDonations = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM donations"))['total'];

$totalRequests = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM requests"))['total'];

$available = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM donations WHERE status='Available'"))['total'];

$reserved = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM donations WHERE status='Reserved'"))['total'];

$completed = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM donations WHERE status='Completed'"))['total'];

$pending = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM requests WHERE request_status='Pending'"))['total'];

$approved = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM requests WHERE request_status='Approved'"))['total'];

$rejected = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM requests WHERE request_status='Rejected'"))['total'];

?>

<!DOCTYPE html>
<html>
<head>

<title>Reports</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.card{
    border:none;
    border-radius:15px;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="d-flex justify-content-between mb-4">

<h2 class="text-success">System Reports</h2>

<a href="admin_dashboard.php" class="btn btn-secondary">
Back
</a>

</div>

<div class="row">

<div class="col-md-3 mb-3">
<div class="card bg-primary text-white p-3">
<h5>Total Users</h5>
<h2><?php echo $totalUsers; ?></h2>
</div>
</div>

<div class="col-md-3 mb-3">
<div class="card bg-success text-white p-3">
<h5>Total Donors</h5>
<h2><?php echo $totalDonors; ?></h2>
</div>
</div>

<div class="col-md-3 mb-3">
<div class="card bg-info text-white p-3">
<h5>Total NGOs</h5>
<h2><?php echo $totalNGOs; ?></h2>
</div>
</div>

<div class="col-md-3 mb-3">
<div class="card bg-warning text-dark p-3">
<h5>Total Donations</h5>
<h2><?php echo $totalDonations; ?></h2>
</div>
</div>

<div class="col-md-3 mb-3">
<div class="card bg-danger text-white p-3">
<h5>Total Requests</h5>
<h2><?php echo $totalRequests; ?></h2>
</div>
</div>

<div class="col-md-3 mb-3">
<div class="card bg-success text-white p-3">
<h5>Available Food</h5>
<h2><?php echo $available; ?></h2>
</div>
</div>

<div class="col-md-3 mb-3">
<div class="card bg-warning text-dark p-3">
<h5>Reserved Food</h5>
<h2><?php echo $reserved; ?></h2>
</div>
</div>

<div class="col-md-3 mb-3">
<div class="card bg-secondary text-white p-3">
<h5>Completed</h5>
<h2><?php echo $completed; ?></h2>
</div>
</div>

<div class="col-md-4 mb-3">
<div class="card bg-warning text-dark p-3">
<h5>Pending Requests</h5>
<h2><?php echo $pending; ?></h2>
</div>
</div>

<div class="col-md-4 mb-3">
<div class="card bg-success text-white p-3">
<h5>Approved Requests</h5>
<h2><?php echo $approved; ?></h2>
</div>
</div>

<div class="col-md-4 mb-3">
<div class="card bg-danger text-white p-3">
<h5>Rejected Requests</h5>
<h2><?php echo $rejected; ?></h2>
</div>
</div>

</div>

</div>

</body>
</html>