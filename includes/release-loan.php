<!--Releawse Loan MODAL-->
<div id="release<?php echo $id; ?>" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="p-3 modal-body text-center">
				<p class="fs-4">Do you want to release</p>
				<h3>₱<?php echo number_format($amount, 2, '.', ','); ?></h3>
				<span class="fs-4">to&nbsp</span>
				<span class="fs-3"><strong><?php echo $row2['firstname'].' '.$row2['lastname']; ?>?</strong></span>
	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
				<a class="btn btn-primary my-0" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/release_loan.php?id=<?php echo $id.'&loan_id='.$loan_id;  ?>" name="submit">Release</a>
			</div>
		</div>
	</div>
</div>