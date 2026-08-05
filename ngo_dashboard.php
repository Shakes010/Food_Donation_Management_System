<?php
session_start();

// Check login
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// Allow only NGO
if($_SESSION['role'] != "ngo"){
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

<title>NGO Dashboard</title>

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

<!-- Welcome -->

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

Thank you for helping distribute donated food to people in need.

</p>

</div>

<!-- Dashboard Cards -->

<div class="row mt-5">

<!-- Request Food -->

<div class="col-md-4 mb-4">

<div class="card shadow-lg text-center p-4 h-100">

<i class="fa-solid fa-hand-holding-heart icon"></i>

<h3 class="mt-4">

Request Food

</h3>

<p>

View available food donations and send a request.

</p>

<a href="request_food.php" class="btn btn-success">

Request Food

</a>

</div>

</div>

<!-- My Requests -->

<div class="col-md-4 mb-4">

<div class="card shadow-lg text-center p-4 h-100">

<i class="fa-solid fa-list-check icon"></i>

<h3 class="mt-4">

My Requests

</h3>

<p>

View all food requests submitted by your NGO.

</p>

<a href="my_requests.php" class="btn btn-primary">

My Requests

</a>

</div>

</div>

<!-- Pickup Food -->

<div class="col-md-4 mb-4">

<div class="card shadow-lg text-center p-4 h-100">

<i class="fa-solid fa-truck icon"></i>

<h3 class="mt-4">

Pickup Food

</h3>

<p>

View approved requests and mark food as picked up.

</p>

<a href="pickup_food.php" class="btn btn-warning">

Pickup Food

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