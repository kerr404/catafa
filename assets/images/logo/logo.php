<?php
	// Script to get the Png image in the database
	require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
	$sql_logo = "SELECT * FROM settings WHERE id = 1";
	$query_logo = mysqli_query($conn, $sql_logo);
	$row_logo = mysqli_fetch_assoc($query_logo);
	$logo = $row_logo['logo'];

	header('Content-Type: image/png');
	echo $logo;
 ?>