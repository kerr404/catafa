<script type="text/javascript">
	//Removes get methods when page is reloaded
	if (performance.navigation.type === 1) {
  // The page was reloaded
  window.location.href = 'index.php?page=savings-wallet';
}
</script>
<!--MOODALS-->
<!--DEPOSIT Success Message-->
<?php if(isset($_GET['deposit']) AND $_GET['deposit'] == 'success') { ?>
	<script>
		$( document ).ready(function() {
		    $('#deposit-success').modal('show');
		     $('#deposit-success').modal('show');
        setTimeout(function() {
            $('#deposit-success').modal('hide');
        }, 2000); // 1 seconds delay  
		});
	</script>
<?php } ?>
<div id="deposit-success" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h3 class="text-success m-0">Deposit Successful!</h3>
			</div>
		</div>
	</div>
</div>

<!--DEPOSIT Failed Message-->
<?php if(isset($_GET['deposit']) AND $_GET['deposit'] == 'failed') { ?>
	<script>
		$( document ).ready(function() {
		    $('#deposit-failed').modal('show');
		     $('#deposit-failed').modal('show');
        setTimeout(function() {
            $('#deposit-failed').modal('hide');
        }, 2000); // 1 seconds delay  
		});
	</script>
<?php } ?>
<div id="deposit-failed" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h3 class="text-danger m-0">Deposit Failed!</h3>
			</div>
		</div>
	</div>
</div>

<!--WITHDRAW Success Message-->
<?php if(isset($_GET['withdraw']) AND $_GET['withdraw'] == 'success') { ?>
	<script>
		$( document ).ready(function() {
		    $('#withdraw-success').modal('show');
		     $('#withdraw-success').modal('show');
        setTimeout(function() {
            $('#withdraw-success').modal('hide');
        }, 2000); // 1 seconds delay  
		});
	</script>
<?php } ?>
<div id="withdraw-success" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h4 class="text-success m-0">Withdraw Successful!</h4>
			</div>
		</div>
	</div>
</div>

<!--WITHDRAW Failed Message-->
<?php if(isset($_GET['withdraw']) AND $_GET['withdraw'] == 'failed') { ?>
	<script>
		$( document ).ready(function() {
		    $('#withdraw-failed').modal('show');
		     $('#withdraw-failed').modal('show');
        setTimeout(function() {
            $('#withdraw-failed').modal('hide');
        }, 2000); // 1 seconds delay  
		});
	</script>
<?php } ?>
<div id="withdraw-failed" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h3 class="text-danger m-0">Withdraw Failed!</h3>
			</div>
		</div>
	</div>
</div>

<?php
	//MODALS
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/savings-wallet-deposit.php";
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/savings-wallet-withdraw.php";

		// BANK BALANCE
	$sql = "SELECT * FROM savings_bank WHERE id = 1";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);
	$savings_balance_amount = $row['amount'];
	$savings_balance_last_update = $row['last_updated'];


 ?>
<div class="container-fluid p-4 bg-light" style="width: 100%; height: 90vh; overflow-y: scroll; overflow-x: hidden;">
	<div class="col-12 p-4 shadow bg-white rounded">
		<div class="d-flex flex-row mb-4 align-items-center">
			<div class="mx-2 d-flex align-items-center">
				<h4 style="color: #333333;">Savings Wallet</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-5">
				<div class="mx-1 p-2 data_table bg-white rounded " style="z-index: 1;">
				  <div class="row mb-1 px-2 pt-2">
				    <h5 class="text-center">Balance</h5>
				  </div>
				  <div class="row">
				    <h1 class="display-5 text-center">₱<?php echo number_format($savings_balance_amount, 2, '.', ','); ?></h1>
				    <p class="text-secondary text-center">Last Updated: <?php echo date_format( date_create($savings_balance_last_update), 'F jS, Y'); ?></p>
				  </div>
				  <div class="d-flex justify-content-end">
					<button class="btn btn-primary my-0" data-bs-toggle="modal" data-bs-target="#savings-wallet-deposit-modal">Deposit</button>
					<button class="mx-1 btn btn-danger my-0" data-bs-toggle="modal" data-bs-target="#savings-wallet-withdraw-modal">Withdraw</button>
				  </div>
				</div>
			</div>
			<div class="col mx-1">
				<div class="col">
					<div class="data_table">
			            <div class="row mb-1 w-100">
		                		<div class="col">
		                			<h5 class="mb-2" style="color:#333333;">Wallet History</h5>
		                		</div>
			                	<div class="col dropdown d-flex justify-content-end">
								 	<?php include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/date-range-nav.php"; ?>
								</div>
							</div>
						<table id="savings-wallet-history" class="table table-hover table-bordered">
						  <thead>
						    <tr>
						     	<th>#</th>
						      	<th>Amount</th>
						     	<th>Date</th>
						     	<th>Description</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
								// GET the START DATE and END DATE
								$sql0 = "SELECT * FROM settings WHERE id = 1";
								$query0 = mysqli_query($conn, $sql0);
								$row0 = mysqli_fetch_assoc($query0);
								$start_date = $row0['date_range_start'];
								$end_date = $row0['date_range_end'];

								// QUERY the history based on START DATE and END DATE
								$sql = "SELECT * FROM savings_bank_history WHERE date BETWEEN '$start_date' AND '$end_date' ORDER BY date desc";
								$query = mysqli_query($conn, $sql);

						  		$rowNum = 0; 
								while ($row = mysqli_fetch_assoc($query)) {
								$id = $row['id'];
								$rowNum = $rowNum + 1;
								$amount = $row['debit'] + $row['credit'];
								$date = $row['date'];
								$description = $row['description'];
								
							 ?>
						    <tr>
						    	<td><?php echo $rowNum; ?></td>
						    	<td class="align-middle">
							    		<?php 
							    		if ($row['debit'] < $row['credit']) {
						     				echo "-";
						     			}
						     			if ($row['debit'] > $row['credit']) {
						     				echo "+";
						     			}
						     			echo "₱".number_format($amount, 2, '.', ','); 
							    		?>		
							    </td>
						    	<td><?php echo date("F j, Y", strtotime($date)); ?></td>
						    	<td><button class="btn btn-primary btn-sm my-0" data-bs-toggle="modal" data-bs-target="#view-description<?php echo $id; ?>">View</button></td>
						    </tr>

						    
						    <!--------------------MODALS------------------------>

						    <!--View Wallet History Description Modal-->
							<div id="view-description<?php echo $id; ?>" class="modal fade">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h4 class="modal-title">Description</h4>
							        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
							      </div>
							      <div class="modal-body px-4 py-2">
							        <?php echo $description; ?>
							      </div>
							    </div>
							  </div>
							</div>
						    <?php 
								}
						    ?>
						     		
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="height:30vh;">
			
		</div>
	</div>
</div>

 <!-- ======########====== DATATABLE JAVASCRIPS  =========########========= -->

 <!--Initialise the Datatable-->
<script type="text/javascript">
	$(document).ready(function () {
	    $('#savings-wallet-history').DataTable();
	});
</script>

<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/datatables.min.js"></script>
