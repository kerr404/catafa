<?php
	if (isset($_GET['account_number'])) {
	$account_number = $_GET['account_number'];

	// GET the START DATE and END DATE
	$sql0 = "SELECT * FROM settings WHERE id = 1";
	$query0 = mysqli_query($conn, $sql0);
	$row0 = mysqli_fetch_assoc($query0);
	$start_date = $row0['date_range_start'];
	$end_date = $row0['date_range_end'];

	// QUERY the history based on START DATE and END DATE
	$sql = "SELECT * FROM savings_history WHERE account_number = $account_number AND (date BETWEEN '$start_date' AND '$end_date') ORDER BY date DESC";
	$query = mysqli_query($conn, $sql);

	$sql2 = "SELECT * FROM savings_account_list WHERE account_number = $account_number";
	$query2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_assoc($query2);
	$account_number = $row2['account_number'];
	$account_holder_id = $row2['account_holder_id'];

	$sql3 = "SELECT * FROM members WHERE member_id = $account_holder_id";
	$query3 = mysqli_query($conn, $sql3);
	$row3 = mysqli_fetch_assoc($query3);

 ?>    
<!-- =======  Data-Table  = Start  ========================== -->
<div class="container-fluid p-4" style="width: 100%; height: 90vh; overflow-y: scroll; overflow-x: hidden;">
    <div class="row">
        <div class="col-12">
            <div class="data_table p-3 shadow">
            	<div class="d-flex flex-row mb-3 align-items-center">
					<div class="">
						<button class="btn btn-light" onclick="history.back()"><i class="fas fa-arrow-left"></i></button>
					</div>
					<div class="mx-2 d-flex align-items-center">
						<h4 class="m-0 my-auto" style="color:#333333;">Savings Account History</h4>
					</div>
				</div>
            	<div class="row w-100">
					<div class="col">
	        			<h4 class="mb-2 text-primary" style="color:#333333;">
	        					<?php echo $row3['lastname'] . ", " . $row3['firstname'] . " " . substr($row3['middlename'], 0, 1) . ".";  ?>
	        			</h4>
	        			<span class="text-secondary">Account Number: <?php echo $account_number; ?></span>
	        			<span class="text-secondary">&nbsp&nbsp&nbspMember ID: <?php echo $account_holder_id; ?></span>
	        		</div>
	        		<div class="col dropdown d-flex justify-content-end">
					 	<?php include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/date-range-nav.php"; ?>
					</div>
				</div>
			<hr class="text-secondary">
            <table id="individual-savings-history" class="table table-striped table-hover table-bordered">
                <thead class="website-color text-light">
                    <tr>
                     	<th>#</th>
				      	<th>Type</th>
				      	<th>Amount</th>
				      	<th>Ref. No.</th>
				      	<th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
				  		$rowNum = 0;
				  		while ($row = mysqli_fetch_assoc($query)) {
				  			$rowNum = $rowNum + 1;
				  			$amount = $row['debit'] + $row['credit'];
				  			$description = $row['description'];
				  			$date = $row['date'];
				  			$ref_no = $row['ref_no'];
				  	 ?>
				    <tr>
				      <td><?php echo $rowNum; ?></td>
				      <td>
				      	<?php 
				      		echo $description;
				      	?>
				      </td>
				      <td>₱<?php echo number_format($amount, 2, '.', ','); ?></td>
				      <td><?php echo $ref_no; ?></td> 	    
				      <td><?php echo date("F j, Y \a\\t g:i A", strtotime($date)); ?></td>
				    </tr>
                    <?php 
                        }
                     ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <?php 
    	}
     ?>

 <!-- ======########====== DATATABLE JAVASCRIPS  =========########========= -->

 <!--Tnitialise the Datatable-->
<script type="text/javascript">
	$(document).ready(function () {
	    $('#individual-savings-history').DataTable();
	});
</script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/datatables.min.js"></script>
