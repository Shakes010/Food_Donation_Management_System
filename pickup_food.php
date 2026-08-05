<?php
session_start();

include 'db/connection.php';

// Check login
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != "ngo"){
    header("Location: login.php");
    exit();
}

$ngo_id = $_SESSION['user_id'];

$sql = "SELECT
            requests.request_id,
            donations.food_name,
            donations.quantity,
            donations.location,
            requests.request_status,
            requests.pickup_status
        FROM requests
        INNER JOIN donations
        ON requests.donation_id = donations.donation_id
        WHERE requests.ngo_id='$ngo_id'
        AND requests.request_status='Approved'
        ORDER BY requests.request_id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pickup Food</title>

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

<div class="d-flex justify-content-between align-items-center mb-4">

<h2 class="text-success">
<i class="fa-solid fa-truck"></i>
Pickup Food
</h2>

<a href="ngo_dashboard.php" class="btn btn-secondary">
<i class="fa-solid fa-arrow-left"></i>
Back
</a>

</div>

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>Request ID</th>
<th>Food Name</th>
<th>Quantity</th>
<th>Location</th>
<th>Pickup Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['request_id']; ?></td>

<td><?php echo $row['food_name']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td><?php echo $row['location']; ?></td>

<td>

<?php

if($row['pickup_status']=="Pending"){
    echo "<span class='badge bg-warning text-dark'>Pending</span>";
}
else{
    echo "<span class='badge bg-success'>Picked</span>";
}

?>

</td>

<td>

<?php

if($row['pickup_status']=="Pending"){

?>

<a href="update_pickup.php?id=<?php echo $row['request_id']; ?>"
class="btn btn-success btn-sm">

Pickup

</a>

<?php

}
else{

?>

<span class="badge bg-primary">

Completed

</span>

<?php

}

?>

</td>

</tr>

<?php

}

}
else{

?>

<tr>

<td colspan="6" class="text-center text-danger">

No Approved Requests Found

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