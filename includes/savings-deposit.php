<div id ="deposit-modal<?php echo $id; ?>" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/savings_deposit.php">
                <div class="modal-header">
                    <h4 class="modal-title">Deposit</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <div class="form-group row mb-4">
                        <div class="col-12">
                            <label class="form-label">Account Holder</label>
                            <select class="form-select" name="account-holder">
                                <option><?php echo $row3['lastname'].", ".$row3['firstname']." ".substr($row3['middlename'], 0, 1)."."; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6 m-0">  
                            <label class="form-label">Account Number</label>
                            <input id="account-number" class="col form-control" type="text" name="account-number" value="<?php echo $account_number; ?>" readonly>
                        </div>
                        <div class="col-6 m-0">  
                            <label class="form-label">Amount</label>
                            <input class="form-control" type="number" name="deposit-amount" placeholder="₱" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="number" name="id" value="<?php echo $id; ?>" hidden>
                    <button type="button" class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
                    <button id="submit" class="btn btn-primary my-0" type="submit" name="submit">Submit</button>
                </div>
            </form>
		</div>
	</div>
</div>