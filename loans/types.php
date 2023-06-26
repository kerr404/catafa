<?php
	// MODAL
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/add-loan-type.php"
 ?>

	

<!----------------TABLE----------------TABLE---------------TABLE---------------->
<div class="container-fluid p-2" style="width: 100%; height: 80vh; overflow-y: scroll; overflow-x: hidden;">
    <div class="row">
        <div class="col-12">
            <div class="data_table">
            	<h4 class="" style="color:#333333;">
            		<span>Loan Types</span>
            		<span>
            			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-loan-type-modal">
            				<i class="fas fa-plus fa-lg"></i>
            			</button>
            		</span>
           		</h4>
				<table id="loan-types-table" class="table table-hover table-bordered table-striped">
				  <thead>
				    <tr>
				     	<th>#</th>
				      	<th>Loan Type</th>
				     	<th>Description</th>
				      	<th>Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  		$rowNum = 0; 
						$sql = "SELECT * FROM loan_type";
						$query = mysqli_query($conn, $sql);
						while ($row = mysqli_fetch_assoc($query)) {
						$id = $row['id'];
						$rowNum = $rowNum + 1;
					 ?>
				    <tr>
				      	<td><?php echo $rowNum ?></td>
				      	<td><?php echo $row['loan_type_name']; ?></td>
				     	<td><?php echo $row['description'];?></td>
				     	<td>
							<a class="m-0 btn btn-sm btn-primary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
							    Action
							</a>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							    <li>
							    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit-loan-type-modal<?php echo $id; ?>">
							    		<span class="mx-2">
							    			<i class="far fa-edit text-success"></i>
							    		</span>
							    		<span>Edit</span>
							    	</button>
							    </li>
							    <li>
							    	<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete-loan-type-modal<?php echo $id; ?>">
							    		<span class="mx-2">
							    			<i class="fas fa-trash-alt text-danger"></i>
							    		</span>
							    		<span>Delete</span>
							    	</button>
							    </li>
							</ul>
				      	</td>
				    </tr>
				    <!--------------------MODALS------------------------>
				    <?php
				    	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/delete-loan-type.php";
				    	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/edit-loan-type.php";
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
	    $('#loan-types-table').DataTable();
	});
</script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/datatables.min.js"></script>
