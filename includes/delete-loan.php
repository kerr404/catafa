<!--Delete Loan MODAL-->
<div id="delete-loan<?php echo $id; ?>" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete Loan</h4>
				<button class="btn-close" type="button" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body text-center">
				<h7>Do you want to delete this loan?</h7>
				<h3 class="mt-2" ><?php echo $row2['firstname'].' '.$row2['middlename'].' '.$row2['lastname']; ?>?</h3>
			</div>
			<div class="modal-footer">
				<button class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
				<a class="btn btn-danger my-0" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/delete_loan.php?id=<?php echo $id.'&loan_ref_no='.$loan_id;  ?>">Confirm</a>
			</div>
		</div>
	</div>
</div>