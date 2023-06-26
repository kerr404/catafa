<div id ="savings-wallet-deposit-modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/savings_wallet_deposit.php">
                <div class="modal-header">
                    <h4 class="modal-title">Deposit</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-3">
                    <div class="form-group mb-3">
                        <label class="form-label">Amount</label>
                        <input class="form-control" type="number" name="amount" placeholder="Enter amount" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control"  name="description"  placeholder="Text here..." required></textarea>
                    </div>
                    <div class="row" id="result"></div>
                </div>
                <div class="modal-footer">
                    <input type="number" name="id" value="<?php echo $id; ?>" hidden>
                    <button type="button" class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary my-0" type="submit" name="submit">Submit</button>
                </div>
            </form>
		</div>
	</div>
</div>