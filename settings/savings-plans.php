<script type="text/javascript">
	//Removes get methods when page is reloaded
	if (performance.navigation.type === 1) {
  // The page was reloaded
  window.location.href = 'index.php?page=savings-plans';
}
</script>

<!--MODALS-->
<?php
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/add-savings-plan.php" 
?>

<!---Add Plan Success Message-->
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
				<h4 class="text-danger m-0">Failed to add Savings Plan!</h4>
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

<!--Delete Plan Failed Message-->
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

<!---Savings Plan Limit-->
<?php 
	$sql0 = "SELECT * FROM savings_plan";
	$query0 = mysqli_query($conn, $sql0);
	$plan_num = mysqli_num_rows($query0);
 ?>

<div id="plan-no-limit" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h5 class="text-danger m-0">You can only create one savings plan!</h5>
			</div>
		</div>
	</div>
</div>

<!-- Add Loan Plan - Enter Password-->
<div class="modal fade" id="add-savings-plan-password" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <div class="w-100 d-flex justify-content-end">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="form-group mb-3 px-5">
            <h5 class="modal-title text-center">Enter password to continue.</h5>
            <input  type="password" class="mt-2 form-control" placeholder="Enter password" id="add-savings-password" required>
            <span id="add-savings-error-message" class="text-danger"></span>
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
      var pass = $("#add-savings-password").val();
      $.ajax({
        type: "POST",
        url: "verify_password.php",
        data: {pass: pass},
        success: function(data) {
          if (data == "success") {
            $("#add-savings-plan-password").modal('hide');
            $("#add-savings-plan-modal").modal('show');
          } else{
            $("#add-savings-error-message").text("Incorrect password");
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
            	<span>Savings savings</span>
            	<span>
        			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="<?php if ($plan_num == 0) {echo '#add-savings-plan-password';} else {echo '#plan-no-limit';} ?>">
        				<i class="fas fa-plus fa-lg"></i>
        			</button>
            	</span>
            </h4>
			<table id="savings-plan-table" class="table table-hover table-bordered">
			  <thead>
			    <tr>
			     	<th>#</th>
			      <th>Plan name</th>
			     	<th>Interest</th>
			     	<th>Interest Crediting Freq.</th>
			     	<th>Interest Crediting Day</th>
			      <th>Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		$rowNum = 0; 
					$sql = "SELECT * FROM savings_plan";
					$query = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($query)) {
					$id = $row['id'];
					$plan_name = $row['plan_name'];
					$interest = $row['interest_percentage'];
					$crediting_freq = $row['interest_crediting_freq'];
					$crediting_day_1 = $row['crediting_day_1'];
					$crediting_day_2 = $row['crediting_day_2'];
					$rowNum = $rowNum + 1;

					/*
					//Check if the PLAN is In-use
					$sql2 = "SELECT * FROM loan_list WHERE loan_plan = $id";
					$query2 = mysqli_query($conn, $sql2);
					$status = mysqli_num_rows($query2);
					*/
				 ?>
			    <tr>
			      <td><?php echo $rowNum ?></td>
			      <td><?php echo $plan_name ?></td>
			     	<td><?php echo $interest?>%</td>
			     	<td>
			     		<?php 
			     			if ($crediting_freq == 1) {
			     				echo "Monthly";
			     			} else if ($crediting_freq == 2) {
			     				echo "Bi-Weekly";
			     			} else {
			     				echo "Weekly";
			     			}
			     		 ?>
			     	</td>
			     	<td>
			     		<?php 
			     		function addOrdinalSuffix($number) {
								    if (in_array(($number % 100), array(11, 12, 13))) {
								        return $number . 'th';
								    } else {
								        switch ($number % 10) {
								            case 1:
								                return $number . 'st';
								            case 2:
								                return $number . 'nd';
								            case 3:
								                return $number . 'rd';
								            default:
								                return $number . 'th';
								        }
								    }
								}

			     			if ($crediting_freq == 1) {
			     				echo addOrdinalSuffix($crediting_day_1).' day of the month';
			     			} else {
			     				echo addOrdinalSuffix($crediting_day_1).' and '.addOrdinalSuffix($crediting_day_2).' day of the month';
			     			}

			     		 ?>
			     	</td>
			     	<td>
					  	<!--Show if Already Released-->
					  	<a class="m-0 btn btn-sm btn-primary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
						    Action
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						    <button class="dropdown-item <?php if ($status > 0) {echo "disabled";} ?>" data-bs-toggle="modal" data-bs-target="#delete-savings-plan-password<?php echo $id;?>">
						    		<span class="mx-2">
						    			<i class="fas fa-trash-alt text-danger"></i>
						    		</span>
						    		<span>Delete</span>
						    </button>
						</ul>

						
						<!-- DELETE Loan Plan - Enter Password-->
						<div class="modal fade" id="delete-savings-plan-password<?php echo $id;?>" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-body">
						          <div class="w-100 d-flex justify-content-end">
						            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						          </div>
						          <div class="form-group mb-3 px-5">
						            <h5 class="modal-title text-center">Enter password to continue.</h5>
						            <input  type="password" class="mt-2 form-control" placeholder="Enter password" id="delete-savings-password<?php echo $id;?>" required>
						            <span id="delete-savings-error-message<?php echo $id;?>" class="text-danger"></span>
						          </div>
						          <div class="w-100 d-flex justify-content-center">
						            <button id="delete-plan-pass-submit<?php echo $id;?>" class="btn btn-success my-0">Continue</button>
						          </div>
						      </div>
						    </div>
						  </div>
						</div>

						<!-- DELETE Loan Plan - Enter Password Ajax-->
						<script>
						  $(document).ready(function() {
						    //prevent the form from submitting
						    $("#delete-plan-pass-submit<?php echo $id;?>").click(function(event) {
						      event.preventDefault();
						    });

						    // Verify the Password
						    $("#delete-plan-pass-submit<?php echo $id;?>").click(function() {
						      var pass = $("#delete-savings-password<?php echo $id;?>").val();
						      $.ajax({
						        type: "POST",
						        url: "verify_password.php",
						        data: {pass: pass},
						        success: function(data) {
						          if (data == "success") {
						            $("#delete-savings-plan-password<?php echo $id;?>").modal('hide');
						            $("#delete-savings-plan<?php echo $id; ?>").modal('show');
						          } else{
						            $("#delete-savings-error-message<?php echo $id;?>").text("Incorrect password");
						          }
						        },
						        error: function() {
						          alert("Error");
						        }
						      });
						    })
						  });
						</script>
						
						<!-- EDIT Loan Plan - Enter Password-->
						<div class="modal fade" id="edit-savings-plan-password<?php echo $id;?>" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-body">
						          <div class="w-100 d-flex justify-content-end">
						            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						          </div>
						          <div class="form-group mb-3 px-5">
						            <h5 class="modal-title text-center">Enter password to continue.</h5>
						            <input  type="password" class="mt-2 form-control" placeholder="Enter password" id="edit-savings-password<?php echo $id;?>" required>
						            <span id="edit-savings-error-message<?php echo $id;?>" class="text-danger"></span>
						          </div>
						          <div class="w-100 d-flex justify-content-center">
						            <button id="edit-plan-pass-submit<?php echo $id;?>" class="btn btn-success my-0">Continue</button>
						          </div>
						      </div>
						    </div>
						  </div>
						</div>

						<!-- EDIT Loan Plan - Enter Password Ajax-->
						<script>
						  $(document).ready(function() {
						    //prevent the form from submitting
						    $("#edit-plan-pass-submit<?php echo $id;?>").click(function(event) {
						      event.preventDefault();
						    });

						    // Verify the Password
						    $("#edit-plan-pass-submit<?php echo $id;?>").click(function() {
						      var pass = $("#edit-savings-password<?php echo $id;?>").val();
						      $.ajax({
						        type: "POST",
						        url: "verify_password.php",
						        data: {pass: pass},
						        success: function(data) {
						          if (data == "success") {
						            $("#edit-savings-plan-password<?php echo $id;?>").modal('hide');
						            $("#edit-savings-plan<?php echo $id; ?>").modal('show');
						          } else{
						            $("#edit-savings-error-message<?php echo $id;?>").text("Incorrect password");
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
			    	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/delete-savings-plan.php";
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
	    $('#savings-plan-table').DataTable();
	});
</script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/datatables.min.js"></script>
