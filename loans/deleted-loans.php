<?php

	$sql = "SELECT * FROM loan_list ORDER BY date DESC";
	$query = mysqli_query($conn, $sql);

 ?>    
<div class="container-fluid shadow bg-light">
 		<header class="header_part p-2 m-1 border-bottom">
        <h4>History</h4>
    </header>
    <!-- =======  Data-Table  = Start  ========================== -->
    <div class="container p-2" style="width: 100%; height: 78vh; overflow-y: scroll; overflow-x: hidden;">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                             	<th>#</th>
							    <th>Borrower</th>
							    <th>Loan Details</th>
							    <th>Next Payment</th>
							    <th>Status</th>
							    <th>Action</th>
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

<!-- ============ Java Script Files  ================== -->
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/datatables/js/datatables.min.js"></script>
