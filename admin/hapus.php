<?php 
    $conn = mysqli_connect("localhost", "root", "", "desafilm");
    $id = "";
    $id = $_GET['id'];
    $query = "DELETE FROM video WHERE id='$id'";
    mysqli_query($conn, $query);
?>