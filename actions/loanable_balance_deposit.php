<?php 
	if (isset($_POST['submit'])) {
		require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/functions/unique-id-generator.php";

		$amount = $_POST['amount'];
		$description = $_POST['description'];
		$date = date('Y-m-d H:i:s');

		// Generate a unique deposir reference number
		$deposit_ref_num = refNum8();

		// Check if the reference number already exists in the database
		$sql0 = "SELECT * FROM savings_deposit WHERE ref_no='$deposit_ref_num';";
		$result0 = mysqli_query($conn, $sql0);
		if (mysqli_num_rows($result0) > 0) {
		  // If the reference number already exists, generate a new one
		  $deposit_ref_num = refNum8();
		}

		$sql = "INSERT INTO loan_bank_history (ref_no, debit, description, date) VALUES ('$deposit_ref_num', '$amount', '$description', '$date')";
		$query = mysqli_query($conn, $sql);

		if ($query) {
			$sql2 = "UPDATE loan_bank SET amount = (amount + '$amount'), last_updated = '$date' WHERE id = 1";
			$query2 = mysqli_query($conn, $sql2);

			if ($query2) {
				header("Location: ../loans/index.php?page=loan-bank&deposit=success");
				exit();
			} else {
				mysqli_query($conn, "DELETE FROM loan_bank_history WHERE ref_no = '$deposit_ref_num';");
				header("Location: ../loans/index.php?page=loan-bank&deposit=failed");
				exit();	
			}								
		} else {
			header("Location: ../loans/index.php?page=loan-bank&deposit=failed");
			exit();
		}

	mysqli_close($conn);	
	}	
 ?>