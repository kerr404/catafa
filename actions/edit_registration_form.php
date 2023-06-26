<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

		$firstname = $_POST['first-name'];
		$middlename = $_POST['middle-name'];
		$lastname = $_POST['last-name'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$mobile_number = $_POST['mobile-number'];
		$province = $_POST['province'];
		$city = $_POST['city'];
		$barangay = $_POST['barangay'];
		$land_area = $_POST['land-area'];



		$sql = "UPDATE reg_form SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', age = '$age', gender = '$gender', mobile_number = '$mobile_number', province = '$province', city = '$city', barangay = '$barangay', land_area = '$land_area'  WHERE id = 1;";
		$query = mysqli_query($conn, $sql);

		if($query){
			header("Location: ../settings/index.php?page=registration-form&edit=success");
			exit();
		} else {
		   header("Location: ../settings/index.php?page=registration-form&edit=failed");
		   exit();
		}
		mysqli_close($conn);
	} 
 ?>