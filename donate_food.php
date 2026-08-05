<?php

session_start();

include 'db/connection.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}

if(isset($_POST['donate'])){

    $food_name = $_POST['food_name'];
    $quantity = $_POST['quantity'];
    $expiry_time = $_POST['expiry_time'];
    $location = $_POST['location'];

    $donor_id = $_SESSION['user_id'];

    $status = "Available";

    $sql = "INSERT INTO donations
    (food_name, quantity, expiry_time, location, donor_id, status)

    VALUES

    ('$food_name','$quantity','$expiry_time','$location','$donor_id','$status')";

    mysqli_query($conn,$sql);

    echo "<script>alert('Food Donation Added Successfully');</script>";
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Donate Food</title>

    <style>

        body{
            font-family: Arial;
            background-color: #f4f4f4;
            text-align: center;
            margin-top: 50px;
        }

        form{
            background: white;
            width: 350px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
        }

        h2{
            color: green;
        }

        input{
            width: 90%;
            padding: 10px;
            margin: 10px;
        }

        button{
            background: green;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover{
            background: darkgreen;
        }

    </style>

</head>

<body>

<h2>Donate Food</h2>

<form method="POST">

    <input type="text"
    name="food_name"
    placeholder="Food Name"
    required>

    <br>

    <input type="text"
    name="quantity"
    placeholder="Quantity"
    required>

    <br>

    <input type="datetime-local"
    name="expiry_time"
    required>

    <br>

    <input type="text"
    name="location"
    placeholder="Pickup Location"
    required>

    <br>

    <button type="submit" name="donate">

        Donate Food

    </button>

</form>

</body>
</html>