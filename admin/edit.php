<?php 

$database = mysqli_connect("localhost", "root", "", "desafilm");


// require_once('../config.php');
// $id = $_POST['id'];
// $title = $_POST['title'];
// $author = $_POST['author'];
// $category = $_POST['category'];
// $date = $_POST['date'];

// $query_edit = mysqli_query($database, "UPDATE video SET title='$title', author='$author', category='$category', date='$date'");

// if(!$query_edit){
//     echo "<script>alert('data gagal di edit'); history.go(-1);</script>";
// }else{
//     echo "<script>alert('data berhasil di uplode'); history.go(-1);</script>";
// }

if($_GET['edit']=='editData'){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $date = $_POST['date'];

    //query update
    $queryupdate = mysqli_query($database, "UPDATE video SET title='$title' , author='$author' , category='$category' , date='$date' WHERE id='$id' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location: admin_dashboard.php");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($database);
    }
}


?>