<?php 
   if (isset($_GET['id'])) {
      $conn = mysqli_connect("localhost", "root", "", "desafilm");
      $id = $_GET['id'];
      $query = "DELETE FROM video WHERE id='$id'";
      mysqli_query($conn, $query);
      header("Location: admin_dashboard.php");
   }
?>