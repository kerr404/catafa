<!--Style for Dropdown Menu-->
<style type="text/css">
	.dropdown-menu li {
		height: 38px;
	}
	.dropdown-menu li .dropdown-item{
		height: 100%;
		margin: 0;
	}
</style>

<script type="text/javascript">
	//Removes get methods when page is reloaded
	if (performance.navigation.type === 1) {
  // The page was reloaded
  window.location.href = 'index.php?page=savings';
}
</script>

<!--ADD Success Message-->
<?php if(isset($_GET['register']) AND $_GET['register'] == 'success') { ?>
	<script>
		$( document ).ready(function() {
		    $('#register-success').modal('show');
		     $('#register-success').modal('show');
        setTimeout(function() {
            $('#register-success').modal('hide');
        }, 2000); // 1 seconds delay  
		});
	</script>
<?php } ?>
<div id="register-success" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h3 class="text-success m-0">Successfully added!</h3>
			</div>
		</div>
	</div>
</div>

<!--ADD Failed Message-->
<?php if(isset($_GET['register']) AND $_GET['register'] == 'failed') { ?>
	<script>
		$( document ).ready(function() {
		    $('#register-failed').modal('show');
		     $('#register-failed').modal('show');
        setTimeout(function() {
            $('#register-failed').modal('hide');
        }, 2000); // 1 seconds delay  
		});
	</script>
<?php } ?>
<div id="register-failed" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h4 class="text-danger m-0">Failed to add savings account!</h4>
			</div>
		</div>
	</div>
</div>

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

<!--Delete Success Message-->
<?php if(isset($_GET['delete']) AND $_GET['delete'] == 'success') { ?>
	<script>
		$( document ).ready(function() {
		    $('#delete-success').modal('show');
		     $('#delete-success').modal('show');
        setTimeout(function() {
            $('#delete-success').modal('hide');
        }, 2000); // 1 seconds delay  
		});
	</script>
<?php } ?>
<div id="delete-success" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h4 class="text-success m-0">Successfully Deleted!</h4>
			</div>
		</div>
	</div>
</div>

<!--Delete Failed Message-->
<?php if(isset($_GET['delete']) AND $_GET['delete'] == 'failed') { ?>
	<script>
		$( document ).ready(function() {
		    $('#delete-failed').modal('show');
		     $('#delete-failed').modal('show');
        setTimeout(function() {
            $('#delete-failed').modal('hide');
        }, 2000); // 1 seconds delay  
		});
	</script>
<?php } ?>
<div id="delete-failed" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h4 class="text-danger m-0">Delete failed!</h4>
			</div>
		</div>
	</div>
</div>


<?php 
	 include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/add-savings-account.php";
 ?>

