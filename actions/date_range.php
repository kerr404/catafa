<?php
	// LAST DAYS
	if (isset($_POST['days'])) {
	    include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
	    $days = $_POST['days'];

	    $end_date = date('Y-m-d', strtotime($date . ' +3 days')); // Retrieves current date in the YYYY-MM-DD format
	    $start_date = date('Y-m-d', strtotime("-$days days", strtotime($end_date))); // Subtracts $days days from current date

	    $sql = "UPDATE settings SET date_range_start = '$start_date', date_range_end = '$end_date', date_range_id = '$days' WHERE id = 1";
	    $query = mysqli_query($conn, $sql);
	    if ($query) {
	        echo "SUCCESS";
	    }
	}

	// FOR DATE RANGE
	if (isset($_POST['custom'])) {
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

		$start_date = $_POST['from'];
		$end_date = $_POST['to'];
		$date_range_id = $_POST['custom'];

		$sql = "UPDATE settings SET date_range_start = '$start_date', date_range_end = '$end_date', date_range_id = '$date_range_id' WHERE id = 1";
			$query = mysqli_query($conn, $sql);
			if ($query) {
				echo "SUCCESS";
			}
	}
 ?>