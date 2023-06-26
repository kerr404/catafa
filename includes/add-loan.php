<div id ="add-loan-modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Loan Application</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add-loan-form" method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/add_loan.php" enctype="multipart/form-data">
            <div class="modal-body mx-2">
                <?php 
                    $sql = "SELECT * FROM members";
                    $result = mysqli_query($conn, $sql);

                 ?>
                <div class="form-group">
                  <div class="col mb-3">
                    <label class="form-label">Borrower</label>
                    <input type="text" class="form-control" id="member-search" placeholder="Search" autocomplete="off">
                    <input type="hidden" name="member-id" id="member-id" required>
                    <div id="member-list" class="bg-white shadow-lg position-absolute"></div>
                  </div>
                </div>
                <script>
                  $(document).ready(function() {
                    // check if the member already have a loan account
                    $('#submit').click(function() {
                        var borrower = $("#member-search").val();
                        var loanPlan = $("#loan-plan").val();
                        var loanAmount = $("#loan-amount").val();
                        var loanComment = $("#loan-comment").val();
                        if (borrower == '' || loanPlan == '' || loanAmount == '' || loanComment == '') {
                            $("#error-message").text("Please fill in all the fields");
                        } else {
                            var member_id = $('#member-id').val();
                            $.ajax({
                                url: '../actions/add_loan.php',
                                method: 'POST',
                                data: {member_id: member_id, check: 'check'},
                                success: function(data) {
                                    if (data == "success") {
                                        $("#error-message").text("Member already have a loan");
                                    } else {
                                        $("#add-loan-form").submit();
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
                          url: '../actions/loan_search_borrower.php',
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
                      $('#member-id').val(id);
                      $('#member-list').fadeOut();
                    });
                  });
                </script>


                 <div class="form-group row mb-3">
                    <div class="col">
                        <label class="form-label">Loan Plan</label>
                        <select class="form-select" name="loan-plan" id="loan-plan" required>
                            <option value="" hidden>Select here</option>
                            <?php 
                                $sql4 = "SELECT * FROM loan_plan";
                                $query4 = mysqli_query($conn, $sql4);
                                while ($row4 = mysqli_fetch_assoc($query4)){
                            ?>
                             <option value="<?php echo $row4['id']; ?>"><?php echo $row4['plan_name']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Loan Amount</label>
                        <input class="form-control" name="loan-amount" id="loan-amount" type="number"placeholder="Enter amount" required>
                    </div>
                 </div>
                 <div class="form-group mb-3">
                    <label class="form-label">Attachment</label>
                    <input class="form-control" type="file" name="attachment" id="attachment" required>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">Comment</label>
                    <textarea class="form-control" name="loan-comment" id="loan-comment" placeholder="Text here..." required></textarea>
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