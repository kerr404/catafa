<div id ="savings-wallet-withdraw-modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <form id="withdraw-wallet-form" method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/savings_wallet_withdraw.php">
                <div class="modal-header">
                    <h4 class="modal-title">Withdraw</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <script>
                $(document).ready(function() {
                    $('#withdraw-submit').click(function() {
                        var withdrawAmount = $('#amount').val();
                        var withdrawDescription = $('#description').val();
                        if (withdrawAmount === '' || withdrawDescription === '') {
                            $('#withdraw-error-message').text('Please fill in all the fields');
                        } else {
                            $.ajax({
                                url: '../actions/savings_wallet_withdraw.php',
                                method: 'POST',
                                data: {
                                    amount: withdrawAmount,
                                    balanceCheck: ''
                                },
                                success: function(data) {
                                    if (data === 'success') {
                                        $('#withdraw-error-message').text('Not enough balance!');
                                    } else {
                                        $('#withdraw-wallet-form').submit();
                                    }
                                },
                                error: function() {
                                    alert('error');
                                }
                            });
                        }
                    });
                });
                </script>
                <div class="modal-body mx-3">
                   <div class="form-group mb-3">
                        <label class="form-label">Amount</label>
                        <input class="form-control" type="number" name="amount" id="amount" placeholder="Enter amount" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Description</label>
                        <textarea class="form-control"  name="description" id="description"  placeholder="Text here..." required></textarea>
                    </div>
                    <span id="withdraw-error-message" class="text-danger"></span>
                </div>
                </form>
                <div class="modal-footer">
                    <input type="number" name="id" value="<?php echo $id; ?>" hidden>
                    <button type="button" class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary my-0" id="withdraw-submit" name="withdraw-submit">Submit</button>
                </div>
		</div>
	</div>
</div>