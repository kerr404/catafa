<div id ="add-savings-account-modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <form id="add-savings-form" name="add-savings-form" method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/add_savings_account.php">
                <div class="modal-header">
                    <h4 class="modal-title">New Savings Account</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <div class="row">
                      <div class="col mb-3">
                        <label class="form-label">Account Holder</label>
                        <input type="text" class="form-control" id="member-search" placeholder="Search member" autocomplete="off">
                        <input type="hidden" name="account-holder" id="account-holder" required>
                        <div id="member-list" class="bg-white shadow-lg position-absolute"></div>
                      </div>
                    </div>
                    <script>
                        
                        $(document).ready(function() {


                        // check if the member already have a savings account
                        $('#submit').click(function() {
                            var initialDeposit = $("#initial-deposit").val();
                            var interestRate = $("#interest-rate").val();
                            var accountHolder = $("#member-search").val();
                            if (initialDeposit == '' || interestRate == '' || accountHolder == '') {
                                $("#error-message").text("Please fill in all the fields");
                            } else {
                                var member_id = $('#account-holder').val();
                                $.ajax({
                                    url: '../actions/add_savings_account.php',
                                    method: 'POST',
                                    data: {member_id: member_id, check: 'check'},
                                    success: function(data) {
                                        if (data == "success") {
                                            $("#error-message").text("Member already have a savings account");
                                        } else {
                                            $("#add-savings-form").submit();
                                        }
                                  },
                                    error: function() {
                                      alert("Error");
                                    }
                                });
                            }
                            
                        });

                        $('#member-search').keyup(function() {
                          var query = $(this).val();
                          if (query != '') {
                            $.ajax({
                              url: '../actions/savings_search_holder.php',
                              method: 'POST',
                              data: {query: query},
                              success: function(data) {
                                $('#member-list').fadeIn();
                                $('#member-list').html(data);
                              }
                            });
                          } else {
                            $('#member-list').fadeOut();
                            $('#member-list').html('');
                          }
                        });

                        $(document).on('click', '.member-item', function() {
                          var id = $(this).data('id');
                          var name = $(this).text();
                          $('#member-search').val(name);
                          $('#account-holder').val(id);
                          $('#member-list').fadeOut();
                        });
                      });
                    </script>

                     <div class="row">
                        <div class="col mb-2">
                            <label class="form-label">Initial Deposit</label>
                            <input class="form-control" type="number" name="initial-deposit" placeholder="Enter amount" id="initial-deposit" required>
                        </div>
                    </div>
                    <span id="error-message" class="text-danger"></span>
                </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
                    <button id="submit" class="btn btn-primary my-0" type="submit" name="submit">Save</button>
                </div>
		</div>
	</div>
</div>