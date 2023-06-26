<?php 
	$page_title = "Member Activity Log";
 ?>

<?php
	if (isset($_GET['member_id'])) {
	$member_id = $_GET['member_id'];

	// GET the name of the Member
	$sql00 = "SELECT * FROM members WHERE member_id = $member_id";
	$query00 = mysqli_query($conn, $sql00);
	$row00 = mysqli_fetch_assoc($query00);

	// GET the START DATE and END DATE
	$sql0 = "SELECT * FROM settings WHERE id = 1";
	$query0 = mysqli_query($conn, $sql0);
	$row0 = mysqli_fetch_assoc($query0);
	$start_date = $row0['date_range_start'];
	$end_date = $row0['date_range_end'];

	// QUERY the history based on START DATE and END DATE
	$sql = "SELECT * FROM transaction_history WHERE member_id = $member_id AND date BETWEEN '$start_date' AND '$end_date' ORDER BY date DESC";
	$query = mysqli_query($conn, $sql);
 ?>    
<div class="container-fluid">
    <!-- =======  Data-Table  = Start  ========================== -->
    <div class="container-fluid p-2" style="width: 100%; height: 90vh; overflow-y: scroll; overflow-x: hidden;">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
					<div class="row w-100">
						<div class="col">
							<h3 class="mb-2 text-primary" style="color:#333333;">
									<?php echo $row00['lastname'] . ", " . $row00['firstname'] . " " . substr($row00['middlename'], 0, 1) . ".";  ?>
							</h3>
							<span class="text-secondary">Member ID: <?php echo $member_id; ?></span>
						</div>
						<div class="col dropdown d-flex justify-content-end">
							<div>
								<?php include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/date-range-nav.php"; ?>
							</div>
						</div>
					</div>
					<hr class="text-secondary">
                    <table id="example" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                             	<th>#</th>
						     	<th>Type</th>
						      	<th>Amount</th>
						      	<th>Ref no.</th>
						      	<th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
						  		$rowNum = 0;
						  		while ($row = mysqli_fetch_assoc($query)) {
						  			$rowNum = $rowNum + 1;
						  			$amount = $row['debit'] + $row['credit'];
						  			$date = $row['date'];
						  			$ref_no = $row['ref_no'];
						  			$member_id = $row['account'];
						  	 ?>
						    <tr>
						      <td><?php echo $rowNum; ?></td>
						      <td><?php echo $row['description']; ?></td>
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
    </div>
</div>
    <?php 
    	}
     ?>

<!-- ============ Java Script Files  ================== -->
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/datatables.min.js"></script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/pdfmake/pdfmake.min.js"></script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/pdfmake/vfs_fonts.js"></script>
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/custom.js"></script>