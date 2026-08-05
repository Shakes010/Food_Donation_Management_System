<?php
session_start();

include '../db/connection.php';

// Check Admin Login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != "admin") {
    header("Location: ../login.php");
    exit();
}

// Show only Donors and NGOs
$sql = "SELECT * FROM users WHERE role != 'admin'";
$result = mysqli_query($conn, $sql);

$total_users = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Users</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
    background:#f4f6f9;
    font-family: Arial, sans-serif;
}

.sidebar{
    width:250px;
    height:100vh;
    background:#198754;
    position:fixed;
    color:white;
}

.sidebar h3{
    padding:20px;
    text-align:center;
    border-bottom:1px solid rgba(255,255,255,0.2);
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 20px;
    transition:0.3s;
}

.sidebar a:hover{
    background:#157347;
}

.content{
    margin-left:260px;
    padding:30px;
}

.card{
    border:none;
    border-radius:12px;
}

.table{
    background:white;
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

<a href="manage_donations.php">
<i class="fas fa-utensils"></i> Manage Donations
</a>

<a href="manage_requests.php">
<i class="fas fa-hand-holding-heart"></i> Manage Requests
</a>

<a href="reports.php">
<i class="fas fa-chart-bar"></i> Reports
</a>

<a href="../logout.php">
<i class="fas fa-sign-out-alt"></i> Logout
</a>

</div>

<!-- Content -->

<div class="content">

<div class="card shadow">

<div class="card-body">

<h2 class="mb-2">
<i class="fas fa-users text-success"></i>
Manage Users
</h2>

<p class="text-muted">
View and manage all registered Donors and NGOs.
</p>

<div class="row mb-3">

<div class="col-md-6">

<input
type="text"
id="searchInput"
class="form-control"
placeholder="Search by Name or Email...">

</div>

<div class="col-md-6 text-end">

<h5>

Total Users

<span class="badge bg-success">

<?php echo $total_users; ?>

</span>

</h5>

</div>

</div>

<div class="table-responsive">

<table class="table table-bordered table-hover align-middle">

<thead class="table-success">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Role</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td>

<?php

if($row['role']=="ngo"){

echo "<span class='badge bg-primary'>NGO</span>";

}
else{

echo "<span class='badge bg-success'>Donor</span>";

}

?>

</td>

<td>

<a
href="delete_user.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this user?');">

<i class="fas fa-trash"></i>

Delete

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</div>

<script>

document.getElementById("searchInput").addEventListener("keyup", function(){

let value = this.value.toLowerCase();

let rows = document.querySelectorAll("tbody tr");

rows.forEach(function(row){

row.style.display = row.innerText.toLowerCase().includes(value)

? ""

: "none";

});

});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>