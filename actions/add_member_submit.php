<?php 
	if (isset($_POST['registration-submit'])) {

		require "../includes/db_conn.php";
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/functions/unique-id-generator.php"; // include the unique id generator function

		$date = date('Y-m-d H:i:s');
		$member_id = refNum6();
		$firstName = $_POST['firstname'];
		$middleName = $_POST['middlename'];
		$lastName = $_POST['lastname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$mobileNumber = $_POST['mobile-number'];
		$province = $_POST['province'];
		$city = $_POST['city'];
		$barangay = $_POST['barangay'];
		$landArea = $_POST['land-area'];
		$membership_fee = $_POST['membership-fee'];

		$sql = "INSERT INTO members (member_id, firstname, middlename, lastname, age, gender, mobile_number, province, city, barangay, land_area, status, date_registered) VALUES ('$member_id', '$firstName', '$middleName', '$lastName', '$age', '$gender', '$mobileNumber', '$province', '$city', '$barangay', '$landArea', 0, '$date')";
		$query = mysqli_query($conn, $sql);

		if ($query) {
			header("Location: ../members/index.php?add=success");
			exit();
		} else {
			header("Location: ../members/index.php?add=failed");
			exit();
		}
		
		/*
			THE 'status' VALUE  is 
			sent to Database a '0' by default, 
			it means PENDING USER.

			0 = pending user
			1 = active member
         */
		mysqli_close($conn);
	} else {
		echo "Direct access is not allowed!";
		}

 ?>