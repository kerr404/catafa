<script type="text/javascript">
	//Removes get methods when page is reloaded
	if (performance.navigation.type === 1) {
  // The page was reloaded
  window.location.href = 'index.php?page=loan-plans';
}
</script>

<!--MODALS-->
<?php
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/add-loan-plan.php" 
?>

<!---Add plan Success Message-->
<?php if(isset($_GET['add']) AND $_GET['add'] == 'success') { ?>
	<script>
		$( document ).ready(function() {
		    $('#add-success').modal('show');
		     $('#add-success').modal('show');
        setTimeout(function() {
            $('#add-success').modal('hide');
        }, 1500); // 1.5 seconds delay  
		});
	</script>
<?php } ?>
<div id="add-success" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h4 class="text-success m-0">Successfully added!</h4>
			</div>
		</div>
	</div>
</div>

<!---Add plan Failed Message-->
<?php if(isset($_GET['add']) AND $_GET['add'] == 'failed') { ?>
	<script>
		$( document ).ready(function() {
		    $('#add-failed').modal('show');
		     $('#add-failed').modal('show');
        setTimeout(function() {
            $('#add-failed').modal('hide');
        }, 1500); // 1.5 seconds delay  
		});
	</script>
<?php } ?>
<div id="add-failed" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h4 class="text-danger m-0">Failed to add Loan Plan!</h4>
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

