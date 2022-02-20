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
    if(isset($_POST['uplode'])){
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $date = $_POST['date']; 
        $thumbnails = $_POST['thumbnails'];
        $video = $_POST['video'];
        
        global $conn2;

        $sql = "INSERT INTO video (title, author, category, date , thumbnails, video) VALUES ('$title', '$author', '$category', '$date', '$thumbnails', '$video')";
        
        mysqli_query($conn2, $sql);
        header("Location: admin_dashboard.php");
    }
}

function edit(){
    if (isset($_GET['id'])) {
        $title = $_GET['title'];
        $author = $_GET['author'];
        $category = $_GET['category'];
        $date = $_GET['date'];
        $thumbnails = $_GET['thumbnails'];
        $video = $_GET['video'];
        
        global $conn2;

        $sql = "INSERT INTO video (title, author, category, date , thumbnails, video) VALUES ('$title', '$author', '$category', '$date', '$thumbnails', '$video')";
        global $result2;
        $result2 = mysqli_query($conn2, $sql);
        header("Location: admin_dashboard.php");
    }
}

function logout(){
    session_start();
    session_unset('user');
    header("Location: index.php");
}

?>