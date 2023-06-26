<div id ="add-loan-plan-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <form id ="add-loan-plan-form" method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/add_plan.php">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Loan Plan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-2">
                    <div class="row form-group mb-3">
                        <div class="col">
                            <label class="form-label">Plan Name</label>
                            <input class="form-control" type="text" placeholder="Plan name" name="plan-name" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Months</label>
                            <input class="form-control" type="number" name="months" placeholder="0"  required>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col">
                            <label class="form-label">Interest <span class="text-secondary">(%)</span></label>
                            <input class="form-control"type="number" name="interest" placeholder="%"  required>
                        </div>
                        <div class="col">
                            <label class="form-label">Over Due Penalty <span class="text-secondary">(%)</span></label>
                            <input class="form-control" type="number" name="penalty" placeholder="%"  required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label class="form-label">Payment Frequency</label>
                            <select class="form-select" name="payment-freq"  required>>
                                <option selected hidden>Select</option>
                                <option value="1">Monthly</option>
                                <option value="2">Bi-weekly</option>
                                <option value="3">Weekly</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Repayment Method</label>
                            <select class="form-select" name="repayment-method"  required>>
                                <option selected hidden>Select</option>
                                <option value="1">Amortization</option>
                                <option value="2">Interest-Only</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary my-0" type="submit" name="submit" id="submit">Submit</button>
                </div>
            </form>
		</div>
	</div>
</div>
