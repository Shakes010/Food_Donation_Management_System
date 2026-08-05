<?php
session_start();
include '../db/connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != "admin") {
    header("Location: ../login.php");
    exit();
}

$sql = "SELECT * FROM users WHERE role='ngo'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage NGOs</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
    background:#f4f6f9;
}

.container{
    margin-top:40px;
}

.card{
    border:none;
    border-radius:15px;
}

</style>

</head>

<body>

<div class="container">

<div class="d-flex justify-content-between mb-4">

<h2 class="text-success">
<i class="fas fa-building"></i>
Manage NGOs
</h2>

<a href="admin_dashboard.php" class="btn btn-secondary">
<i class="fas fa-arrow-left"></i>
Back
</a>

</div>

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td>
<span class="badge bg-success">
<?php echo ucfirst($row['role']); ?>
</span>
</td>

</tr>

<?php
}

}else{
?>

<tr>

<td colspan="4" class="text-center">

No NGOs Found

</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</div>

</div>

</body>

</html>