<?php 
	$page_id = "analytics";  // Used to identify the current page to highlight the Navigation in the Sidebar if the current page is in the Analytics
	$page_title = "Analytics";
?>
<?php 
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/header.php";
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

	// Get the DATE RANGE
	$date_range_sql = "SELECT * FROM settings WHERE id = 1";
	$date_range_query = mysqli_query($conn, $date_range_sql);
	$date_range_row = mysqli_fetch_assoc($date_range_query);
	$start_date = $date_range_row['date_range_start'];
	$end_date = $date_range_row['date_range_end'];

	// MEMBER COUNT
	$sql = "SELECT * FROM members WHERE date_registered BETWEEN '$start_date' AND '$end_date' AND status = 1";
	$query = mysqli_query($conn, $sql);
	$member_count = mysqli_num_rows($query);

	// MEMBER CAMINGAWAN COUNT
	$sql_camingawan = "SELECT * FROM members WHERE (date_registered BETWEEN '$start_date' AND '$end_date') AND barangay = 'Camingawan' AND status = 1";
	$query_camingawan = mysqli_query($conn, $sql_camingawan);
	$member_count_camingawan = mysqli_num_rows($query_camingawan);

	// MEMBER TAGUKON COUNT
	$sql_tagukon = "SELECT * FROM members WHERE (date_registered BETWEEN '$start_date' AND '$end_date') AND barangay = 'Tagukon' AND status = 1";
	$query_tagukon = mysqli_query($conn, $sql_tagukon);
	$member_count_tagukon = mysqli_num_rows($query_tagukon);
	
	// PENDING MEMBERS COUNT
	$sql_pending = "SELECT * FROM members WHERE status = 0";
	$query_pending = mysqli_query($conn, $sql_pending);
	$member_count_pending = mysqli_num_rows($query_pending);

	// LOAN COUNT
	$sql2 = "SELECT * FROM loan_list WHERE date_released BETWEEN '$start_date' AND '$end_date'";
	$query2 = mysqli_query($conn, $sql2);
	$loan_count = mysqli_num_rows($query2);

	// SAVINGS COUNT
	$sql3 = "SELECT * FROM savings_account_list WHERE date_created BETWEEN '$start_date' AND '$end_date'";
	$query3 = mysqli_query($conn, $sql3);
	$row3 = mysqli_fetch_assoc($query3);
	$savings_count = mysqli_num_rows($query3);

	// GET the SUM over all savings account balances
	$sql5 = "SELECT sum(account_balance) as savings_sum FROM savings_account_list WHERE date_created BETWEEN '$start_date' AND '$end_date'";
	$query5 = mysqli_query($conn, $sql5);
	$row5 = mysqli_fetch_assoc($query5);
	$total_savings_balance = $row5['savings_sum'];

	// GET the SUM of all the Loans
	$sql6 = "SELECT sum(amount) as loans_sum FROM loan_list WHERE date_released BETWEEN '$start_date' AND '$end_date'";
	$query6 = mysqli_query($conn, $sql6);
	$row6 = mysqli_fetch_assoc($query6);
	$total_loan_balance = $row6['loans_sum'];

	// GET the SUM of all the Loan Payments
	$sql7 = "SELECT sum(amount) as loan_payments_sum FROM loan_payments WHERE date_created BETWEEN '$start_date' AND '$end_date'";
	$query7 = mysqli_query($conn, $sql7);
	$row7 = mysqli_fetch_assoc($query7);
	$loan_payments_sum = $row7['loan_payments_sum'];

	// GET the SUM of all savings deposits
	$sql8 = "SELECT sum(deposit_amount) as savings_deposit_sum FROM savings_deposit WHERE deposit_date BETWEEN '$start_date' AND '$end_date'";
	$query8 = mysqli_query($conn, $sql8);
	$row8 = mysqli_fetch_assoc($query8);
	$savings_deposit_sum = $row8['savings_deposit_sum'];

	// GET the SUM of all savings withdraw
	$sql9 = "SELECT sum(withdraw_amount) as savings_withdraw_sum FROM savings_withdraw WHERE withdraw_date BETWEEN '$start_date' AND '$end_date'";
	$query9 = mysqli_query($conn, $sql9);
	$row9 = mysqli_fetch_assoc($query9);
	$savings_withdraw_sum = $row9['savings_withdraw_sum'];

	// GET the Loanable Balance
	$sql10 = "SELECT * FROM loan_bank WHERE id = 1";
	$query10 = mysqli_query($conn, $sql10);
	$row10 = mysqli_fetch_assoc($query10);
	$loanable_balance = $row10['amount'];


?>
<!--------------------------ANALYTICS NAVIGATION--------------------------------->

<div class="w-100 p-3 bg-light">
	<?php 
		if (!isset($_GET['page'])) {
			include "loans-analytics.php";
		}
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			include $page.".php";
		}
	 ?>
</div>


<?php 
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/footer.php";
?>