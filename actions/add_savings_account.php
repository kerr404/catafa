<?php
	//Check if savings account already exists for this user
	if (isset($_POST['check'])) {
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
		$member_id = $_POST['member_id'];

		$check_sql = "SELECT * FROM savings_account_list WHERE account_holder_id = '$member_id'";
		$check_query = mysqli_query($conn, $check_sql);
		$check = mysqli_num_rows($check_query);

		if ($check > 0) {
			echo "success";
		} else {
			echo "failure";
		}


	}

	//Create savings account if the mwember doesn't have a current account
	if (isset($_POST['initial-deposit'])) {
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/functions/unique-id-generator.php";

		$date = date('Y-m-d H:i:s');
		$acount_holder_id = $_POST['account-holder'];
		$initial_deposit = $_POST['initial-deposit'];
		$account_number = refNum6();



		// Check if the account number already exists in the database
		$sql0 = "SELECT * FROM savings_account_list WHERE account_number='$account_number';";
		$result0 = mysqli_query($conn, $sql0);
		while (mysqli_num_rows($result0) > 0) {
		  // If the account number already exists, generate a new one
		  $account_number = refNum8();
		}

		$ref_number = refNum8();
		// Check if the reffernce number already exists in the database
		$sql00 = "SELECT * FROM savings_deposit WHERE ref_no='$ref_number';";
		$result00 = mysqli_query($conn, $sql00);
		while (mysqli_num_rows($result00) > 0) {
		  // If the refference number already exists, generate a new one
		  $ref_number = refNum8();
		}

		//Create SAVINGS account
		$sql = "INSERT INTO savings_account_list (account_holder_id, account_number, account_balance, date_created) VALUES ('$acount_holder_id', '$account_number','$initial_deposit', '$date')";
		$query = mysqli_query($conn, $sql);

		// Add the Initial Deposit, counted as First Deposit
		if ($query) {
			$sql1 = "INSERT INTO savings_deposit (ref_no, account_number, account_holder, deposit_amount, deposit_date) VALUES (' $ref_number', '$account_number', '$acount_holder_id', '$initial_deposit', '$date')";
				$query1 = mysqli_query($conn, $sql1);
			// ADD into Savings History
			if ($query1) {
				$sql2 = "INSERT INTO savings_history (member_id, ref_no, account_number, debit, description, date) VALUES ('$acount_holder_id','$ref_number', '$account_number', '$initial_deposit', 'Initial Deposit', '$date')";
				$query2 = mysqli_query($conn, $sql2);
				if ($query2) {
					$sql3 = "UPDATE savings_bank SET amount = (amount + $initial_deposit), last_updated = '$date' WHERE id = 1";
					$query3 = mysqli_query($conn, $sql3);
					if ($query3) {
						header("Location: ../savings/index.php?page=savings&register=success");
						exit();
					} else {
						// DELETE the Records from new savings_account_list, savings_deposit and savings_history if "UPDATE savings_bank" query is not successful.
						mysqli_query($conn, "DELETE FROM savings_account_list WHERE account_holder_id = '$account_holder_id' AND account_number = '$account_number'");
						mysqli_query($conn, "DELETE FROM savings_deposit WHERE ref_no = '$ref_number';");
						mysqli_query($conn, "DELETE FROM savings_history WHERE ref_no = '$ref_number';"); 
						header("Location: ../savings/index.php?page=savings&register=failed");
						exit();
					}
				} else {
					// DELETE the Records from new savings_account_list & savings_deposit if "INSERT INTO savings_history" query is not successful.
					mysqli_query($conn, "DELETE FROM savings_account_list WHERE account_holder_id = '$account_holder_id' AND account_number = '$account_number'");
					mysqli_query($conn, "DELETE FROM savings_deposit WHERE ref_no = '$ref_number';");
					header("Location: ../savings/index.php?page=savings&register=failed");
					exit();	
				}
				
			} else {
				// DELETE the Record from new savings_account_list if "INSERT INTO savings_deposit" query is not successful.
				mysqli_query($conn, "DELETE FROM savings_account_list WHERE account_holder_id = '$account_holder_id' AND account_number = '$account_number'");
				header("Location: ../savings/index.php?page=savings&register=failed");
				exit();	
			}
		} else {
			header("Location: ../savings/index.php?page=savings&register=failed");
			exit();
		}
		mysqli_close($conn);
	}
	
 ?>