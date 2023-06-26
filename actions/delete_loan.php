<?php
if (isset($_GET['id'])) {
	require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

	$id = $_GET['id'];
	$loan_ref_no = $_GET['loan_ref_no'];

	//Delete from Loan List
	$sql = "DELETE FROM loan_list WHERE id = $id";
	$query = mysqli_query($conn, $sql);

 	//Delete from Loan Payments history from loan_payments
	$sql2 = "DELETE FROM loan_payments WHERE loan_ref_no = $loan_ref_no";
	$query2 = mysqli_query($conn, $sql2);

	//Delete the due dates of the loan from loan_due_dates
	$sql3 = "DELETE FROM loan_due_dates WHERE loan_ref_no = $loan_ref_no";
	$query3 = mysqli_query($conn, $sql3);

		// Only check if the loan was removed from loan list.
		if ($query) {
			header("Location: ../loans/index.php?page=loans&delete=success");
			exit();
		} else {
			header("Location: ../loans/index.php?page=loans&delete=failed");
			exit();
		}
	mysqli_close($conn);
} else {
	echo "Direct access is not allowed";
}
 ?>