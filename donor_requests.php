<?php
session_start();

include 'db/connection.php';

// Check login
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

// Allow only donors
if($_SESSION['role'] != "donor"){
    header("Location: login.php");
    exit();
}

$donor_id = $_SESSION['user_id'];

$sql = "SELECT requests.request_id,
               requests.request_status,
               requests.pickup_status,
               donations.food_name,
               donations.quantity,
               users.name AS ngo_name
        FROM requests
        INNER JOIN donations
            ON requests.donation_id = donations.donation_id
        INNER JOIN users
            ON requests.ngo_id = users.id
        WHERE donations.donor_id = '$donor_id'
        ORDER BY requests.request_id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>NGO Requests</title>

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
<i class="fas fa-handshake"></i>
NGO Requests
</h2>

<a href="donor_dashboard.php" class="btn btn-secondary">
<i class="fas fa-arrow-left"></i>
Back
</a>

</div>

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>Request ID</th>
<th>NGO Name</th>
<th>Food</th>
<th>Quantity</th>
<th>Request Status</th>
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

<td><?php echo $row['ngo_name']; ?></td>

<td><?php echo $row['food_name']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td>

<?php

if($row['request_status']=="Pending"){
    echo "<span class='badge bg-warning text-dark'>Pending</span>";
}
elseif($row['request_status']=="Approved"){
    echo "<span class='badge bg-success'>Approved</span>";
}
else{
    echo "<span class='badge bg-danger'>Rejected</span>";
}

?>

</td>

<td>

<?php

if($row['pickup_status']=="Picked"){
    echo "<span class='badge bg-primary'>Picked</span>";
}
else{
    echo "<span class='badge bg-secondary'>Pending</span>";
}

?>

</td>

<td>

<?php

if($row['request_status']=="Pending"){

?>

<a href="approve_request.php?id=<?php echo $row['request_id']; ?>" class="btn btn-success btn-sm">

Approve

</a>

<a href="reject_request.php?id=<?php echo $row['request_id']; ?>" class="btn btn-danger btn-sm">

Reject

</a>

<?php

}
else{

echo "-";

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

<td colspan="7" class="text-center text-danger">

No Requests Found

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