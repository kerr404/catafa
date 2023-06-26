<?php
	if (isset($_POST['submit'])) {
		require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

		$id = $_POST['id'];
		$plan_name = $_POST['plan-name'];
		$months = $_POST['months'];
		$interest = $_POST['interest'];
		$penalty = $_POST['penalty'];


		$sql = "UPDATE loan_plan SET plan_name = '$plan_name', months = '$months', interest_percentage = '$interest', penalty_rate = '$penalty' WHERE id = $id;";
		$query = mysqli_query($conn, $sql);

		if($query){
			header("Location: ../settings/index.php?page=loan-plans&edit=success");
			exit();
		} else {
		   header("Location: ../settings/index.php?page=loan-plans&edit=failed");
		   exit();
		}
		mysqli_close($conn);
	} 
 ?>