<?php

include 'db/connection.php';

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users(name,email,password,role)
            VALUES('$name','$email','$password','$role')";

    if(mysqli_query($conn,$sql)){

        echo "<script>
                alert('Registration Successful');
                window.location='login.php';
              </script>";
    }
    else{

        echo "<script>
                alert('Registration Failed');
              </script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<!-- Font Awesome -->
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
    width:450px;
    border:none;
    border-radius:20px;
}

</style>

</head>

<body>

<div class="card shadow-lg">

<div class="card-body p-5">

<h2 class="text-center text-success">

<i class="fa-solid fa-user-plus"></i>

</h2>

<h3 class="text-center text-success fw-bold">

Food Donation System

</h3>

<p class="text-center text-muted">

User Registration

</p>

<form method="POST">

<div class="mb-3">

<label class="form-label">

Full Name

</label>

<input
type="text"
name="name"
class="form-control"
placeholder="Enter your name"
required>

</div>

<div class="mb-3">

<label class="form-label">

Email

</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Enter your email"
required>

</div>

<div class="mb-3">

<label class="form-label">

Password

</label>

<input
type="password"
name="password"
class="form-control"
placeholder="Enter password"
required>

</div>

<div class="mb-4">

<label class="form-label">

Role

</label>

<select name="role"
class="form-select"
required>

<option value="">Select Role</option>

<option value="donor">

Donor

</option>

<option value="ngo">

NGO

</option>

</select>

</div>

<div class="d-grid">

<button
type="submit"
name="register"
class="btn btn-success">

Register

</button>

</div>

</form>

<hr>

<p class="text-center">

Already have an account?

<a href="login.php">

Login Here

</a>

</p>

</div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>