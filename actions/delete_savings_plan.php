<?php
	if (isset($_GET['id'])) {
		require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

		$id = $_GET['id'];
		$sql = "DELETE FROM savings_plan WHERE id = $id";
		$query = mysqli_query($conn, $sql);

		if($query){
			header("Location: ../settings/index.php?page=savings-plans&delete=success");
			exit();
		} else {
		   	header("Location: ../settings/index.php?page=savings-plans&delete=failed");
			   exit();
		}
		mysqli_close($conn);
	}
	
 ?>