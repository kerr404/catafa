<?php
if (isset($_POST['balanceCheck'])) {
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
	$amount = $_POST['amount'];

	$check_sql = "SELECT * FROM loan_bank WHERE id = 1";
	$check_query = mysqli_query($conn, $check_sql);
	$check_row = mysqli_fetch_assoc($check_query);
	$balance = $check_row['amount'];

	if ($balance < $amount) {
		echo "success";
	} else {
		echo "failure";
	}

}


	if (isset($_POST['description'])) {
		require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/functions/unique-id-generator.php";

		$amount = $_POST['amount'];
		$description = $_POST['description'];
		$date = date('Y-m-d H:i:s');

		// Generate a unique deposir reference number
		$withdraw_ref_num = refNum8();

		// Check if the reference number already exists in the database
		$sql0 = "SELECT * FROM loan_history WHERE ref_no='$withdraw_ref_num';";
		$result0 = mysqli_query($conn, $sql0);
		if (mysqli_num_rows($result0) > 0) {
		  // If the reference number already exists, generate a new one
		  $withdraw_ref_num = refNum8();
		}

		$sql = "INSERT INTO loan_bank_history (ref_no, credit, description, date) VALUES ('$withdraw_ref_num', '$amount', '$description', '$date')";
		$query = mysqli_query($conn, $sql);

		if ($query) {
			$sql2 = "UPDATE loan_bank SET amount = (amount - '$amount'), last_updated = '$date' WHERE id = 1";
			$query2 = mysqli_query($conn, $sql2);

			if ($query2) {
				header("Location: ../loans/index.php?page=loan-bank&withdraw=success");
				exit();
			} else {
				mysqli_query($conn, "DELETE FROM loan_bank_history WHERE ref_no = '$withdraw_ref_num';");
				header("Location: ../loans/index.php?page=loan-bank&withdraw=failed");
				exit();	
			}								
		} else {
			header("Location: ../loans/index.php?page=loan-bank&withdraw=failed");
			exit();
		}

	mysqli_close($conn);	
	}	
 ?>