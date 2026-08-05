<?php
session_start();
include '../db/connection.php';

// Check Admin Login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != "admin") {
    header("Location: ../login.php");
    exit();
}

// Count Donors
$donor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='donor'"))['total'];

// Count NGOs
$ngo = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='ngo'"))['total'];

// Count Donations
$donation = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM donations"))['total'];

// Count Requests
$request = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM requests"))['total'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
    background:#f4f6f9;
    overflow-x:hidden;
}

.sidebar{
    width:250px;
    height:100vh;
    position:fixed;
    background:#198754;
    color:white;
    padding-top:20px;
}

.sidebar h3{
    text-align:center;
    margin-bottom:30px;
}

.sidebar a{
    color:white;
    text-decoration:none;
    display:block;
    padding:15px 25px;
    font-size:17px;
}

.sidebar a:hover{
    background:#157347;
}

.main{
    margin-left:250px;
    padding:30px;
}

.card{
    border:none;
    border-radius:15px;
    transition:.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.icon{
    font-size:40px;
}

.quick-btn{
    height:120px;
    font-size:18px;
    font-weight:bold;
}

</style>

</head>

<body>

<!-- Sidebar -->

<div class="sidebar">

<h3>🍱 Admin Panel</h3>

<a href="admin_dashboard.php">
<i class="fas fa-home"></i> Dashboard
</a>

<a href="manage_users.php">
<i class="fas fa-users"></i> Manage Users
</a>

<a href="manage_ngos.php">
<i class="fas fa-building"></i> Manage NGOs
</a>

<a href="reports.php">
<i class="fas fa-chart-bar"></i> Reports
</a>

<a href="../logout.php">
<i class="fas fa-sign-out-alt"></i> Logout
</a>

</div>

<!-- Main Content -->

<div class="main">

<h2 class="mb-4">
Welcome, <?php echo $_SESSION['name']; ?> 👋
</h2>

<!-- Statistics -->

<div class="row">

<div class="col-md-3 mb-4">

<div class="card bg-primary text-white shadow">

<div class="card-body text-center">

<i class="fas fa-user icon"></i>

<h3><?php echo $donor; ?></h3>

<h5>Total Donors</h5>

</div>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="card bg-success text-white shadow">

<div class="card-body text-center">

<i class="fas fa-building icon"></i>

<h3><?php echo $ngo; ?></h3>

<h5>Total NGOs</h5>

</div>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="card bg-warning text-dark shadow">

<div class="card-body text-center">

<i class="fas fa-bowl-food icon"></i>

<h3><?php echo $donation; ?></h3>

<h5>Total Donations</h5>

</div>

</div>

</div>

<div class="col-md-3 mb-4">

<div class="card bg-danger text-white shadow">

<div class="card-body text-center">

<i class="fas fa-heart icon"></i>

<h3><?php echo $request; ?></h3>

<h5>Total Requests</h5>

</div>

</div>

</div>

</div>

<hr>

<h3 class="mb-4">Quick Actions</h3>

<div class="row">

<div class="col-md-4 mb-4">

<a href="manage_users.php" class="btn btn-success w-100 quick-btn">

<i class="fas fa-users fa-2x"></i>

<br><br>

Manage Users

</a>

</div>

<div class="col-md-4 mb-4">

<a href="manage_ngos.php" class="btn btn-primary w-100 quick-btn">

<i class="fas fa-building fa-2x"></i>

<br><br>

Manage NGOs

</a>

</div>

<div class="col-md-4 mb-4">

<a href="reports.php" class="btn btn-dark w-100 quick-btn">

<i class="fas fa-chart-line fa-2x"></i>

<br><br>

Reports

</a>

</div>

</div>

<hr>

<h3>System Information</h3>

<div class="card shadow">

<div class="card-body">

<ul>

<li>✔ Role-Based Login Implemented</li>

<li>✔ Donor Module Working</li>

<li>✔ NGO Module Working</li>

<li>✔ Admin Dashboard Active</li>

<li>✔ Reports Module Available</li>

<li>✔ MySQL Database Connected</li>

</ul>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>