<?php 
include_once("../config.php");
$database = mysqli_connect("localhost", "root", "", "desafilm");

$id = $_GET['id'];

$query = "DELETE from video WHERE id=$id ";
$hasil = mysqli_query($database, $query);

if($hasil){
    header("Location: admin_dashboard.php");
}else{
    echo "gagal di hapus";
}

?>