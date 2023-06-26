<?php
	if (isset($_POST['submit'])) {
		require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

		$date = date('Y-m-d H:i:s');

		// Generate a unique reference number
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/functions/unique-id-generator.php"; // Include the generator
		$payment_ref_num = refNum8();

		// Check if the reference number already exists in the database
		$sql0 = "SELECT * FROM loan_payments WHERE payment_ref_no='$payment_ref_num';";
		$result0 = mysqli_query($conn, $sql0);
		while (mysqli_num_rows($result0) > 0) {
		  // If the reference number already exists, generate a new one
		  $payment_ref_num = refNum8();
		}

		$borrower = $_POST['loan-ref-no'];
		$parts = explode("-", $borrower); // The $borrower contains 2 values which are seperated with +. The expload() function separates its values to 2 different variables.

		$loan_ref_no = $parts[0];
		$payee = $parts[1];
		$amount = $_POST['amount'];
		$penalty = $_POST['penalty'];

		// Set overdue to 0 if pernalty is 0, and overdue is 1 if there is a penalty.
		if ($penalty >= 1) {
			$overdue = 1;
		} else {
			$overdue = 0;
		}
		

		$sql = "INSERT INTO loan_payments (payment_ref_no, loan_ref_no, payee, amount, penalty, overdue, date_created) VALUES ('$payment_ref_num', '$loan_ref_no', '$payee', '$amount','$penalty', '$overdue', '$date')";
		$query = mysqli_query($conn, $sql);

		if($query){
			$sql2 = "UPDATE loan_list SET current_due_order = (current_due_order + 1) WHERE ref_no = $loan_ref_no ";
			$query2 = mysqli_query($conn, $sql2);

			if($query2){		
				$sql3 = "UPDATE loan_bank SET amount = (amount + $amount), last_updated = '$date'";
				$query3 = mysqli_query($conn, $sql3);

				if($query3){
					$sql4 = "SELECT * FROM loan_list WHERE ref_no = '$borrower';";
					$query4 = mysqli_query($conn, $sql4);
					$row4 = mysqli_fetch_assoc($query4);
					$member_id = $row4['borrower_id'];
					$current_due_order = $row4['current_due_order'];
					$loan_plan = $row4['loan_plan'];

					$sql5 = "INSERT INTO loan_history (member_id, ref_no, loan_id, debit, description, date) VALUES ('$member_id', '$payment_ref_num','$loan_ref_no', '$amount', 'Payment', '$date')";
					$query5 = mysqli_query($conn, $sql5);
					if ($query5) {
						//  GET the DUE DATE COUNTS of the Loan
						$sql6 = "SELECT * FROM loan_plan WHERE id = $loan_plan";
						$query6 = mysqli_query($conn, $sql6);
						$row6 = mysqli_fetch_assoc($query6);
						$num_of_months = $row6['months'];
						$payment_freq = $row6['payment_frequency'];
						$due_date_counts = $num_of_months * $payment_freq; // Make the due dates twice a month

						// Change the Status to 3(Completed) if the currect due order is greater than the due counts.
						if ($current_due_order > $due_date_counts) {
							$sql7 = "UPDATE loan_list SET status = 3 WHERE ref_no = $loan_ref_no";
							$query7 = mysqli_query($conn, $sql7);
						}
						header("Location: ../loans/index.php?page=loans&payment=success");
						exit();
					} else {

						mysqli_query($conn, "UPDATE loan_bank SET amount = (amount - $amount), last_updated = '$date'");
						mysqli_query($conn, "UPDATE loan_list SET current_due_order = (current_due_order - 1) WHERE ref_no = $loan_ref_no ");
						mysqli_query($conn, "DELETE FROM loan_payments WHERE payment_ref_no = $payment_ref_num");
			   			header("Location: ../loans/index.php?page=loans&payment=failed");
			   			exit();
					}		
				} else {
					mysqli_query($conn, "UPDATE loan_list SET current_due_order = (current_due_order - 1) WHERE ref_no = $loan_ref_no ");
					mysqli_query($conn, "DELETE FROM loan_payments WHERE payment_ref_no = $payment_ref_num");
			   		header("Location: ../loans/index.php?page=loans&payment=failed");
			   		exit();
				}
			} else {
				mysqli_query($conn, "DELETE FROM loan_payments WHERE payment_ref_no = $payment_ref_num");
			   	header("Location: ../loans/index.php?page=loans&payment=failed");
			   	exit();
			}
		} else {
		   	header("Location: ../index.php?page=loans&payment=failed");
		   	exit();
		}
		mysqli_close($conn);
	}
 ?>