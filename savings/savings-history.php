
<!----------------TABLE----------------TABLE---------------TABLE---------------->

<div class="container-fluid p-4 bg-light" style="width: 100%; height: 90vh; overflow-y: scroll; overflow-x: hidden;">
    <div class="row">
        <div class="col-12">
            <div class="data_table p-3 shadow">
            	<div class="w-100 ">
            		<div class="row w-100">
                		<div class="col">
                			<h3 class="mb-2" style="color:#333333;">Savings History</h3>
                		</div>
	                	<div class="col dropdown d-flex justify-content-end">
						 	<?php include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/date-range-nav.php"; ?>
						</div>
					</div>
            	</div>
				<table id="savings-history" class="table table-hover table-bordered table-striped" style="color: #474747 !important;">
				  <thead class="website-color text-light">
				    <tr>
				     	<th>#</th>
				     	<th>Name</th>
				      	<th>Member ID</th>
				      	<th>Account No.</th>
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
						$sql2 = "SELECT * FROM savings_history WHERE date BETWEEN '$start_date' AND '$end_date' ORDER BY date desc";
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

						// GET THE ACCOUNT NUMBER
						$sql3 = "SELECT * FROM savings_account_list WHERE account_holder_id = $member_id";
						$query3 = mysqli_query($conn, $sql3);
						$row3 = mysqli_fetch_assoc($query3);

						if (mysqli_num_rows($query3) > 0) {
							$account_number = $row3['account_number'];
						} else {
							$account_number = "N/A";
						}
						
					 ?>
				    <tr>
				    	<td><?php echo $rowNum; ?></td>
				    	<td class="">
				    		<?php 
				    			if ($description === "Wallet Deposit" OR $description === "Wallet Withdraw") {
				    				echo '<span class="text-primary">ADMIN</span>';
				    			} else {
				    		?>
				    		<a class="text-decoration-none" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/savings/index.php?page=savings-individual-ledger&account_number=<?php echo $account_number; ?>"><?php echo $th_row2['lastname'].", ".$th_row2['firstname']." ".substr($th_row2['middlename'], 0, 1).".";3 ?>
				    		</a>
				    		<?php
				    			}
				    		 ?>
				    	</td>
				    	<td class="">
				    		<?php 
				    			if ($description === "Wallet Deposit" OR $description === "Wallet Withdraw") {
				    				echo "N/A";
				    			} else {
				    				echo $member_id;
				    			}
				    		?>
				    	</td>
				    	<td><?php echo $account_number; ?></td>
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

 <!--Tnitialise the Datatable-->
<script type="text/javascript">
	$(document).ready(function () {
	    $('#savings-history').DataTable();
	});
</script>

<!-- ============ Java Script Files  ================== -->
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/datatables.min.js"></script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/pdfmake/pdfmake.min.js"></script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/pdfmake/vfs_fonts.js"></script>