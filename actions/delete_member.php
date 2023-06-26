<?php
	if (isset($_GET['id'])) {
		include "../includes/db_conn.php";

		$id = $_GET['id'];
		$sql = "DELETE FROM members WHERE id = $id";
		$query = mysqli_query($conn, $sql);

		if ($query) {
			header("Location: ../members/index.php?delete=success");
			exit();
		} else {
			header("Location: ../members/index.php?delete=failed");
			exit();
		}
		mysqli_close($conn);
	}
 ?>}
