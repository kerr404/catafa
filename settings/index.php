<?php 
	$page_title = "Settings";
 ?>
<?php
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/header.php";
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
	$sql = "SELECT * FROM settings WHERE id = 1";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);
	$name = $row['name'];
	$theme = $row['theme'];

?>

<!--MODALS-->

<div class="w-100">
	<div class="row px-3 pt-3 border-bottom bg-white">
		<div class="col">
			<div class="row">
				<h4 style="color: #424242;">Settings</h4>
			</div>
			<div class="row">
				<nav class="navbar navbar-expand-lg navbar-light">
				    <div class="collapse navbar-collapse" id="navbarNav">
				      <ul class="navbar-nav shadow-sm">
				        <li class="nav-item">
				          <a class="nav-link text-secondary <?php if (isset($_GET['page']) && $_GET['page'] == "display") {echo "border-bottom border-primary border-3 shadow-sms";} ?>" href="index.php?page=display">Display</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link text-secondary <?php if (isset($_GET['page']) && $_GET['page'] == "registration-form") {echo "border-bottom border-primary border-3 shadow-sms";} ?>" href="index.php?page=registration-form">Registration Form</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link text-secondary <?php if (isset($_GET['page']) && $_GET['page'] == "loan-plans") {echo "border-bottom border-primary border-3 shadow-sm";} ?>" href="index.php?page=loan-plans">Loan Plans</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link text-secondary <?php if (isset($_GET['page']) && $_GET['page'] == "savings-plans") {echo "border-bottom border-primary border-3 shadow-sm";} ?>" href="index.php?page=savings-plans">Savings Plan</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link text-secondary <?php if (isset($_GET['page']) && $_GET['page'] == "database") {echo "border-bottom border-primary border-3 shadow-sm";} ?>" href="index.php?page=database">Database</a>
				        </li>
				      </ul>
				    </div>
				</nav>
			</div>
		</div>
	</div>
	<div class="row px-4 pt-2 bg-light" style="width: 100%; height: 80vh; overflow-y: scroll; overflow-x: hidden;">
		<?php 
			if (!isset($_GET['page'])) {
				include "display.php";
			}
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				include $page.".php";
			}
		 ?>
		 <div class="my-5">
			<!--Add Space at the bottom-->
		</div>
	</div>
</div>
<?php
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/footer.php";
 ?>