<!---Delete plan Success Message-->
<?php if(isset($_GET['delete']) AND $_GET['delete'] == 'success') { ?>
	<script>
		$( document ).ready(function() {
		    $('#delete-success').modal('show');
		     $('#delete-success').modal('show');
        setTimeout(function() {
            $('#delete-success').modal('hide');
        }, 1500); // 1.5 seconds delay  
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

<!---Delete plan Failed Message-->
<?php if(isset($_GET['delete']) AND $_GET['delete'] == 'failed') { ?>
	<script>
		$( document ).ready(function() {
		    $('#delete-failed').modal('show');
		     $('#delete-failed').modal('show');
        setTimeout(function() {
            $('#delete-failed').modal('hide');
        }, 1500); // 1.5 seconds delay  
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

<!-- Add Loan Plan - Enter Password-->
<div class="modal fade" id="add-loan-plan-password" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <div class="w-100 d-flex justify-content-end">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="form-group mb-3 px-5">
            <h5 class="modal-title text-center">Enter password to continue.</h5>
            <input  type="password" class="mt-2 form-control" placeholder="Enter password" id="add-loan-password" required>
            <span id="add-loan-error-message" class="text-danger"></span>
          </div>
          <div class="w-100 d-flex justify-content-center">
            <button id="add-plan-pass-submit" class="btn btn-success my-0">Continue</button>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Loan Plan - Enter Password Ajax-->
<script>
  $(document).ready(function() {
    //prevent the form from submitting
    $("#add-plan-pass-submit").click(function(event) {
      event.preventDefault();
    });

    // Verify the Password
    $("#add-plan-pass-submit").click(function() {
      var pass = $("#add-loan-password").val();
      $.ajax({
        type: "POST",
        url: "verify_password.php",
        data: {pass: pass},
        success: function(data) {
          if (data == "success") {
            $("#add-loan-plan-password").modal('hide');
            $("#add-loan-plan-modal").modal('show');
          } else{
            $("#add-loan-error-message").text("Incorrect password");
          }
        },
        error: function() {
          alert("Error");
        }
      });
    })
  });
</script>


<!----------------TABLE----------------TABLE---------------TABLE---------------->
<div class="container-fluid p-2" style="width: 100%; height: 80vh; overflow-y: scroll; overflow-x: hidden;">
    <div class="row">
        <div class="col-12">
            <div class="data_table">
            <h4 style="color:#333333;">
            	<span>Loan plans</span>
            	<span>
        			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-loan-plan-password">
        				<i class="fas fa-plus fa-lg"></i>
        			</button>
            	</span>
            </h4>
			<table id="loan-plans-table" class="table table-hover table-bordered">
			  <thead>
			    <tr>
			     	<th>#</th>
			      	<th>Plan name</th>
			     	<th>Months</th>
			     	<th>Interest</th>
			     	<th>Penalty</th>
			     	<th>Payment Freq.</th>
			     	<th>Repayment Method</th>
			     	<th>Status</th>
			      	<th>Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		$rowNum = 0; 
					$sql = "SELECT * FROM loan_plan";
					$query = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($query)) {
					$id = $row['id'];
					$rowNum = $rowNum + 1;

					//Check if the PLAN is In-use
					$sql2 = "SELECT * FROM loan_list WHERE loan_plan = $id";
					$query2 = mysqli_query($conn, $sql2);
					$status = mysqli_num_rows($query2);
				 ?>
			    <tr>
			      	<td><?php echo $rowNum ?></td>
			      	<td><?php echo $row['plan_name']; ?></td>
			     	<td><?php echo $row['months'];?>&nbspMonths</td>
			     	<td><?php echo $row['interest_percentage'];?>%</td>
			     	<td><?php echo $row['penalty_rate'];?>%</td>
			     	<td>
			     		<?php 
			     			if ($row['payment_frequency'] == 1) {
			     				echo "Monthly";
			     			} else if ($row['payment_frequency'] == 2) {
			     				echo "Bi-Weekly";
			     			} else {
			     				echo "Weekly";
			     			}
			     		 ?>
			     	</td>
			     	<td>
			     		<?php 
			     			if ($row['repayment_method'] == 1) {
			     				echo "Amortization";
			     			} else {
			     				echo "Interest-only";
			     			}
			     		 ?>
			     	</td>
			     	<td>
	     				<?php 
							if ($status > 0) {
								echo '<button class="btn btn-success btn-sm" style="font-size: 0.75rem; padding: 0.1rem 0.4rem;">In use</button>';
							} else {
								echo '<button class="btn btn-danger btn-sm" style="font-size: 0.75rem; padding: 0.1rem 0.4rem;">Unused</button>';
							}
						 ?>
			     	</td>
			     	<td>
					  	<!--Show if Already Released-->
					  	<a class="m-0 btn btn-sm btn-primary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
						    Action
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						    <li>
						    	<button class="dropdown-item <?php if ($status > 0) {echo "disabled";} ?>" data-bs-toggle="modal" data-bs-target="#edit-loan-plan-password<?php echo $id;?>">
						    		<span class="mx-2">
						    			<i class="fas fa-edit text-success"></i>
						    		</span>
						    		<span>Edit</span>
						    	</button>
						    </li>
						    <button class="dropdown-item <?php if ($status > 0) {echo "disabled";} ?>" data-bs-toggle="modal" data-bs-target="#delete-loan-plan-password<?php echo $id;?>">
						    		<span class="mx-2">
						    			<i class="fas fa-trash-alt text-danger"></i>
						    		</span>
						    		<span>Delete</span>
						    </button>
						</ul>

						
						<!-- EDIT Loan Plan - Enter Password-->
						<div class="modal fade" id="delete-loan-plan-password<?php echo $id;?>" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-body">
						          <div class="w-100 d-flex justify-content-end">
						            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						          </div>
						          <div class="form-group mb-3 px-5">
						            <h5 class="modal-title text-center">Enter password to continue.</h5>
						            <input  type="password" class="mt-2 form-control" placeholder="Enter password" id="delete-loan-password<?php echo $id;?>" required>
						            <span id="delete-loan-error-message<?php echo $id;?>" class="text-danger"></span>
						          </div>
						          <div class="w-100 d-flex justify-content-center">
						            <button id="delete-plan-pass-submit<?php echo $id;?>" class="btn btn-success my-0">Continue</button>
						          </div>
						      </div>
						    </div>
						  </div>
						</div>

						<!-- EDIT Loan Plan - Enter Password Ajax-->
						<script>
						  $(document).ready(function() {
						    //prevent the form from submitting
						    $("#delete-plan-pass-submit<?php echo $id;?>").click(function(event) {
						      event.preventDefault();
						    });

						    // Verify the Password
						    $("#delete-plan-pass-submit<?php echo $id;?>").click(function() {
						      var pass = $("#delete-loan-password<?php echo $id;?>").val();
						      $.ajax({
						        type: "POST",
						        url: "verify_password.php",
						        data: {pass: pass},
						        success: function(data) {
						          if (data == "success") {
						            $("#delete-loan-plan-password<?php echo $id;?>").modal('hide');
						            $("#delete-loan-plan<?php echo $id; ?>").modal('show');
						          } else{
						            $("#delete-loan-error-message<?php echo $id;?>").text("Incorrect password");
						          }
						        },
						        error: function() {
						          alert("Error");
						        }
						      });
						    })
						  });
						</script>
						
						<!-- DELETE Loan Plan - Enter Password-->
						<div class="modal fade" id="edit-loan-plan-password<?php echo $id;?>" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-body">
						          <div class="w-100 d-flex justify-content-end">
						            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						          </div>
						          <div class="form-group mb-3 px-5">
						            <h5 class="modal-title text-center">Enter password to continue.</h5>
						            <input  type="password" class="mt-2 form-control" placeholder="Enter password" id="edit-loan-password<?php echo $id;?>" required>
						            <span id="edit-loan-error-message<?php echo $id;?>" class="text-danger"></span>
						          </div>
						          <div class="w-100 d-flex justify-content-center">
						            <button id="edit-plan-pass-submit<?php echo $id;?>" class="btn btn-success my-0">Continue</button>
						          </div>
						      </div>
						    </div>
						  </div>
						</div>

						<!-- DELETE Loan Plan - Enter Password Ajax-->
						<script>
						  $(document).ready(function() {
						    //prevent the form from submitting
						    $("#edit-plan-pass-submit<?php echo $id;?>").click(function(event) {
						      event.preventDefault();
						    });

						    // Verify the Password
						    $("#edit-plan-pass-submit<?php echo $id;?>").click(function() {
						      var pass = $("#edit-loan-password<?php echo $id;?>").val();
						      $.ajax({
						        type: "POST",
						        url: "verify_password.php",
						        data: {pass: pass},
						        success: function(data) {
						          if (data == "success") {
						            $("#edit-loan-plan-password<?php echo $id;?>").modal('hide');
						            $("#edit-loan-plan<?php echo $id; ?>").modal('show');
						          } else{
						            $("#edit-loan-error-message<?php echo $id;?>").text("Incorrect password");
						          }
						        },
						        error: function() {
						          alert("Error");
						        }
						      });
						    })
						  });
						</script>

						
			     	</td>
			    </tr>
			    <!--------------------MODALS------------------------>
			    <?php
			    	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/edit-loan-plan.php";
			    	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/delete-loan-plan.php";
			     ?>
			    <?php 	
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
	    $('#loan-plans-table').DataTable();
	});
</script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/datatables.min.js"></script>
