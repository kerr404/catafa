<!--Delete Loan MODAL-->
<div id="delete-savings-account-modal<?php echo $id; ?>" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Close Account</h4>
				<button class="btn-close" type="button" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body text-center">
				<h7>Do you want to close the savings account of</h7>
				<h3 class="mt-2" ><?php echo $row3['firstname'].' '.$row3['middlename'].' '.$row3['lastname']; ?>?</h3>
				<?php 
					if ($account_balance > 0 OR $earnings_balance > 0) {
						echo '
						<i class="fas fa-exclamation-triangle fa-lg text-danger mx-1"></i><small class="text-danger">This account currently has a balance. Closing it is not allowed.</small>
						';
					}
				 ?>
			</div>
			<div class="modal-footer">
				<button class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
				<a class="btn btn-danger my-0 <?php if ($account_balance > 0 OR $earnings_balance > 0) {echo "disabled";} ?>" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/delete_savings_account.php?id=<?php echo $id.'&account_number='.$account_number; ?>">Confirm</a>
			</div>
		</div>
	</div>
</div>