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
  window.location.href = 'index.php?page=loans';
}
</script>

<!--MODALS-->
<!--ADD Success Message-->
	<?php if(isset($_GET['application']) AND $_GET['application'] == 'success') { ?>
		<script>
			$( document ).ready(function() {
			    $('#application-success').modal('show');
			     $('#application-success').modal('show');
            setTimeout(function() {
                $('#application-success').modal('hide');
            }, 2000); // 1 seconds delay  
			});
		</script>
	<?php } ?>
	<div id="application-success" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
					<h3 class="text-success m-0">Successfully added!</h3>
				</div>
			</div>
		</div>
	</div>

	<!--ADD Failed Message-->
	<?php if(isset($_GET['application']) AND $_GET['application'] == 'failed') { ?>
		<script>
			$( document ).ready(function() {
			    $('#application-failed').modal('show');
			     $('#application-failed').modal('show');
            setTimeout(function() {
                $('#application-failed').modal('hide');
            }, 2000); // 1 seconds delay  
			});
		</script>
	<?php } ?>
	<div id="application-failed" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
					<h4 class="text-danger m-0">Failed to add loan!</h4>
				</div>
			</div>
		</div>
	</div>

<!--EDIT Success Message-->
	<?php if(isset($_GET['edit']) AND $_GET['edit'] == 'success') { ?>
		<script>
			$( document ).ready(function() {
			    $('#edit-success').modal('show'); 
			    $('#edit-success').modal('show');
            setTimeout(function() {
                $('#edit-success').modal('hide');
            }, 2000); // 1 seconds delay 
			});
		</script>
	<?php } ?>
	<div id="edit-success" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
					<h3 class="text-success m-0">Edit successful!</h3>
				</div>
			</div>
		</div>
	</div>

	<!--EDIT Failed Message-->
	<?php if(isset($_GET['edit']) AND $_GET['edit'] == 'failed') { ?>
		<script>
			$( document ).ready(function() {
			    $('#edit-failed').modal('show'); 
			    $('#edit-failed').modal('show');
            setTimeout(function() {
                $('#edit-failed').modal('hide');
            }, 2000); // 1 seconds delay 
			});
		</script>
	<?php } ?>
	<div id="edit-failed" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
					<h3 class="text-danger m-0">Edit failed!</h3>
				</div>
			</div>
		</div>
	</div>

	<!--DELETE Success Message-->
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
					<h4 class="text-success m-0">Successfully removed!</h4>
				</div>
			</div>
		</div>
	</div>

	<!--DELETE Failed Message-->
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

<!--EDIT Success Message-->
	<?php if(isset($_GET['payment'])) { ?>
		<script>
			$( document ).ready(function() {
			    $('#payment-success').modal('show'); 
			    $('#payment-success').modal('show');
            setTimeout(function() {
                $('#payment-success').modal('hide');
            }, 2000); // 1 seconds delay 
			});
		</script>
	<?php } ?>
	<div id="payment-success" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
					<h3 class="text-success m-0">Payment successful!</h3>
				</div>
			</div>
		</div>
	</div>

	<!--Release Success Message-->
	<?php if(isset($_GET['release']) AND $_GET['release'] == 'success') { ?>
		<script>
			$( document ).ready(function() {
			    $('#release-success').modal('show'); 
			    $('#release-success').modal('show');
            setTimeout(function() {
                $('#release-success').modal('hide');
            }, 2000); // 1 seconds delay 
			});
		</script>
	<?php } ?>
	<div id="release-success" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
					<h3 class="text-success m-0">Release successful!</h3>
				</div>
			</div>
		</div>
	</div>

	<!--Release Success Message-->
	<?php if(isset($_GET['release'])  AND $_GET['release'] == 'failed') { ?>
		<script>
			$( document ).ready(function() {
			    $('#release-failed').modal('show'); 
			    $('#release-failed').modal('show');
            setTimeout(function() {
                $('#release-failed').modal('hide');
            }, 2000); // 1 seconds delay 
			});
		</script>
	<?php } ?>
	<div id="release-failed" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
					<h3 class="text-danger m-0">Release failed!</h3>
				</div>
			</div>
		</div>
	</div>

