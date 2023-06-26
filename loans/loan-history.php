
<!----------------TABLE----------------TABLE---------------TABLE---------------->

<div class="container-fluid p-4" style="width: 100%; height: 90vh; overflow-y: scroll; overflow-x: hidden;">
    <div class="row">
        <div class="col-12">
            <div class="data_table pt-3 p-4 shadow">					
    		<div class="d-flex flex-row mb-2 align-items-center">
    			<h4 class="my-0" style="color:#333333;">Loan History</h4>
            	<div class="col dropdown d-flex justify-content-end">
				 	<?php include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/date-range-nav.php"; ?>
				</div>
			</div>
			<div id="loan-history-table">
				<table id="loan-history" class="table table-hover table-bordered table-striped" style="color: #474747 !important;">
				  <thead class="website-color text-light">
				    <tr>
				     	<th>#</th>
				     	<th>Name</th>
				      	<th>Member ID</th>
				      	<th>Loan ID</th>
				     	<th>Description</th>
				     	<th>Amount</th>
				      	<th>Ref. No.</th>
				      	<th>Date</th>
				    </tr>
				  </thead>
				  <tbody>
				    <?php 
				    	$sql = "SELECT * FROM members";
				    	$result = mysqli_query($conn, $sql);

				    	// GET the START DATE and END DATE
						$sql0 = "SELECT * FROM settings WHERE id = 1";
						$query0 = mysqli_query($conn, $sql0);
						$row0 = mysqli_fetch_assoc($query0);
						$start_date = $row0['date_range_start'];
						$end_date = $row0['date_range_end'];

						// QUERY the history based on START DATE and END DATE
						$sql2 = "SELECT * FROM loan_history WHERE date BETWEEN '$start_date' AND '$end_date' ORDER BY date desc";
						$query2 = mysqli_query($conn, $sql2);

						$rowNum = 0;
						while ($row2 = mysqli_fetch_assoc($query2)) {
						$rowNum = $rowNum + 1;
						$id = $row2['id'];
						$member_id = $row2['member_id'];
						$description = $row2['description'];
						$amount = $row2['debit'] + $row2['credit'];
						$ref_no = $row2['ref_no'];
						$date = $row2['date'];


						//GET the name of the account holder using account_holder_id
						$th_sql2 = "SELECT * FROM members WHERE member_id = $member_id";
						$th_query2 = mysqli_query($conn, $th_sql2);
						$th_row2 = mysqli_fetch_assoc($th_query2);

						// GET THE LOAN ID
						$sql3 = "SELECT * FROM loan_list WHERE borrower_id = $member_id";
						$query3 = mysqli_query($conn, $sql3);
						$row3 = mysqli_fetch_assoc($query3);

						if (mysqli_num_rows($query3) > 0) {
							$loan_id = $row3['ref_no'];
						} else {
							$loan_id = "N/A";
						}
						
					 ?>
				    <tr>
				    	<td><?php echo $rowNum; ?></td>
				    	<td class="">
				    		<?php 
				    			if ($description === "Fund Deposit" OR $description === "Fund Withdraw") {
				    				echo '<span class="text-primary">Admin</span>';
				    			} else {
				    		?>
							<a class="text-decoration-none" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/loans/index.php?page=loan-individual-history&loan_id=<?php echo $loan_id; ?>"><?php echo $th_row2['lastname'].", ".$th_row2['firstname']." ".substr($th_row2['middlename'], 0, 1)."."; ?>				
				    		</a>
				    		<?php
				    			}
				    		 ?>
				    		
				    	</td>
				    	<td class="">
				    		<?php 
				    			if ($description === "Fund Deposit" OR $description === "Fund Withdraw") {
				    				echo "N/A";
				    			} else {
				    				echo $member_id;
				    			}
				    		?>
				    		
				    		
				    	</td>
				    	<td><?php echo $loan_id; ?></td>
				     	<td class=""><?php echo $description ?></td>
				     	<td class="">
				     		<?php
				     			if ($row2['debit'] < $row2['credit']) {
				     				echo "-";
				     			}
				     			echo "₱".number_format($amount, 2, '.', ','); 
				     		?>
				     		
				     	</td>
				     	<td class=""><?php echo $ref_no ?></td>
				     	<td class=""><?php echo date("F j, Y \a\\t g:i A", strtotime($date)); ?></td>
				    </tr>
				    <!--------------------MODALS------------------------>
				    <?php


						}
				    ?> 		
				  </tbody>
				</table>
				</div>
			</div>
        </div>
    </div>
</div>

 <!--Initialise the Datatable-->
<script type="text/javascript">
	$(document).ready(function () {
	    $('#loan-history').DataTable();
	});
</script>
<!-- ============ Java Script Files  ================== -->
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/datatables.min.js"></script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/pdfmake/pdfmake.min.js"></script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/pdfmake/vfs_fonts.js"></script>