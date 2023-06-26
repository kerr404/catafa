<!--Delete Loan MODAL-->
<div id="delete-loan-type-modal<?php echo $id; ?>" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header website-color">
				<h4 class="modal-title" style="color: white">Delete Loan Type</h4>
				<button class="btn-close" type="button" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body text-center">
				<h4>Do you want to delete this Loan Type?</h4>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
				<a class="btn btn-success" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/delete_loan_type.php?id=<?php echo $id;  ?>">Confirm</a>
			</div>
		</div>
	</div>
</div>