<!-- =======  Data-Table  = Start  ========================== -->
<div class="container-fluid p-4" style="width: 100%; height: 90vh; overflow-y: scroll; overflow-x: hidden;">
	<div class="row">
	<div class="col-12">
  	<div class="data_table p-3 shadow">
  		<div class="d-flex flex-row mb-2 align-items-center">
			<div class="mx-2 d-flex align-items-center">
				<h4 class="mb-2" style="color: #333333;">
	        		<span>Savings Account List</span>
	        		<span>
	        			<button title="Add Savings Account" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-savings-account-modal">
	        				<i class="fas fa-plus fa-lg"></i>
	        			</button>
	        		</span>
	        	</h4>
			</div>
		</div>
    	<table id="savings-list-table" class="table table-bordered table-hover" style="color: #474747 !important;">
					<thead>
				    <tr>
				     	<th>#</th>
				      	<th>Account Holder</th>
				     	<th>Account Number</th>
				     	<th>Balance</th>
				     	<th>Interest Earnings</th>
				     	<th>Action</th>
				    </tr>
					</thead>
				  <tbody>
				    <?php 

				  			$rowNum = 0; 

				  			$sql1 = "SELECT * FROM savings_plan";
							$query1 = mysqli_query($conn, $sql1);
							$row1 = mysqli_fetch_assoc($query1);
							$interest_rate = $row1['interest_percentage'];

							$sql2 = "SELECT * FROM savings_account_list";
							$query2 = mysqli_query($conn, $sql2);
							while ($row2 = mysqli_fetch_assoc($query2)) {
							$id = $row2['id'];
							$account_holder_id = $row2['account_holder_id'];
							$account_number = $row2['account_number'];
							$account_balance = $row2['account_balance'];
							$earnings_balance = $row2['earnings_balance'];
							$interest_earnings = $row2['earnings_balance'];
							$rowNum = $rowNum + 1;

							

							//GET the name of the accounr holder using account_holder_id
							$sql3 = "SELECT * FROM members WHERE member_id = $account_holder_id";
							$query3 = mysqli_query($conn, $sql3);
							$row3 = mysqli_fetch_assoc($query3);
						 ?>
				    <tr>
				      <td><?php echo $rowNum; ?></td>
				      <td>
				      	<a type="button" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#view-savings<?php echo $id; ?>" title="View Savings Account">
				      		<?php echo $row3['lastname'].", ".$row3['firstname']." ".substr($row3['middlename'], 0, 1)."."; ?>
				      	</a>
				      </td>
				     	<td><?php echo $row2['account_number']; ?></td>
				     	<td>₱<?php echo number_format($account_balance, 2, '.', ','); ?></td>
				     	<td>₱<?php echo number_format($interest_earnings, 2, '.', ','); ?></td>
				     	<td>
				     		<a title="Manage Savings Account" class="m-0 btn btn-sm btn-primary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
								    Manage
								</a>
					     	<ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuLink" >
					     		<li>
							    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#view-savings<?php echo $id; ?>">
							    		<span class="mx-2">
							    			<i class="fas fa-eye text-primary"></i>
							    		</span>
							    		<span>View</span>
							    	</button>
							    </li>
							    <li>
							    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deposit-modal<?php echo $id; ?>">
							    		<span class="mx-2">
							    			<i class="fas fa-plus-square fa-lg text-success"></i>
							    		</span>
							    		<span>Deposit Balance</span>
							    	</button>
							    </li>
							    <li>
							    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#withdraw-modal<?php echo $id; ?>">
							    		<span class="mx-2">
							    			<i class="fas fa-minus-square fa-lg text-danger"></i>
							    		</span>
							    		<span>Withdraw Balance</span>
							    	</button>
							    </li>
							    <div class="dropdown-divider"></div>
							    <li>
							    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#earnings-withdraw-modal<?php echo $id; ?>">
							    		<span class="mx-2">
							    			<i class="fas fa-minus-square fa-lg text-danger"></i>
							    		</span>
							    		<span>Withdraw Earnings</span>
							    	</button>
							    </li>
							    <div class="dropdown-divider"></div>
							    <li>
							    	<button class="dropdown-item" onclick="window.location.href='<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/savings/index.php?page=savings-history&account_number=<?php echo $account_number; ?>'">
							    		<span class="mx-2">
							    			<i class="fas fa-history text-info"></i>
							    		</span>
							    		<span>History</span>
							    	</button>
							    </li>
							    <li>
							    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete-savings-account-modal<?php echo $id; ?>">
							    		<span class="mx-2">
							    			<i class="fas fa-trash text-danger"></i>
							    		</span>
							    		<span>Close Account</span>
							    	</button>
							    </li>
							</ul>
						</td>
				    </tr>
				    <!--------------------MODALS------------------------>
				    <?php
				    include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/view-savings.php";
				    include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/savings-earnings-withdraw.php";
				    include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/savings-deposit.php";
				    include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/savings-withdraw.php";
				    include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/delete-savings-account.php";
						}
				    ?>  		
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>

 <!-- ======########====== DATATABLE JAVASCRIPS  =========########========= -->

 <!--Initialise the Datatable-->
<script type="text/javascript">
	$(document).ready(function () {
	    $('#savings-list-table').DataTable();
	});
</script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/datatables.min.js"></script>

