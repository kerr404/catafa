<?php 
	if (isset($_POST['submit'])) {

		require "../includes/db_conn.php";

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
		$id = $_GET['id'];


		$sql = "UPDATE members SET firstname = '$firstName', middlename = '$middleName', lastname = '$lastName', age = '$age', gender = '$gender', mobile_number = '$mobileNumber', province = '$province', city = '$city', barangay = '$barangay', land_area = '$landArea' WHERE id = $id";
		$query = mysqli_query($conn, $sql);

		if ($query) {
			header('Location: ../members/index.php?edit=success');
			exit();
		} else {
			header('Location: ../members/index.php?edit=failed');
			exit();
		}

		mysqli_close($conn);
	} else {
		echo "Direct access is not allowed!";
		}

 ?>