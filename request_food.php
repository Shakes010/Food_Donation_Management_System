<?php
session_start();
include 'db/connection.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role']!="ngo"){
    header("Location: login.php");
    exit();
}

$sql="SELECT donations.*,users.name
FROM donations
INNER JOIN users
ON donations.donor_id=users.id
WHERE donations.status='Available'
ORDER BY donation_id DESC";

$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Request Food</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="d-flex justify-content-between mb-3">

<h2>Available Donations</h2>

<a href="ngo_dashboard.php" class="btn btn-secondary">
Back
</a>

</div>

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>Food</th>
<th>Quantity</th>
<th>Expiry</th>
<th>Location</th>
<th>Donor</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['food_name']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td><?php echo $row['expiry_time']; ?></td>

<td><?php echo $row['location']; ?></td>

<td><?php echo $row['name']; ?></td>

<td>

<a href="send_request.php?id=<?php echo $row['donation_id']; ?>" class="btn btn-success btn-sm">

Request

</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</body>

</html>