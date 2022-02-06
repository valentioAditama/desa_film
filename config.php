<?php 
	$db_host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "desafilm";

	try{
		$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
	} catch(PDOException $e){
		die("terjadi maslaah pada: " . $e->getMessage());
	}

?>