<?php
	$page_id = "dashboard";  // Used to identify the current page to highlight the Navigation in the Sidebar if the current page is in the Home
	$page_title = "Dashboard";
 	
	// Redirect the User to Login Page if there is no Active Session
	if (!isset($_SESSION['ADMIN_USER'])) {
		header($_SERVER['DOCUMENT_ROOT']."/catafa/login.php");
	}

	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/header.php";
?>

<?php
	require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
	
	$sql = "SELECT * FROM members";
	$query = mysqli_query($conn, $sql);
	$member_count = mysqli_num_rows($query);

	$sql2 = "SELECT * FROM loan_list";
	$query2 = mysqli_query($conn, $sql2);
	$loan_count = mysqli_num_rows($query2);

	$sql3 = "SELECT * FROM savings_account_list";
	$query3 = mysqli_query($conn, $sql3);
	$row3 = mysqli_fetch_assoc($query3);
	$savings_count = mysqli_num_rows($query3);		
?>

<!---DASHBOARD START-->
<div class="w-100 px-2 py-2" style="background-color: #f7f7f7;">
	<div class="row py-2 mx-1 bg-white shadow rounded" style="z-index: 1; width: 100%; height: 100vh;">
		<div class="col-lg-12">
			<div class="p-1">
				<div class="row mb-2 mt-1 w-100">
					<h4 style="color: #333333;">Dashboard</h4>
				</div>
				<div class="row ml-2 mr-2">
					<div class="col-md-4">
	                    <div class="card h-100 bg-primary text-white">
	                        <div class="card-body shadow-sm">
	                            <div class="d-flex justify-content-between align-items-center">
	                                <div class="mr-3">
	                                    <div class="text-white-75">Total Members</div>
	                                    <div class="mt-2 text-lg font-weight-bold">
	                                    	<h2><?php echo $member_count; ?></h2>
	                                	</div>
	                                </div>
	                                <i class="fa fa-users fa-2x opacity-75"></i>
	                            </div>
	                        </div>
	                        <div class="card-footer d-flex align-items-center justify-content-between">
	                            <a class="small text-white stretched-link text-decoration-none" href="members/index.php?page=members">View Members</a>
	                            <div class="small text-white">
	                            	<i class="fas fa-angle-right"></i>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-4">
	                    <div class="card h-100 bg-success text-white">
	                        <div class="card-body shadow-sm">
	                            <div class="d-flex justify-content-between align-items-center">
	                                <div class="mr-3">
	                                    <div class="text-white-75">Loans</div>
	                                    <div class="mt-2 text-lg font-weight-bold">
	                                    	<h2><?php echo $loan_count; ?></h2>
	                                	</div>
	                                </div>
	                                <i class="fas fa-money-bill fa-2x opacity-75"></i>
	                            </div>
	                        </div>
	                        <div class="card-footer d-flex align-items-center justify-content-between">
	                            <a class="small text-white stretched-link text-decoration-none" href="loans/index.php?page=loans">View Loans</a>
	                            <div class="small text-white">
	                            	<i class="fas fa-angle-right"></i>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-4">
	                    <div class="card h-100 bg-danger text-white">
	                        <div class="card-body shadow-sm">
	                            <div class="d-flex justify-content-between align-items-center">
	                                <div class="mr-3">
	                                    <div class="text-white-75">Savings accounts</div>
	                                    <div class="mt-2 text-lg font-weight-bold">
	                                    	<h2><?php echo $savings_count; ?></h2>
	                                	</div>
	                                </div>
	                                <i class="fas fa-piggy-bank fa-2x opacity-75"></i>
	                            </div>
	                        </div>
	                        <div class="card-footer d-flex align-items-center justify-content-between">
	                            <a class="small text-white stretched-link text-decoration-none" href="savings/index.php?page=savings">View Savings Accounts</a>
	                            <div class="small text-white">
	                            	<i class="fas fa-angle-right"></i>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				</div>
				<div class="row mt-4" style="z-index: 2;">
			        <div class="col m-2 shadow">
			            <canvas id="monthly-loaned-total-chart"></canvas>
			        </div>
			        <div class="col m-2 shadow">
			            <canvas id="monthly-savings-earnings"></canvas>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>

<?php 
	// MONTHLY LOANED AMOUNT 
    include $_SERVER['DOCUMENT_ROOT']."/catafa/analytics/charts/monthly-loaned-total.php";
    include $_SERVER['DOCUMENT_ROOT']."/catafa/analytics/charts/savings-earnings-chart.php";
 ?>

<!----------------FOOOTER-------------FOOOTER---------------FOOOTER----------------->
<?php 
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/footer.php";
 ?>
 <!----------------FOOOTER-------------FOOOTER---------------FOOOTER----------------->