<?php
	if (isset($_POST['submit'])) {
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

		$plan_name = $_POST['plan-name'];
		$months = $_POST['months'];
		$interest = $_POST['interest'];
		$penalty = $_POST['penalty'];
		$payment_freq = $_POST['payment-freq'];
		$repayment_method = $_POST['repayment-method'];

		$sql = "INSERT INTO loan_plan (plan_name, months, interest_percentage, penalty_rate, payment_frequency, repayment_method) VALUES ('$plan_name', '$months', '$interest', '$penalty', '$payment_freq', '$repayment_method')";
		$query = mysqli_query($conn, $sql);

		if($query){
			header("Location: ../settings/index.php?page=loan-plans&add=success");
			exit();
		} else {
		   header("Location: ../settings/index.php?page=loan-plans&add=failed");
		   exit();
		}
		mysqli_close($conn);
	}

 ?>