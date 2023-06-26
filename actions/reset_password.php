<?php 
	if (isset($_POST['submit'])) {
	    require $_SERVER['DOCUMENT_ROOT'] . "/catafa/includes/db_conn.php";
	    $password = $_POST['current-pass'];
	    $new_pass = $_POST['new-pass'];

	    $sql = "SELECT * FROM admins WHERE admin_id = 1";
	    $query = mysqli_query($conn, $sql);
	    $row = mysqli_fetch_assoc($query);
	    $hash = $row['admin_password'];


	    if (password_verify($password, $hash)) {
	        $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);

	        $stmt = mysqli_prepare($conn, "UPDATE admins SET admin_password = ? WHERE admin_id = ?");
	        mysqli_stmt_bind_param($stmt, "si", $hashed_password, $admin_id);
	        $admin_id = 1;

	        if (mysqli_stmt_execute($stmt)) {
	            header("Location: ../settings/account.php?reset=success");
				exit();
	        }
	    } else {
	        header("Location: ../forgot-password.php?failed=wrong_password");
			exit();
	    }
	}
 ?>