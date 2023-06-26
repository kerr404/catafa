<?php 
	if (isset($_POST['submit'])) {
		require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/functions/unique-id-generator.php";

		$date = date('Y-m-d H:i:s');
		$id = $_POST['id'];
		$account_number = $_POST['account-number'];
		$amount_deposit = $_POST['deposit-amount'];

		// Generate a unique deposir reference number
		$deposit_ref_num = refNum8();

		// Check if the reference number already exists in the database
		$sql0 = "SELECT * FROM savings_deposit WHERE ref_no='$deposit_ref_num';";
		$result0 = mysqli_query($conn, $sql0);
		if (mysqli_num_rows($result0) > 0) {
		  // If the reference number already exists, generate a new one
		  $deposit_ref_num = refNum8();
		}

		// To check if the account number is present in the savings_account_list and to check what is the Account Holder ID of the Depositor
		$sql = "SELECT * FROM savings_account_list WHERE account_number = $account_number;";		
		$query = mysqli_query($conn, $sql);

		//Return if the Account Number doesn't exist
		if (mysqli_num_rows($query) == 0) {
			header("Location: ../savings/index.php?page=savings&error=invalid_account_number");
			exit();
		} else {
			$row = mysqli_fetch_assoc($query);
			$account_holder = $row['account_holder_id'];

			$sql2 = "INSERT INTO savings_deposit (ref_no, account_number, account_holder, deposit_amount, deposit_date) VALUES ('$deposit_ref_num', '$account_number', '$account_holder', '$amount_deposit', '$date')";
			$query2 = mysqli_query($conn, $sql2);

			// Check the query is successful. If yes, then update the current savings balance.
			if($query2){
				$sql3 = "UPDATE savings_account_list SET account_balance = (account_balance + $amount_deposit) WHERE account_number = $account_number";
				$query3 = mysqli_query($conn, $sql3);

				if ($query3) {
						$sql4 = "INSERT INTO savings_history (member_id, ref_no, account_number, debit, description, date) VALUES ('$account_holder', '$deposit_ref_num', '$account_number', '$amount_deposit', 'Balance Deposit', '$date')";
						$query4 = mysqli_query($conn, $sql4);

							// Check if the balance is successfully credited to account balane. If not, then undo the queries made.
							if($query4){
								$sql5 = "UPDATE savings_bank SET amount = (amount + $amount_deposit), last_updated =' $date'";
								$query5 = mysqli_query($conn, $sql5);

								if ($query5) {
									header("Location: ../savings/index.php?page=savings&deposit=success");
									exit();
								} else {
									mysqli_query($conn, "DELETE FROM savings_history WHERE ref_no = $deposit_ref_num");
									mysqli_query($conn, "UPDATE savings_account_list SET account_balance = (account_balance - $amount_deposit) WHERE account_number = $account_number");
									mysqli_query($conn, "DELETE FROM savings_deposit WHERE ref_no = $deposit_ref_num");
									header("Location: ../savings/index.php?page=savings&deposit=failed");
									exit();
								}	
							} else {
								mysqli_query($conn, "UPDATE savings_account_list SET account_balance = (account_balance - $amount_deposit) WHERE account_number = $account_number");
								mysqli_query($conn, "DELETE FROM savings_deposit WHERE ref_no = $deposit_ref_num");
							   	header("Location: ../savings/index.php?page=savings&deposit=failed");
							   	exit();
							}
					} else {
						mysqli_query($conn, "DELETE FROM savings_deposit WHERE ref_no = $deposit_ref_num");
						header("Location: ../savings/index.php?page=savings&deposit=failed");
						exit();
					}
				
			} else {
			   header("Location: ../savings/index.php?page=savings&deposit=failed");
			   exit();
			}
		}
		mysqli_close($conn);
	}
 ?>