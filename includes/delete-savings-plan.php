<!--Delete Loan MODAL-->
<div id="delete-savings-plan<?php echo $id; ?>" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete Savings Plan</h4>
				<button class="btn-close" type="button" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body text-center">
				<h5>Do you want to delete this savings plan?</h5>
				<h2 class="mt-2"><?php echo $row['plan_name'];?></h2>

			</div>
			<div class="modal-footer">
				<button class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
				<a class="btn btn-danger my-0" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/delete_savings_plan.php?id=<?php echo $id;  ?>">Confirm</a>
			</div>
		</div>
	</div>
</div>