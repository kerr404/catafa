<script type="text/javascript">
	//Removes get methods when page is reloaded
	if (performance.navigation.type === 1) {
  // The page was reloaded
  window.location.href = 'index.php';
}
</script>

<!--ADD Success Message-->
<?php if(isset($_GET['add']) AND $_GET['add'] == 'success') { ?>
	<script>
		$( document ).ready(function() {
			$('#add-success').modal('show');
				$('#add-success').modal('show');
		setTimeout(function() {
			$('#add-success').modal('hide');
		}, 2000); // 1 seconds delay  
		});
	</script>
<?php } ?>
<div id="add-success" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h3 class="text-success m-0">Successfully added!</h3>
			</div>
		</div>
	</div>
</div>

<!--ADD Failed Message-->
<?php if(isset($_GET['add']) AND $_GET['add'] == 'failed') { ?>
	<script>
		$( document ).ready(function() {
			$('#add-failed').modal('show');
				$('#add-failed').modal('show');
		setTimeout(function() {
			$('#add-failed').modal('hide');
		}, 2000); // 1 seconds delay  
		});
	</script>
<?php } ?>
<div id="add-failed" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h4 class="text-danger m-0">Failed to add member!</h4>
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
				<h4 class="text-success m-0">Successfully deleted!</h4>
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

<!--Approve Success Message-->
<?php if(isset($_GET['approve']) AND $_GET['approve'] == 'success') { ?>
	<script>
		$( document ).ready(function() {
			$('#approve-success').modal('show');
				$('#approve-success').modal('show');
		setTimeout(function() {
			$('#approve-success').modal('hide');
		}, 2000); // 1 seconds delay  
		});
	</script>
<?php } ?>
<div id="approve-success" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h4 class="text-success m-0">Successfully Approved!</h4>
			</div>
		</div>
	</div>
</div>

<!--Approve Failed Message-->
<?php if(isset($_GET['approve']) AND $_GET['approve'] == 'failed') { ?>
	<script>
		$( document ).ready(function() {
			$('#approve-failed').modal('show');
				$('#approve-failed').modal('show');
		setTimeout(function() {
			$('#approve-failed').modal('hide');
		}, 2000); // 1 seconds delay  
		});
	</script>
<?php } ?>
<div id="approve-failed" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h4 class="text-danger m-0">Approval Failed!</h4>
			</div>
		</div>
	</div>
</div>



