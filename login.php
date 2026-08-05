<?php

session_start();

include 'db/connection.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        // Store user details in session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];

        // Redirect based on role
        if($row['role'] == "admin"){

            header("Location: admin/admin_dashboard.php");

        }
        elseif($row['role'] == "ngo"){

            header("Location: ngo_dashboard.php");

        }
        elseif($row['role'] == "donor"){

            header("Location: donor_dashboard.php");

        }
        else{

            echo "<script>alert('Invalid User Role!');</script>";

        }

        exit();

    }
    else{

        echo "<script>alert('Invalid Email or Password');</script>";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
    background: linear-gradient(to right,#198754,#20c997);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    width:400px;
    border:none;
    border-radius:20px;
}

</style>

</head>

<body>

<div class="card shadow-lg">

<div class="card-body p-5">

<h2 class="text-center text-success mb-3">
<i class="fa-solid fa-bowl-food"></i>
</h2>

<h3 class="text-center text-success fw-bold">
Food Donation Management System
</h3>

<p class="text-center text-muted">
User Login
</p>

<form method="POST">

<div class="mb-3">

<label class="form-label">Email</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Enter your email"
required>

</div>

<div class="mb-4">

<label class="form-label">Password</label>

<input
type="password"
name="password"
class="form-control"
placeholder="Enter your password"
required>

</div>

<div class="d-grid">

<button
type="submit"
name="login"
class="btn btn-success">

Login

</button>

</div>

</form>

<hr>

<p class="text-center">
Don't have an account?
<a href="register.php">Register Here</a>
</p>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>