<?php 

//Check if loan already exists for this user
	if (isset($_POST['check'])) {
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
		$member_id = $_POST['member_id'];

		$check_sql = "SELECT * FROM loan_list WHERE borrower_id = '$member_id'";
		$check_query = mysqli_query($conn, $check_sql);
		$check = mysqli_num_rows($check_query);

		if ($check > 0) {
			echo "success";
		} else {
			echo "failure";
		}


	}

	if (isset($_POST['loan-amount'])) {
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
		include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/functions/unique-id-generator.php";

		$loan_ref_num = refNum8();
		$date = date('Y-m-d H:i:s');

		// Check if the reference number already exists in the database
		$sql0 = "SELECT * FROM loan_list WHERE ref_no='$loan_ref_num';";
		$result0 = mysqli_query($conn, $sql0);
		while (mysqli_num_rows($result0) > 0) {
		  // If the reference number already exists, generate a new one
		  $loan_ref_num = refNum8();
		}
		$borrower_id = $_POST['member-id'];
		$loan_plan = $_POST['loan-plan'];
		$loan_amount = $_POST['loan-amount'];
		$loan_comment = $_POST['loan-comment'];
		$status = 1;
		$current_due_order = 0;

		//UPLOAD Attachment
		 // Check if a file was uploaded
	      if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {

	        // Define allowed file types and maximum file size
	        $allowedTypes = array(
			  IMAGETYPE_PNG, 
			  IMAGETYPE_JPEG, 
			  IMAGETYPE_GIF
			);
	        $maxSize = 50 * 1024 * 1024; // 50MB

	        // Check if the file type and size are valid
	        $fileType = exif_imagetype($_FILES['attachment']['tmp_name']);
	        $fileSize = $_FILES['attachment']['size'];
	        if (!in_array($fileType, $allowedTypes) || $fileSize > $maxSize) {
	            header("Location: ../settings/index.php?error=invalid_image_type");
	            exit();
	        }

	        // Read the image data into a variable
	        $imageData = file_get_contents($_FILES['attachment']['tmp_name']);

	        // Escape the binary data to prevent SQL injection
	        $attachment = mysqli_real_escape_string($conn, $imageData);
	    }

		$sql = "INSERT INTO loan_list (borrower_id, ref_no, loan_plan, amount, status, current_due_order, date_created, comment, attachment) VALUES ('$borrower_id', '$loan_ref_num','$loan_plan', '$loan_amount', '$status', '$current_due_order', '$date', '$loan_comment', '$attachment')";
		$query = mysqli_query($conn, $sql);

		if ($query ) {
			header("Location: ../loans/index.php?page=loans&application=success");
			exit();
		} else {
			header("Location: ../loans/index.php?page=loans&application=failed");
			exit();
		}

		
		mysqli_close($conn);
	}
 ?>