<!----------------TABLE----------------TABLE---------------TABLE---------------->

<?php include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/add-loan.php" ?>

<!-- =======  Data-Table  = Start  ========================== -->
<div class="container-fluid p-4 bg-light" style="width: 100%; height: 90vh; overflow-y: scroll; overflow-x: hidden;">
    <div class="row">
        <div class="col-12">
            <div class="data_table p-3 shadow">
        		<div class="d-flex flex-row mb-2 align-items-center">
					<div class="mx-2 d-flex align-items-center">
						<h4 style="color: #333333;">
			        		<span>Loans list</span>
			        		<span>
			        			<button title="Add Loan" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-loan-modal">
			        				<i class="fas fa-plus fa-lg"></i>
			        			</button>
			        		</span>
			        	</h4>
					</div>
				</div>
				<table id="loan-list-table" class="table table-hover table-bordered" style="color: #474747 !important;">
				  <thead>
				    <tr>
				      <th>#</th>
				      <th>Borrower</th>
				      <th>Loan ID</th>
				      <th>Plan</th>
				      <th>Amount</th>
				      <th>Next Payment</th>
				      <th>Status</th>
				      <th>Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  		$rowNum = 0; // Create numbering on the loan list

				  		//Loan List Query 
						$sql = "SELECT * FROM loan_list";
						$query = mysqli_query($conn, $sql);
						while ($row = mysqli_fetch_assoc($query)) {
						$id = $row['id'];
						$amount = $row['amount'];
						$borrower_id = $row['borrower_id'];
						$loan_id = $row['ref_no'];
						$loan_plan_id = $row['loan_plan'];
						$date_released = $row['date_released'];
						$status = $row['status'];
						$comment = $row['comment'];
						$attachment = $row['attachment'];
						$current_due_order = $row['current_due_order'];
						$rowNum = $rowNum + 1;


						//PLAN List QUERY
						$plan_sql = "SELECT * FROM loan_plan WHERE id = $loan_plan_id";
						$plan_query = mysqli_query($conn, $plan_sql);
						$plan_row = mysqli_fetch_assoc($plan_query);

						$num_of_months = $plan_row['months'];
						$plan = $plan_row['plan_name'];
						$repayment_method = $plan_row['repayment_method'];
						$payment_freq = $plan_row['payment_frequency'];



						// *10 / 10 of $monthly_due & $due_penalty round the number up to one decimal place.

//#######################################/ REPAYMENT METHOD 1 FORMULAS ########################################//
						if ($repayment_method == 1) {
							$interest = ($plan_row['interest_percentage'] * $num_of_months)/100;
							$penalty_rate = $plan_row['penalty_rate']/100;
							$total_payable = $amount + ($amount * $interest);

							$due_amount = round($total_payable/($num_of_months * $payment_freq), 2);
							$due_penalty = round($due_amount * $penalty_rate, 2);
							$principal_amount = (($num_of_months * $payment_freq) - ($current_due_order - 1)) * $due_amount;
						}

//#######################################/ REPAYMENT METHOD 1 FORMULAS /######################################//

//#######################################/ REPAYMENT METHOD 2 FORMULAS /######################################//
						else if ($repayment_method == 2){
							$interest = $plan_row['interest_percentage']/100;
							$penalty_rate = $plan_row['penalty_rate']/100;
							$total_payable = $amount + ($amount * $interest);

							$due_amount = round(($amount * $interest) / $payment_freq, 2);
							$due_penalty = round($due_amount * $penalty_rate, 2);
							$principal_amount = ((($num_of_months * $payment_freq) - ($current_due_order - 1)) * $due_amount) + $amount;
						}
//#######################################/ REPAYMENT METHOD 2 FORMULAS /######################################//




						//GET THE NAME OF THE BORROWER IN THE MEMBER LIST-->
						$sql2 = "SELECT * FROM members WHERE member_id = $borrower_id";
						$query2 = mysqli_query($conn, $sql2);
						$row2 = mysqli_fetch_assoc($query2);

						//GET the value of the current_due_month
			  			$current_due_order = $row['current_due_order'];

			  			// Query to GET the current_due_date
			  			$due_sql2 = "SELECT * FROM loan_due_dates WHERE (loan_ref_no = $loan_id AND due_order = $current_due_order)";
			  			$due_query2 = mysqli_query($conn, $due_sql2);
			  			$due_row2 = mysqli_fetch_assoc($due_query2);
					 ?>

					 <!----------TR for the 1ST Repayment Method START--------->
					<?php if ($repayment_method == 1 ) {?>
				    <tr>
					  <td class="align-middle"><?php echo $rowNum; ?></td>
					  <td class="align-middle">
					  	<a type="button" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#view<?php echo $id; ?>" title="View Loan">
					  		<?php 
					  			echo $row2['lastname'] . ", " . $row2['firstname'] . " " . substr($row2['middlename'], 0, 1) . "."; 
					  		?>
					  	</a>
					  </td>
					  <td class="align-middle">
					  	<?php echo $loan_id; ?>
					  </td>
					  <td class="align-middle">
					  	<?php echo $plan; ?>
					  </td>
					  <td class="align-middle">
					    <ul class="list-unstyled mb-0">
					      <li>₱<?php echo number_format($amount, 2, '.', ','); ?></li>
					    </ul>
					  </td>
					  <td class="align-middle">
					      <?php if ($row['status'] == 1) { ?>
					        <p class="m-0">N/A</p>
					      <?php } else if ($row['status'] == 2) { ?>
					        <ul class="list-unstyled mb-0">
					          <li>Date: <?php echo date("F j, Y", strtotime($due_row2['due_date'])); ?></li>
					          <li>
					          	Amount:
                                <?php
                                	// Add the Monthly ammount and penalty if the current date is greater than the due date. 
                                    if (date('Y-m-d H:i:s') > $due_row2['due_date']) {
                                        echo "₱".number_format($due_amount + $due_penalty, 2, '.', ',');
                                    } else {
                                        echo "₱".number_format($due_amount, 2, '.', ',');
                                    }
                                 ?>
					          		
					          </li>
					        </ul>
					      <?php } else if ($row['status'] == 3) { ?>
					        <p>Completed</p>
					      <?php 
					  			}
					       ?>
					  </td>
					  <td class="align-middle">
					     <?php switch ($row['status']) {
					      case 1:
					        echo '<button class="btn btn-light border btn-sm rounded-pill" style="font-size: 0.75rem; padding: 0.1rem 0.4rem; width: 78px;" title="Not Released">Pending</button>';
					        break;
					      case 2:
					         echo '<button class="btn btn-light border btn-sm rounded-pill" style="font-size: 0.75rem; padding: 0.1rem 0.4rem; width: 78px;" title="Released">Released</button>';
					        break;
					      case 3:
					         echo '<button class="btn btn-light border btn-sm rounded-pill" style="font-size: 0.75rem; padding: 0.1rem 0.4rem; width: 78px;" title="Payment completed">Completed</button>';
					        break;
					    } ?>
					  </td>
					  <td class="align-middle">

					  	<!--Show if Already Released-->
					  	<a class="m-0 btn btn-sm btn-primary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" <?php if ($status == 3) {echo "hidden";} ?> style="width: 85px;">
						    Manage
						</a>
						<a class="m-0 btn btn-sm btn-danger"  data-bs-toggle="modal" data-bs-target="#delete-loan<?php echo $id;?>" name="edit-member-button" title="Delete Loan"<?php if ($status == 1 OR $status == 2) {echo "hidden";} ?> style="width: 85px;">
							<span><i class="fas fa-trash-alt"></i></span>
							<span>Delete</span>
						</a>
						<ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuLink">
							<li <?php if ($status == 1 OR $status == 3) {echo "hidden";} ?>>
						    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#add-loan-payment-modal<?php echo $id; ?>">
						    		<span class="mx-2">
						    			<i class="fas fa-plus text-success"></i>
						    		</span>
						    		<span>Add Payment</span>
						    	</button>
						    </li>
						    <li <?php if ($status == 2 OR $status == 3) {echo "hidden";} ?>>
						    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#release<?php echo $id; ?>" title="Release Money">
						    		<span class="mx-2">
						    			<i class="fas fas fa-check text-success"></i>
						    		</span>
						    		<span>Release Money</span>
						    	</button>
						    </li>
						    <div class="dropdown-divider"></div>
						    <li>
						    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#view<?php echo $id; ?>">
						    		<span class="mx-2">
						    			<i class="far fa-eye text-primary"></i>
						    		</span>
						    		<span>View</span>
						    	</button>
						    </li>
						    <li>
						    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-loan<?php echo $id; ?>">
						    		<span class="mx-2">
						    			<i class="fas fa-edit text-success"></i>
						    		</span>
						    		<span>Edit</span>
						    	</button>
							</li>
							<li <?php if ($status == 2 OR $status == 3) {echo "hidden";} ?>>
						    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete-loan<?php echo $id; ?>">
						    		<span class="mx-2">
						    			<i class="fas fa-trash-alt text-danger"></i>
						    		</span>
						    		<span>Delete</span>
						    	</button>
							</li>
						    <li>
						    	<button class="dropdown-item" onclick="window.location.href='<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/loans/index.php?page=loan-individual-history&loan_id=<?php echo $loan_id; ?>'">
						    		<span class="mx-2">
						    			<i class="fas fa-history text-info"></i>
						    		</span>
						    		<span>History</span>
						    	</button>
						    </li>
						</ul>
					  </td>
					</tr>
					<!----------TR for the 1ST Repayment Method END--------->


					<?php } else if ($repayment_method == 2 ) {?>
				

					 <!----------TR for the 2ND Repayment Method START--------->
				    <tr>
					  <td class="align-middle"><?php echo $rowNum; ?></td>
					  <td class="align-middle">
					  	<a type="button" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#view<?php echo $id; ?>" title="View Loan">
					  		<?php 
					  			echo $row2['lastname'] . ", " . $row2['firstname'] . " " . substr($row2['middlename'], 0, 1) . "."; 
					  		?>
					  	</a>
					  </td>
					  <td class="align-middle">
					  	<?php echo $loan_id; ?>
					  </td>
					  <td class="align-middle">
					  	<?php echo $plan; ?>
					  </td>
					  <td class="align-middle">
						₱<?php echo number_format($amount, 2, '.', ','); ?>
					  </td>
					  <td class="align-middle">
					      <?php if ($row['status'] == 1) { ?>
					        <p class="m-0">N/A</p>
					      <?php } else if ($row['status'] == 2) { ?>
					        <ul class="list-unstyled mb-0">
					          <li>Date: <?php echo date("F j, Y", strtotime($due_row2['due_date'])); ?></li>
					          <li>
					          	Amount:
                                <?php
                                	// Add the Monthly ammount and penalty if the current date is greater than the due date. 
                                    if (date('Y-m-d H:i:s') > $due_row2['due_date']) {
                                        echo "₱".number_format($due_amount + $due_penalty, 2, '.', ',');
                                    } else {
                                        echo "₱".number_format($due_amount, 2, '.', ',');
                                    }
                                 ?>
					          		
					          </li>
					        </ul>
					      <?php } else if ($row['status'] == 3) { ?>
					        <p>Completed</p>
					      <?php 
					  			}
					       ?>
					  </td>
					  <td class="align-middle">
					      <?php switch ($row['status']) {
					      case 1:
					        echo '<button class="btn btn-light border btn-sm rounded-pill" style="font-size: 0.75rem; padding: 0.1rem 0.4rem; width: 78px;" title="Not Released">Pending</button>';
					        break;
					      case 2:
					         echo '<button class="btn btn-light border btn-sm rounded-pill" style="font-size: 0.75rem; padding: 0.1rem 0.4rem; width: 78px;" title="Released">Released</button>';
					        break;
					      case 3:
					         echo '<button class="btn btn-light border btn-sm rounded-pill" style="font-size: 0.75rem; padding: 0.1rem 0.4rem; width: 78px;" title="Payment completed">Completed</button>';
					        break;
					    } ?>
					  </td>
					  </td>

					  <td class="align-middle">

					  	<!--Show if Already Released-->
					  	<a class="m-0 btn btn-sm btn-primary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" <?php if ($status == 3) {echo "hidden";} ?> style="width: 85px;">
						    Manage
						</a>
						<a class="m-0 btn btn-sm btn-danger"  data-bs-toggle="modal" data-bs-target="#delete-loan<?php echo $id;?>"name="edit-member-button" title="Delete Loan"<?php if ($status == 1 OR $status == 2) {echo "hidden";} ?> style="width: 85px;">
							<span><i class="fas fa-trash-alt"></i></span>
							<span>Delete</span>
						</a>

						<ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuLink">
							<li <?php if ($status == 1 OR $status == 3) {echo "hidden";} ?>>
						    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#add-loan-payment-modal<?php echo $id; ?>">
						    		<span class="mx-2">
						    			<i class="fas fa-plus text-success"></i>
						    		</span>
						    		<span>Add Payment</span>
						    	</button>
						    </li>
						    <li <?php if ($status == 2 OR $status == 3) {echo "hidden";} ?>>
						    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#release<?php echo $id; ?>" title="Release Money">
						    		<span class="mx-2">
						    			<i class="fas fas fa-check text-success"></i>
						    		</span>
						    		<span>Release Money</span>
						    	</button>
						    </li>
						    <div class="dropdown-divider"></div>
						    <li>
						    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#view<?php echo $id; ?>">
						    		<span class="mx-2">
						    			<i class="far fa-eye text-primary"></i>
						    		</span>
						    		<span>View</span>
						    	</button>
						    </li>
						    <li>
						    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-loan<?php echo $id; ?>">
						    		<span class="mx-2">
						    			<i class="fas fa-edit text-success"></i>
						    		</span>
						    		<span>Edit</span>
						    	</button>
							</li>
							<li <?php if ($status == 2 OR $status == 3) {echo "hidden";} ?>>
						    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete-loan<?php echo $id; ?>">
						    		<span class="mx-2">
						    			<i class="fas fa-trash-alt text-danger"></i>
						    		</span>
						    		<span>Delete</span>
						    	</button>
							</li>
						    <li>
								<button class="dropdown-item" onclick="window.location.href='<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/loans/index.php?page=loan-individual-history&loan_id=<?php echo $loan_id; ?>'">
								    <span class="mx-2">
								        <i class="fas fa-history text-info"></i>
								    </span>
								    <span>History</span>
								</button>
						    </li>
						</ul>
					  </td>
					</tr>
					<?php } ?>
					 <!----------TR for the 2ND Repayment Method END--------->

				    <!--------------------MODALS------------------------>
				    <?php
				    	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/add-loan-payment.php";
				    	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/view-loan.php";
				    	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/delete-loan.php";
				    	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/edit-loan.php";
				    	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/release-loan.php";
				    	

						}
				 	?>
				  </tbody>
				</table>
			</div>
		</div>
    </div>
</div>



 <!-- ======########====== DATATABLE JAVASCRIPS  =========########========= -->

 <!--Tnitialise the Datatable-->
<script type="text/javascript">
	$(document).ready(function () {
	    $('#loan-list-table').DataTable();
	});
</script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/datatables.min.js"></script>

