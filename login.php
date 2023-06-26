<?php
	session_start();
	if (isset($_SESSION['ADMIN_USER'])) {
		header("Location: http://{$_SERVER['HTTP_HOST']}/catafa/index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>CATAFA - Log in</title>
	<link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/bootstrap/css/bootstrap.min.css">
	<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/fontawesome/js/all.min.js"></script>
</head>
<style type="text/css">
	    body {
	    	background-color: #e4e6ed;
    }
</style>
<body>
	 <!--Login Form-->
	<div id="login-form" class="container bg-white px-5 pt-3 pb-5 position-absolute top-50 start-50 translate-middle rounded-3 shadow-lg" style="width: 410px; height: 450px;">
		<div>
			<img src="<?php $_SERVER['DOCUMENT_ROOT'] ?> /catafa/assets/images/logo/logo.php" class="d-block mx-auto" style="height: 120px; width: 120px;">
		</div>
		<div id="login-form-text" class="mt-2 mb-4">
			<h4 class="text-center">CATAFA</h4>
		</div>
		<div id="login-error-message" class="text-danger my-2">
			<?php 
				//Display an error message in the Login Form
				if (isset($_GET['error'])) {
					$checkError = $_GET['error'];
					if ($checkError == "empty_email_phone") {
						echo "Username is empty";
					} elseif ($checkError == "empty_password") {
						echo "Password is empty";
					} elseif ($checkError == "password_incorrect") {
						echo "Invalid Password";
					} elseif ($checkError == "user_not_found") {
						echo "Invalid Username";
					}
				}
				?>
		</div>
		<form method="POST" action="actions/login_submit.php">
			<?php 
				//Get Back the input data to Username if there is an error!
				if (isset($_GET['email_phone'])) {
					$emailPhone = $_GET['email_phone'];
			?>	
			<?php
					echo '
						<div class="mb-3">
				            <div class="input-group">
				              <span class="input-group-text shadow-sm"><i class="fas fa-user"></i></span>
				              <input class="form-control" type="text" name="login-email-phone" value='.$emailPhone.' placeholder="Username" required>
				            </div>
						</div>
					';
				} else {
					echo '
						<div class="mb-3">
				            <div class="input-group shadow-sm">
				              <span class="input-group-text"><i class="fas fa-user"></i></span>
				              <input class="form-control" type="text" name="login-email-phone" placeholder="Username" required>
				            </div>
						</div>
					';
				}
			 ?>
			<div class="mb-2">
	      <div class="input-group shadow-sm">
	        <span class="input-group-text"><i class="fas fa-lock"></i></span>
	        <input class="form-control" type="password" name="login-password" placeholder="Password" required>
	      </div>
			</div>
			<div class="mt-1 d-grid">
			  <button class="btn btn-primary btn-block mt-3" type="submit" name="login-submit">
			    <i class="fas fa-sign-in-alt"></i> Login
			  </button>
			</div>
			<!--
			<div class="mt-3 text-center">
		        <a href="forgot-password.php" class="text-primary text-decoration-none">Forgot Password?</a>
		    </div>
			-->
	 	</form>
	</div>
</body>
</html>