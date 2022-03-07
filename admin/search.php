<?php 
	if (isset($_POST['cari'])) {
		require_once 'logic.php';
		connectDB();

		$no = 1; 
		$search = $_POST['cari'];

		$query = mysqli_query($conn2, "SELECT * FROM video WHERE title LIKE '%" . $search . "%' ");
		while ($row = mysqli_fetch_object($query)) {
			
		}
	}
?>