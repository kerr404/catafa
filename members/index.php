
<?php
	$page_id = "members";  // Used to identify the current page to highlight the Navigation in the Sidebar if the current page is in the Home
	$page_title = "Member List";
 
	// Redirect the User to Login Page is there is no Active Session
	if (!isset($_SESSION['ADMIN_USER'])) {
		header($_SERVER['DOCUMENT_ROOT']."/catafa/login.php");
	}

	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/header.php";
?>

<?php
	require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

	$sql = "SELECT * FROM members";
	$query = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($query);
			
?>

<div class="w-100 bg-light">
	<?php 
		if (!isset($_GET['page'])) {
			include "members.php";
		}
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			include $page.".php";
		}
	 ?>
</div>



<!----------------FOOOTER-------------FOOOTER---------------FOOOTER----------------->
<?php 
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/footer.php";
 ?>
 <!----------------FOOOTER-------------FOOOTER---------------FOOOTER----------------->