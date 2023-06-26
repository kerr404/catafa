<?php 
	if (isset($_GET['id'])) {
		require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
		$id = $_GET['id'];

		$sql = "UPDATE members SET status = 1 WHERE id = $id";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			header("Location: ../members/index.php?approve=success");
			exit();
		} else {
			header("Location: ../members/index.php?approve=failed");
			exit();
		}

		mysqli_close($conn);
	}
 ?>