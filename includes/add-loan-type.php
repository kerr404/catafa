<div id ="add-loan-type-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/add_loan_type.php">
                <div class="modal-header text-light website-color">
                    <h4 class="modal-title">Add New Loan Type</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col  px-4">
                        <div class="row mb-3">
                            <label class="form-label">Type Name</label>
                            <input class="form-control" type="text" name="loan-type-name" required>
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" placeholder="Short description..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="registration-submit" class="btn btn-success" type="submit" name="submit">Submit</button>
                </div>
            </form>
		</div>
	</div>
</div>