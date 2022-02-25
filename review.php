<?php 
  require "admin/logic.php";
  connectDB();
  if (isset($_GET['id'])) {
      $conn = mysqli_connect("localhost", "root", "", "desafilm");
      $id = $_GET['id'];
      $query = "SELECT * FROM video WHERE id='$id'";
      mysqli_query($conn, $query);
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        
 <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
 <link rel="stylesheet" href="bower_components/bootstrap/dist/js/bootstrap.js">     
 <link rel="stylesheet" href="review.css">
 <link rel="stylesheet" href="bower_components/fontawesome/css/all.min.css">
 
</head>
<body style="background-color:  rgb(25, 29, 29);">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: rgb(22, 18, 18);">
        <a class="navbar-brand" href="index.php">Desa Film </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="home.html">Review <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">List Film</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 bg-dark text-light" type="text" placeholder="Cari film">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
      <?php 
     global $conn2;
     $id = $_GET['id'];
                $showdata = "SELECT * FROM video WHERE id='$id'";
                $result = mysqli_query($conn2, $showdata);
                while($row = mysqli_fetch_array($result)){
    ?>
     <div class="container-fluid text-center p-5">
      <h3 class="text-center text-light"><?php echo $row['title'] ?></h3>
      <div class="d-flex justify-content-around">
        <div class="text-light">
            <p>Category: <?php echo $row['category'] ?></p> 
        </div>
        <div class="text-light">
          <p>Publish: <?php echo $row['date'] ?></p> 
        </div>
      </div>
      <video src="admin/video/<?php echo $row['video']; ?>" height="800" autobuffer autoloop loop controls></video>
     </div>
     <div class="container">
       <div class="d-flex align-items-center justify-content-around">
         <div>
           <img src="admin/uploadsImage/<?php echo $row['thumbnails'] ?>" height="800" class="p-3" alt="">
         </div>
         <div class="align-self-centrer text-left">
           <h5 class="text-light">Title : <?php echo $row['title'] ?></h5>
           <h5 class="text-light">category : <?php echo $row['category'] ?></h5>
           <h5 class="text-light">Date Publish : <?php echo $row['date'] ?></h5>
           <h5 class="text-light">Publish Author : <?php echo $row['author'] ?></h5>
         </div>
       </div>
     </div>

<?php } ?>

<!-- 
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <img src="1055231.jpg" class=" justify-content-start mt-3 img-fluid"  style="height: auto;" alt="responsive image">
            </div>
            <div class="col-sm-6 mt-3" style="color: rgb(204, 178, 178);">
             <p class="lead text-justify">
                Animasi ini bercerita tentang dunia sihir. Dahulu kala, banyak sekali keajaiban dan banyak pula orang-orang memiliki kemampuan sihir. Namun seiring dengan perkembangan zaman, banyak hal telah berubah. Moda transportasi semakin canggih dan maju, pesawat salah satu terobosannya.

                Tidak hanya hal-hal publik, kegiatan setiap keluarga juga berbeda. Keluarga Lightfoot misalnya, kini Laurel Lightfoot sangat menyukai fitnes. Dia memiliki anak bernama Ian dan Barley. Suaminya telah meninggal beberapa tahun yang lalu. Walaupun tanpa ayah, mereka menjalani hidup dengan bahagia dan saling akrab satu sama lain.
                
                Hingga suatu hari, saat Ian yang merupakan anak kedua berumur 16 tahun, ibunya memberikan barang kepada Ian.
                
                “Aku punya hadiah dari ayah kalian,” kata Laurel kepada dua anaknya. “Dia hanya berkata untuk memberikan barang ini setelah kalian berusia 16 tahun lebih.”
                
                Dengan antusias mereka membuka hadiah itu. Saat dibuka, ternyata di dalamnya terdapat tongkat seperti tongkat sihir. Selain tongkat ada kertas berisi petunjuk. Dalam petunjuk tersebut terlihat cara pakai dan kegunaan tongkat. Secara singkatnya, dengan mengikuti petunjuk dalam kertas, tongkat itu bisa membawa sang ayah kembali hidup.
             </p>
            </div>
        </div>
        
        <div class="row mt-5 mb-4">
            <div class="col-sm-6">
               <p class="lead text-justify"  style="color: rgb(204, 178, 178);">
                Semua anggota keluarga terkejut dan segera melakukan instruksi. Sayangnya, kemunculan kembali badan sang ayah hanya sebatas kaki sampai pinggang, dari pinggang sampai kepala tidak muncul sama sekali. Setelah itu, mereka mengatahui cara untuk membuat ayahnya utuh secara badan. Mereka perlu melakukan perjalanan ke suatu tempat, solusi dari kejadian tersebut. Namun tentunya itu tidak mudah. Banyak halangan berupa makhluk sihir jahat atau tantangan dari sesama manusia. Selain Tom Holland (II), pengisi suara lain yang bergabung di antaranya Chris Pratt, Julia Louis-Dreyfus, Octavia Spencer, dan John Ratzenberger. Animasi yang berada dalam naungan studio produksi Pixar ini merupakan arahan sutradara Dan Scanlon. Selaian Onward, Dan Scanlon juga merupakan sutradara Monsters University (2013), Fremad (2020), Eteenpäin (2020), dan Framåt (2020).

                Baca selengkapnya di artikel "Sinopsis Onward, Film Animasi Tom Holland yang Rilis Hari Ini"
               </p>
            </div>
            <div class="col-sm-6">
                <img src="onwardwallpaper.jpg" class="img-fluid" alt="">
            </div>
        </div>
      
        <div class="container">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item mt-3" src="https://youtube.com/embed/gn5QmllRCn4" allowfullscreen=""></iframe>
        </div>
      </div>
    </div> -->


</body>
</html>

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        
 <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
 <link rel="stylesheet" href="bower_components/bootstrap/dist/js/bootstrap.js">     
 <link rel="stylesheet" href="review.css">
 <link rel="stylesheet" href="bower_components/fontawesome/css/all.min.css">
 
</head>
<body style="background-color:  rgb(25, 29, 29);">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: rgb(22, 18, 18);">
        <a class="navbar-brand" href="home.html">Desa Film </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="home.html">Review <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">List Film</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 bg-dark text-light" type="text" placeholder="Cari film">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container">
      <div class="row mt-3">
        <div class="col-sm-3">
          <img src="wp5722720-pixars-onward-wallpapers.jpg" class="img-fluid" height="400px" alt="">
        </div>

        <div class="col-sm-9">
          <div class="jumbotron mt-2 bg-dark text-light">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="display-5 font-weight-light mt-n4"><font style="font-family: 'Courier New', Courier, monospace;">Onward</font> (2019)</h1>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning" ></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star"> <font class="text-muted ml-1 font-weight-light ">12.981</font></i>    
                
                <hr class="bg-light">
              </div>
              <div class="col-sm-6">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://youtube.com/embed/gn5QmllRCn4" allowfullscreen="1"></iframe>
                </div>
              </div>
            </div>
           
          </div>
        </div>
    </div>
  </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <img src="1055231.jpg" class=" justify-content-start mt-3 img-fluid"  style="height: auto;" alt="responsive image">
            </div>
            <div class="col-sm-6 mt-3" style="color: rgb(204, 178, 178);">
             <p class="lead text-justify">
                Animasi ini bercerita tentang dunia sihir. Dahulu kala, banyak sekali keajaiban dan banyak pula orang-orang memiliki kemampuan sihir. Namun seiring dengan perkembangan zaman, banyak hal telah berubah. Moda transportasi semakin canggih dan maju, pesawat salah satu terobosannya.

                Tidak hanya hal-hal publik, kegiatan setiap keluarga juga berbeda. Keluarga Lightfoot misalnya, kini Laurel Lightfoot sangat menyukai fitnes. Dia memiliki anak bernama Ian dan Barley. Suaminya telah meninggal beberapa tahun yang lalu. Walaupun tanpa ayah, mereka menjalani hidup dengan bahagia dan saling akrab satu sama lain.
                
                Hingga suatu hari, saat Ian yang merupakan anak kedua berumur 16 tahun, ibunya memberikan barang kepada Ian.
                
                “Aku punya hadiah dari ayah kalian,” kata Laurel kepada dua anaknya. “Dia hanya berkata untuk memberikan barang ini setelah kalian berusia 16 tahun lebih.”
                
                Dengan antusias mereka membuka hadiah itu. Saat dibuka, ternyata di dalamnya terdapat tongkat seperti tongkat sihir. Selain tongkat ada kertas berisi petunjuk. Dalam petunjuk tersebut terlihat cara pakai dan kegunaan tongkat. Secara singkatnya, dengan mengikuti petunjuk dalam kertas, tongkat itu bisa membawa sang ayah kembali hidup.
             </p>
            </div>
        </div>
        
        <div class="row mt-5 mb-4">
            <div class="col-sm-6">
               <p class="lead text-justify"  style="color: rgb(204, 178, 178);">
                Semua anggota keluarga terkejut dan segera melakukan instruksi. Sayangnya, kemunculan kembali badan sang ayah hanya sebatas kaki sampai pinggang, dari pinggang sampai kepala tidak muncul sama sekali. Setelah itu, mereka mengatahui cara untuk membuat ayahnya utuh secara badan. Mereka perlu melakukan perjalanan ke suatu tempat, solusi dari kejadian tersebut. Namun tentunya itu tidak mudah. Banyak halangan berupa makhluk sihir jahat atau tantangan dari sesama manusia. Selain Tom Holland (II), pengisi suara lain yang bergabung di antaranya Chris Pratt, Julia Louis-Dreyfus, Octavia Spencer, dan John Ratzenberger. Animasi yang berada dalam naungan studio produksi Pixar ini merupakan arahan sutradara Dan Scanlon. Selaian Onward, Dan Scanlon juga merupakan sutradara Monsters University (2013), Fremad (2020), Eteenpäin (2020), dan Framåt (2020).

                Baca selengkapnya di artikel "Sinopsis Onward, Film Animasi Tom Holland yang Rilis Hari Ini"
               </p>
            </div>
            <div class="col-sm-6">
                <img src="onwardwallpaper.jpg" class="img-fluid" alt="">
            </div>
        </div>
      
        <div class="container">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item mt-3" src="https://youtube.com/embed/gn5QmllRCn4" allowfullscreen=""></iframe>
        </div>
      </div>
    </div>


</body>
</html> -->