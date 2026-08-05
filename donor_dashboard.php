<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// Allow only donors
if($_SESSION['role'] != "donor"){
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];
$role = ucfirst($_SESSION['role']);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Donor Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
    background:#f5f7fa;
}

.navbar{
    background:#198754;
}

.hero{
    background:linear-gradient(135deg,#198754,#20c997);
    color:white;
    padding:40px;
    border-radius:15px;
    margin-top:30px;
}

.card{
    border:none;
    border-radius:15px;
    transition:.3s;
}

.card:hover{
    transform:translateY(-8px);
}

.icon{
    font-size:60px;
    color:#198754;
}

.status{
    display:inline-block;
    background:#d4edda;
    color:#155724;
    padding:6px 15px;
    border-radius:20px;
    font-weight:bold;
}

.footer{
    text-align:center;
    margin-top:60px;
    color:gray;
}

</style>

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark">

<div class="container">

<a class="navbar-brand fw-bold" href="#">
🍱 Food Donation System
</a>

<div class="ms-auto">

<a href="logout.php" class="btn btn-light">

<i class="fa-solid fa-right-from-bracket"></i>

Logout

</a>

</div>

</div>

</nav>

<!-- Main Container -->

<div class="container">

<!-- Welcome Section -->

<div class="hero shadow">

<h2>

Welcome, <?php echo $name; ?> 👋

</h2>

<h5>

Role : <?php echo $role; ?>

</h5>

<br>

<span class="status">

🟢 Active

</span>

<p class="mt-4">

Thank you for contributing towards reducing food waste and supporting SDG 2 (Zero Hunger) and SDG 12 (Responsible Consumption and Production).

</p>

</div>

<!-- Dashboard Cards -->

<div class="row mt-5">

<!-- Donate Food -->

<div class="col-md-4 mb-4">

<div class="card shadow-lg text-center p-4 h-100">

<i class="fa-solid fa-bowl-food icon"></i>

<h3 class="mt-4">

Donate Food

</h3>

<p>

Add surplus food so it can reach people in need.

</p>

<a href="donate_food.php" class="btn btn-success">

<i class="fa-solid fa-plus"></i>

Donate Now

</a>

</div>

</div>

<!-- My Donations -->

<div class="col-md-4 mb-4">

<div class="card shadow-lg text-center p-4 h-100">

<i class="fa-solid fa-list-check icon"></i>

<h3 class="mt-4">

My Donations

</h3>

<p>

View and manage all your food donations.

</p>

<a href="my_donations.php" class="btn btn-primary">

<i class="fa-solid fa-eye"></i>

View Donations

</a>

</div>

</div>

<!-- NGO Requests -->

<div class="col-md-4 mb-4">

<div class="card shadow-lg text-center p-4 h-100">

<i class="fa-solid fa-handshake icon"></i>

<h3 class="mt-4">

NGO Requests

</h3>

<p>

Approve or reject requests received from NGOs.

</p>

<a href="donor_requests.php" class="btn btn-warning">

<i class="fa-solid fa-list"></i>

View Requests

</a>

</div>

</div>

</div>

<!-- Footer -->

<div class="footer">

<hr>

<p>

© 2026 Food Donation Management System

<br>

Developed using HTML, CSS, Bootstrap, PHP & MySQL

</p>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>