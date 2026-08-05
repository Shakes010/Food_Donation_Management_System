<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        .hero{
            background: linear-gradient(rgba(0,0,0,0.5),
            rgba(0,0,0,0.5)),
            url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c');
            background-size: cover;
            background-position: center;
            height: 90vh;
            color: white;
            display: flex;
            align-items: center;
        }

        .feature-card{
            transition: 0.3s;
        }

        .feature-card:hover{
            transform: translateY(-10px);
        }

    </style>

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-success">

<div class="container">

<a class="navbar-brand fw-bold" href="#">

🍱 Food Donation System

</a>

<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarNav">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse"
id="navbarNav">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link active" href="index.php">
Home
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="register.php">
Register
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="login.php">
Login
</a>
</li>

</ul>

</div>

</div>

</nav>

<!-- Hero Section -->

<section class="hero">

<div class="container text-center">

<h1 class="display-3 fw-bold">

Food Donation Management System

</h1>

<p class="lead">

Connecting Surplus Food with Those in Need

</p>

<a href="register.php"
class="btn btn-success btn-lg">

Donate Now

</a>

</div>

</section>

<!-- Features Section -->

<section class="container my-5">

<h2 class="text-center text-success mb-5">

Our Features

</h2>

<div class="row">

<div class="col-md-4">

<div class="card shadow feature-card">

<div class="card-body text-center">

<i class="fa-solid fa-utensils fa-3x text-success"></i>

<h4 class="mt-3">

Donate Food

</h4>

<p>

Individuals and restaurants can donate surplus food.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow feature-card">

<div class="card-body text-center">

<i class="fa-solid fa-hand-holding-heart fa-3x text-success"></i>

<h4 class="mt-3">

NGO Support

</h4>

<p>

NGOs can request food and distribute it to people in need.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow feature-card">

<div class="card-body text-center">

<i class="fa-solid fa-earth-asia fa-3x text-success"></i>

<h4 class="mt-3">

Supports SDG Goals

</h4>

<p>

Helps achieve Zero Hunger and reduce food wastage.

</p>

</div>

</div>

</div>

</div>

</section>

<!-- SDG Goals Section -->

<section class="bg-light py-5">

<div class="container text-center">

<h2 class="text-success mb-4">

UN Sustainable Development Goals

</h2>

<div class="row">

<div class="col-md-6">

<div class="card shadow">

<div class="card-body">

<h3>

SDG 2

</h3>

<h5>

Zero Hunger

</h5>

</div>

</div>

</div>

<div class="col-md-6">

<div class="card shadow">

<div class="card-body">

<h3>

SDG 12

</h3>

<h5>

Responsible Consumption and Production

</h5>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- Footer -->

<footer class="bg-success text-white text-center p-3">

<p>

© 2026 Food Donation Management System

</p>

</footer>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>