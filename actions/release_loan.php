<?php
if (isset($_GET['id'])) {
	require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/functions/unique-id-generator.php";
	$ref_num = refNum8();

	$id = $_GET['id'];
	$loan_id = $_GET['loan_id'];

	$date = date('Y-m-d H:i:s');

	// Update the Status to Released
	$sql = "UPDATE loan_list SET status = 2 WHERE ref_no = $loan_id";
	$query = mysqli_query($conn, $sql);

	// GET the Details of the LOAN
	$sql2 = "SELECT * FROM loan_list WHERE ref_no = $loan_id";
	$query2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_assoc($query2);
	$borrower_id = $row2['borrower_id'];
	$loan_amount = $row2['amount'];
	$loan_plan = $row2['loan_plan'];

	// Get how many months is the selected PLAN of the loan
	$sql3 = "SELECT * FROM loan_plan WHERE id = $loan_plan";
	$query3 = mysqli_query($conn, $sql3);
	$row3 = mysqli_fetch_assoc($query3);
	$num_of_months = $row3['months'];
	$payment_frequency = $row3['payment_frequency'];

	//INSERT the current_due_order to loan_list. Insert the DUE DATES and DUE ORDER to loan_due_dates.  The number of DUE DATES inserted is based on the number of months the LOAN PLAN is.
	$due_order = 0;
	$currentDate = date('Y-m-d');

	// GENERATE DUE DATES, base on the Payment Frequency on Loan Plan

	#MONTHLY
	if ($payment_frequency == 1) {
		for ($i = 1; $i <= $num_of_months; $i++) {
		    $due_order = $due_order + 1;
		    $dueDate = date('Y-m-d', strtotime('+'.$i.' month', strtotime($currentDate)));
		    $sql4 = "INSERT INTO loan_due_dates (due_order, loan_ref_no, due_date) VALUES ('$due_order', '$loan_id', '$dueDate')";
		    $query4 = mysqli_query($conn, $sql4);
		}
	#EVERY 2 WEEKS
	} else if ($payment_frequency == 2) {
		for ($i = 1; $i <= ($num_of_months * 2); $i++) {
			$due_order = $due_order + 1;			
			$dueDate = date('Y-m-d', strtotime('+'.($i*15).' days', strtotime($currentDate)));
			$sql4 = "INSERT INTO loan_due_dates (due_order, loan_ref_no, due_date) VALUES ('$due_order', '$loan_id', '$dueDate')";
			$query4 = mysqli_query($conn, $sql4);
		}
	#WEEKLY
	} else if ($payment_frequency == 3) {
		for ($i = 1; $i <= ($num_of_months * 4); $i++) {
			$due_order = $due_order + 1;			
			$dueDate = date('Y-m-d', strtotime('+' . ($i * 7) . ' days', strtotime($currentDate)));
			$sql4 = "INSERT INTO loan_due_dates (due_order, loan_ref_no, due_date) VALUES ('$due_order', '$loan_id', '$dueDate')";
			$query4 = mysqli_query($conn, $sql4);
		}
	}

	//Query to check the current_due_order
	$sql6 = "SELECT * FROM loan_list WHERE ref_no = $loan_id";
	$query6 = mysqli_query($conn, $sql6);
	$row6 = mysqli_fetch_assoc($query6);

	//Check if the current_due_order is already set. If not, query the SQL below.
	if ($row6['current_due_order'] < 1) {

	// Insert the current month to current_due_order
	$sql5 = "UPDATE loan_list SET current_due_order = 1, date_released = '$date' WHERE ref_no = $loan_id";
	$query5 = mysqli_query($conn, $sql5);
	
	}

		// Check the last queries if successful
	if ($query AND $query4 AND $query5) {
		// Update loan_bank blance
		$sql7 = "UPDATE loan_bank SET amount = (amount - $loan_amount), last_updated = '$date'";
		$query7 = mysqli_query($conn, $sql7);
		if ($query7) {
			$sql8 = "INSERT INTO loan_history (member_id, ref_no, loan_id, credit, description, date) VALUES ('$borrower_id', '$ref_num', '$loan_id', '$loan_amount', 'Loan', '$date')";
			$query8 = mysqli_query($conn, $sql8);

			// Check the query if successful
			if ($query7) {
				header("Location: ../loans/index.php?page=loans&release=success");
				exit();
			} else {
				mysqli_query($conn, "UPDATE loan_bank SET amount = (amount + $loan_amount), last_updated = '$date'");
				header("Location: ../loans/index.php?page=loans&release=failed");
				exit();
			}
		} else {
			header("Location: ../loans/index.php?page=loans&release=failed");
			exit();
		}
	} else {
		mysqli_query($conn, "DELETE FROM loan_due_dates WHERE loan_ref_no = '$loan_id'");
		mysqli_query($conn, "UPDATE loan_list SET status = 2 WHERE ref_no = '$loan_id'");
		mysqli_query($conn, "UPDATE loan_list SET current_due_order = 0, date_released = NULL WHERE ref_no = '$loan_id'");
		header("Location: ../loans/index.php?page=loans&release=failed");
		exit();
	}		

	mysqli_close($conn);
} else {
	echo "Direct access is not allowed";
}
 ?>