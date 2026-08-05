<?php

include 'db/connection.php';

if(isset($_GET['id'])){

    $request_id = $_GET['id'];

    $sql = "UPDATE requests
            SET pickup_status='Picked'
            WHERE request_id='$request_id'";

    if(mysqli_query($conn, $sql)){
        header("Location: admin/manage_requests.php");
        exit();
    }else{
        echo "Error updating status!";
    }

}else{
    echo "Invalid Request!";
}
?>