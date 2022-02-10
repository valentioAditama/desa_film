<?php 
include_once '../config.php';
if(isset($_POST['Uplode'])){
    $title = ['title'];
    $author = ['author'];
    $category = ['category'];
    $date = ['date'];
    $thumbnails = ['thumbnails'];
    $video = ['video'];

    $sql = "INSERT INTO video (title, author, category, date, thumbnails, video) VALUES ($title, $author, $category, $date, $thumbnails, $video)";
    $insertData = $sql->prepare($sql);
    if($insertData)
    mysqli_close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Uplode Data</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Uplode Data</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="input" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Author</label>
                <input type="input" class="form-control" id="author" name="author">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category</label>
                <input type="input" class="form-control" id="category" name="category">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">thumbnails</label>
                <input type="file" class="form-control" id="thumbnails" name="thumbnails">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">video</label>
                <input type="file" class="form-control" id="video" name="video">
            </div>
            <button type="submit" class="btn btn-success container" name="uplode" id="uplode">Uplode</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>