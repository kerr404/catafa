<?php
if (isset($_POST['submit'])) {
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

	$plan_name = $_POST['plan-name'];
	$interest = $_POST['interest'];
	$crediting_freq = $_POST['crediting-freq'];

	$date1 = new DateTime();
	$current_month = date('m');
	$current_day = date('d');


	//Check the crediting frequency monthly(1)
	if ($crediting_freq == 1) {
		$crediting_day_1 = intval($_POST['crediting-day-1-monthly']);

		//set the last_crediting_date to current month 
		if ($current_day >= $crediting_day_1) {
			$date1->setDate($date1->format('Y'), $date1->format('m'), $crediting_day_1); // setDate(year, month, day);
			$new_last_crediting_date = $date1->format('Y-m-d');
		}

		//set the last_crediting_date to current minus 1 month 
		else if ($current_day < $crediting_day_1) {

			//Check if the current month is january(1)
			if ($current_month == 1) {
				$date1->setDate($date1->format('Y') - 1, 12, $crediting_day_1); // setDate(year, month, day);
				$new_last_crediting_date = $date1->format('Y-m-d');
			}
			else {
				$date1->setDate($date1->format('Y'), $date1->format('m'), $crediting_day_1); // setDate(year, month, day);
				$date1->modify('-1 month');
				$new_last_crediting_date = $date1->format('Y-m-d');
			}
		}
	}


	//If the crediting frequency Biweekly(2)
	else if ($crediting_freq == 2){	
		$crediting_day_1 = intval($_POST['crediting-day-1-weekly']);
		$crediting_day_2 = intval($_POST['crediting-day-2-weekly']);

		//set the last_crediting_date to day 1 of current month 
		if ($current_day >= $crediting_day_1 AND $current_day < $crediting_day_2){
			$date1->setDate($date1->format('Y'), $date1->format('m'), $crediting_day_1);
			$new_last_crediting_date = $date1->format('Y-m-d');
		}

		//set the last_crediting_date to day 2 of previous month 
		else if ($current_day < $crediting_day_1){

			//Check if the current month is january(1)
			if ($current_month == 1) {
				$date1->setDate($date1->format('Y') - 1, 12, $crediting_day_2);
				$new_last_crediting_date = $date1->format('Y-m-d');
			} else {
				$date1->setDate($date1->format('Y'), $date1->format('m'), $crediting_day_2);
				$date1->modify('-1 month');
				$new_last_crediting_date = $date1->format('Y-m-d');
			}
		}

		//set the last_crediting_date to day 2 of current month 
		else if ($current_day > $crediting_day_1) {
			$date1->setDate($date1->format('Y'), $date1->format('m'), $crediting_day_2);
			$new_last_crediting_date = $date1->format('Y-m-d');
		}
	}



	$sql = "INSERT INTO savings_plan (plan_name, interest_percentage, interest_crediting_freq, crediting_day_1, crediting_day_2, last_interest_crediting_date) VALUES ('$plan_name', '$interest', '$crediting_freq', '$crediting_day_1', '$crediting_day_2', '$new_last_crediting_date')";
	$query = mysqli_query($conn, $sql);

	if($query){
		header("Location: ../settings/index.php?page=savings-plans&add=success");
		exit();
	} else {
	   header("Location: ../settings/index.php?page=savings-plans&add=failed");
	   exit();
	}
	mysqli_close($conn);

}

 ?>