<!-- =======  Data-Table  = Start  ========================== -->
<div class="container-fluid p-4 bg-light" style="width: 100%; height: 92vh; overflow-y: scroll; overflow-x: hidden;">
    <div class="row">
        <div class="col-12">
            <div class="data_table p-3 shadow">
            	<div class="row">
            		<div class="d-flex flex-row mb-2 align-items-center">
						<div class="mx-2 d-flex align-items-center">
							<h4 class="col mb-2" style="color: #333333;">
		            		<span>Members list</span>
			            		<span>
			            			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-member-modal" title="Add New Member">
			            				<i class="fas fa-plus fa-lg"></i>
			            			</button>
			            		</span>
		            		</h4>
						</div>
						<div class="col mx-4 d-flex justify-content-end">
	            			<div>
							<div class="dropdown">
								<button class="btn btn-light btn-sm border" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
									Print
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<a type="button" class="dropdown-item" href="print/personal-data.php" id="print-button">Personal Data</a>
								</ul>
								</div>
	            			</div>
	            		</div>
					</div>
            	</div>
				<table id="member-list-table" class="table table-hover table-bordered" style="color: #474747 !important;">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Member ID</th>
							<th>Mobile Number</th>
							<th>Status</th>
							<th>Manage</th>
						</tr>
					</thead>
					<tbody id="table-body">
						<?php
							$rowNum = 0; 
							if ($resultCheck > 0) {
								while ($row = mysqli_fetch_assoc($query)) {
									$rowNum = $rowNum + 1;
									$id = $row['id'];
									$member_id = $row['member_id'];
									$firstName = $row['firstname'];
									$middleName = $row['middlename'];
									$lastName = $row['lastname'];
									$age = $row['age'];
									$gender = $row['gender'];
									$phoneNumber = $row['mobile_number'];
									$province = $row['province'];
									$city = $row['city'];
									$barangay = $row['barangay'];
									$status = $row['status'];
									$land = $row['land_area'];

									// Check if a member has a Loan 
									$sql2 = "SELECT * FROM loan_list WHERE borrower_id = $member_id ";
									$query2 = mysqli_query($conn, $sql2);
									$row2 = mysqli_fetch_assoc($query2);
									$loanCheck = mysqli_num_rows($query2);
									if ($loanCheck > 0) {
										$loan_id = $row2['ref_no'];
									}
									

									// Check if a member has a Savings account
									$sql3 = "SELECT * FROM savings_account_list WHERE account_holder_id = $member_id";
									$query3 = mysqli_query($conn, $sql3);
									//$savings = mysqli_num_rows($query3);

						 ?>
						<tr>
							<td class="align-middle" id="id-table-column"><?php echo $rowNum ?></td>
							<td class="align-middle">
								<a type="button" class="text-decoration-none" title="View Member" data-bs-toggle="modal" data-bs-target="#view-member<?php echo $id; ?>">
									<?php echo $lastName.", ".$firstName." ".substr($middleName, 0, 1)."."; ?>
								</a>
							</td>
							<td class="align-middle">
								<?php echo substr($member_id, 0, 3) . "-" . substr($member_id, -3); ?>
							</td>
							<td class="align-middle">
								<?php echo substr($phoneNumber, 0, 4) . '-' . substr($phoneNumber, 4, 3) . '-' . substr($phoneNumber, 7, 4);
								?>			
							</td>

							<td class="align-middle">
								<?php 
									if ($status == 1) {
										echo '<button class="btn btn-success btn-sm rounded-pill" style="font-size: 0.75rem; padding: 0.1rem 0.4rem; width: 60px;" title="Active Member">Active</button>';
									} else {
										echo '<button class="btn btn-warning btn-sm rounded-pill" style="font-size: 0.75rem; padding: 0.1rem 0.4rem; width: 60px;" title="Waiting for approval">Pending</button>';
									}
								 ?>
							</td>
							<td class="align-middle">
								<!--Show if Already Released-->
							  	<a class="m-0 btn btn-sm btn-primary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" title="Manage Member">
								    Manage
								</a>
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
								<ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuLink">
									<?php 
										if ($status == 0) {

									?>
									<li>
								    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#approve-member-modal<?php echo $id; ?>">
								    		<span class="mx-2">
								    			<i class="fas fa-check"></i>
								    		</span>
								    		<span>Approve</span>
								    	</button>
								    </li>
								    <div class="dropdown-divider"></div>
									<?php
										}
									 ?>
								    <li>
								    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#view-member<?php echo $id; ?>">
								    		<span class="mx-2">
								    			<i class="far fa-eye text-primary"></i>
								    		</span>
								    		<span>View</span>
								    	</button>
								    </li>
								    <li>
								    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-member<?php echo $id; ?>">
								    		<span class="mx-2">
								    			<i class="fas fa-edit text-success"></i>
								    		</span>
								    		<span>Edit</span>
								    	</button>
								    </li>
								    <li>
								    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id; ?>">
								    		<span class="mx-2">
								    			<i class="fas fa-trash-alt text-danger"></i>
								    		</span>
								    		<span>Delete</span>
								    	</button>
								    </li>
								</ul>
							</td>
						</tr>

						<!--MODALS-->
						<?php
							include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/approve-member.php"; 
							include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/edit-member.php";
							include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/delete-member.php";
							include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/view-member.php";
							include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/add-member.php"; 

						//closing for WHILE Loop
							}
						//closing for Result
						}
						 ?>
					</tbody>
				</table>
				</div>
	    	</div>
	    </div>
	</div>

 <!-- ============ DATATABLE JAVASCRIPS  ================== -->


 <!--Tnitialise the Datatable-->
<script type="text/javascript">
	$(document).ready(function () {
	    $('#member-list-table').DataTable();
	});
</script>


<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/datatables.min.js"></script>
