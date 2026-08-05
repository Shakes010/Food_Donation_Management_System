<?php
session_start();
include 'db/connection.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != "donor"){
    header("Location: login.php");
    exit();
}

$donor_id = $_SESSION['user_id'];

$sql = "SELECT * FROM donations
        WHERE donor_id='$donor_id'
        ORDER BY donation_id DESC";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>My Donations</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="d-flex justify-content-between mb-3">

<h2>My Donations</h2>

<a href="donor_dashboard.php" class="btn btn-secondary">
Back
</a>

</div>

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>ID</th>
<th>Food</th>
<th>Quantity</th>
<th>Expiry</th>
<th>Location</th>
<th>Status</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['donation_id']; ?></td>

<td><?php echo $row['food_name']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td><?php echo $row['expiry_time']; ?></td>

<td><?php echo $row['location']; ?></td>

<td><?php echo $row['status']; ?></td>

</tr>

<?php

}

}else{

echo "<tr><td colspan='6' class='text-center'>No Donations Found</td></tr>";

}

?>

</tbody>

</table>

</div>

</body>
</html>