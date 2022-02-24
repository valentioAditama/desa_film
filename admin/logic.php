<?php 
function connectDB(){
        global $conn;
        global $conn2;

        $conn2 = mysqli_connect("localhost", "root", "" , "desafilm");

        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=desafilm", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 

        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function register(){
    if(isset($_POST['register'])){
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        
        global $conn;
		$sql = "INSERT INTO users (username, name, password)
		VALUES (:username, :name, :password)";
		$stmt = $conn->prepare($sql);

		$params = array(
			":name" => $name,
			":username" => $username,
			":password" => $password
		);

		$saved = $stmt->execute($params);
		if($saved) header("Location: index.php");
	}
}

function login(){;
    if(isset($_POST['login'])){
        global $conn;
        global $name;
        
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
        $sql = "SELECT * FROM users WHERE username=:username OR name=:name";
        $stmt = $conn->prepare($sql);
    
        $params = array(
            ":username" => $username,
            ":name" => $name
        );
    
        $stmt->execute($params);
    
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if($user){
            if(password_verify($password, $user["password"])){
                session_start();
                $_SESSION['user'] = $user;
                header("Location: admin_dashboard.php");
            }
        }
    }
}

function auth(){
    session_start();
    if(!isset($_SESSION["user"])) header("Location: login.php");
}

function uplode(){
    if (isset($_POST['uplode'])) {

        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $date = $_POST['date']; 
        // $thumbnails = $_POST['thumbnails'];
        // $video = $_POST['video'];
        // 
        
        global $target_file;
        global $targetdir;

        $targetdir = "uploadsImage/";
        $target_file = basename($_FILES["thumbnails"]['name']);
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $ekstensionFIle = array("jpg", "jpeg", "png");
        $image = $_FILES["thumbnails"]["tmp_name"];

        $targetdirvideo = "video/";
        $target_filevideo = basename($_FILES["video"]['name']);
        $videoExt = strtolower(pathinfo($target_filevideo, PATHINFO_EXTENSION));
        $ekstensionFIlevideo = array("mkv", "mp4", "webm");
        $video = $_FILES["video"]["tmp_name"];

        if (move_uploaded_file($image, $targetdir.$target_file) == move_uploaded_file($video, $targetdirvideo.$target_filevideo)) {

                $sql = "INSERT INTO video (title, author, category, date, thumbnails, video) VALUES ('$title', '$author', '$category', '$date', '$target_file', '$target_filevideo')";
                global $conn2;
                $stmt = $conn2->prepare($sql);
                if ($stmt->execute()) {
                    $resMessage = array(
                        "status" => "alert-success",
                        "Message" => "image uplode successfully"
                    );
                }
            }else{
                $resMessage = array(
                "status" => "alert danger",
                "Message" => "image coudn't be uplode"
            );
        }   

        // if (!file_exists($_FILES["thumbnails"]["tmp_name"])) {
        //     $resMessage = array(
        //         "status" => "alert danger",
        //         "Message" => "select image to uplode"
        //     );
        // }else if (!in_array($imageExt, $ekstensionFIle)) {
        //     $resMessage = array(
        //         "status" => "alert danger",
        //         "Message" => "allowed format .jpg , .jpeg. png"
        //     );
        // }else if ($_FILES["thumbnails"]["size"] > 2097152) {
        //     $resMessage = array(
        //         "status" => "alert danger",
        //         "Message" => "size is to large"
        //     );
        // }else if (file_exists($target_file)) {
        //     $resMessage = array(
        //         "status" => "alert danger",
        //         "Message" => "file already exist"
        //     );
        // } else{
            
        // }
    }
}

function edit(){
    if (isset($_POST['edit'] )) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $date = $_POST['date'];
        $thumbnails = $_POST['thumbnails'];
        $video = $_POST['video'];

        global $conn2;
        
        $sql = "UPDATE video SET title='$title', author='$author', category='$category', date='$date', thumbnails='$thumbnails', video='$video' WHERE id=$id";       
        mysqli_query($conn2, $sql);
        header("location: admin_dashboard.php");
    }
}

function logout(){
    session_start();
    session_unset('user');
    header("Location: index.php");
}


// function review(){
//     if (isset($_GET)) {
//         $id = $_GET['id'];
//         $sql = "SELECT * FROM video WHERE id='$id' "
//         global $conn2;
//         $result = mysqli_query($conn2, $sql);
//     }
// }
?>