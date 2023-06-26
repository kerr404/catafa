<?php
	if (isset($_POST['submit'])) {
		require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

		$id = $_POST['id'];
		$loan_plan = $_POST['loan-plan'];
		$loan_amount = $_POST['loan-amount'];
		$loan_comment = $_POST['loan-comment'];

		$sql2 = "SELECT * FROM loan_list WHERE id = '$id'";
		$query2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_assoc($query2);
		$status = $row2['status'];

		if ($status == 1) {
			$sql = "UPDATE loan_list SET loan_plan = '$loan_plan', amount = '$loan_amount', comment = '$loan_comment' WHERE id = '$id'";
			$query = mysqli_query($conn, $sql);
			if ($query) {
				header("Location: ../loans/index.php?page=loans&edit=success");
				exit();
			} else {
				header("Location: ../loans/index.php?page=loans&edit=failed");
				exit();
			}
		}

		if ($status == 2) {
			$sql = "UPDATE loan_list SET comment = '$loan_comment' WHERE id = '$id'";
			$query = mysqli_query($conn, $sql);
			if ($query) {
				header("Location: ../loans/index.php?page=loans&edit=success");
				exit();
			} else {
				header("Location: ../loans/index.php?page=loans&edit=failed");
				exit();
			}
		}
		
		mysqli_close($conn);
	}	
 ?>