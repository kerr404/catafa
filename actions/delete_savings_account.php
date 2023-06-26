<?php
if (isset($_GET['id'])) {
	require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

	$id = $_GET['id'];
	$account_number = $_GET['account_number'];

	//Delete from Loan List
	$sql = "DELETE FROM savings_account_list WHERE id = $id";
	$query = mysqli_query($conn, $sql);

 	//Delete all of its deposits
	$sql2 = "DELETE FROM savings_deposit WHERE account_number = $account_number";
	$query2 = mysqli_query($conn, $sql2);

	//Delete all of its withdrawals
	$sql3 = "DELETE FROM savings_withdraw WHERE account_number = $account_number";
	$query3 = mysqli_query($conn, $sql3);

	//Delete all of its withdrawals
	$sql4 = "DELETE FROM savings_earnings_withdraw WHERE account_number = $account_number";
	$query4 = mysqli_query($conn, $sql4);

	//Delete all of its interest_earnings
	$sql5 = "DELETE FROM savings_interest_earnings WHERE account_number = $account_number";
	$query5 = mysqli_query($conn, $sql5);

		// Only check if the loan was removed from loan list.
		if ($query AND $query2 AND $query3 AND $query4 AND $query5) {
			header("Location: ../savings/index.php?page=savings&delete=success");
			exit();
		} else {
			header("Location: ../savings/index.php?page=savings&delete=failed");
			exit();
		}
	mysqli_close($conn);
} else {
	echo "Direct access is not allowed";
}
 ?>