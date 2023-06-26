<?php 
	$delete_sql = "SELECT * FROM loan_list WHERE borrower_id = $member_id";
	$delete_query = mysqli_query($conn, $delete_sql);
	$delete_result_check = mysqli_num_rows($delete_query);

	$delete_sql2 = "SELECT * FROM savings_account_list WHERE account_holder_id = $member_id";
	$delete_query2 = mysqli_query($conn, $delete_sql2);
	$delete_result_check2 = mysqli_num_rows($delete_query2);

	if ($delete_result_check > 0 OR $delete_result_check2 > 0) {
		$isAllowed = 0;
	} else {
		$isAllowed = 1;
	}
 ?>

<!--Remove Member MODAL-->
<div id="delete<?php echo $id; ?>" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Remove Member</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body text-center">
				<h7>Do you want to remove</h7>
				<h3 class="mt-2 mb-3" ><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; ?>?</h3>
				<?php 
					if ($delete_result_check > 0 AND $delete_result_check2 == 0) {
						echo '
							<i class="fas fa-exclamation-triangle fa-lg text-danger mx-1"></i><small class="text-danger">Loan is active for this member. Deletion is not allowed.</small>
							<br class="m-0">
						';
					}
					if ($delete_result_check2 > 0 AND $delete_result_check == 0) {
						echo '
							<i class="fas fa-exclamation-triangle fa-lg text-danger mx-1"></i><small class="text-danger">Savings account is active for this member. Deletion is not allowed.</small>
						';
					}
					if ($delete_result_check > 0 AND $delete_result_check2 > 0) {
						echo '
							<i class="fas fa-exclamation-triangle fa-lg text-danger mx-1"></i><small class="text-danger">Loan and Savings account are active for this member.</small>
							<br>
							<small class="text-danger">Deletion is not allowed.</small>
						';
					}
				 ?>

			</div>
			<div class="modal-footer">
				<button class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
				<a class="btn btn-danger my-0 <?php if ($isAllowed == 0) {echo "disabled";} ?>" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/delete_member.php?id=<?php echo $id; ?>">
					Confirm
				</a>
			</div>
		</div>
	</div>
</div>
