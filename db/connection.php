<?php

$conn = mysqli_connect("localhost", "root", "", "food_donation_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>