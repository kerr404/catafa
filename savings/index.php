<?php 
	$page_id = "savings";  // Used to identify the current page to highlight the Navigation in the Sidebar if the current page is in the Analytics
	$page_title = "Savings";
?>
<?php 
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/header.php";
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

	$sql = "SELECT * FROM members";
	$result = mysqli_query($conn, $sql);
?>
<!--------------------------SAVINGS NAVIGATION--------------------------------->

<div class="w-100 bg-light">
	<?php 
		if (!isset($_GET['page'])) {
			include "savings.php";
		}
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			include $page.".php";
		}
	 ?>
</div>



<?php 
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/footer.php";
?>