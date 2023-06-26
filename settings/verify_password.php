<?php 
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

	if (isset($_POST['pass'])) {
		$password = $_POST['pass'];

		$a_sql = "SELECT * FROM admins WHERE admin_id = 1";
	    $a_query = mysqli_query($conn, $a_sql);
	    $a_row = mysqli_fetch_assoc($a_query);
	    $admin_pass = $a_row['admin_password'];

		if (password_verify($password, $admin_pass)) {
			echo "success";
		} else {
			echo "failure";
		}
	}
 ?>