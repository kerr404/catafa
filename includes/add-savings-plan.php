<div id ="add-savings-plan-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <form id ="add-loan-plan-form" method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/add_savings_plan.php">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Savings Plan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-2">
                    <div class="row form-group mb-3">
                        <div class="col">
                            <label class="form-label">Plan Name</label>
                            <input class="form-control" type="text" placeholder="Plan name" name="plan-name" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Interest</label>
                            <input class="form-control" type="number" name="interest" placeholder="0"  required>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <script>
                            $(document).ready(function() {
                              $('#crediting-freq').change(function() {
                                var selectedOption = $(this).val();
                                
                                if (selectedOption == 1) {
                                    $('#crediting-day-div-monthly').show();
                                    $('#crediting-day-div-biweekly').hide();
                                    $('#crediting-day-div-weekly').hide();
                                } else if (selectedOption == 2) {
                                    $('#crediting-day-div-biweekly').show();
                                    $('#crediting-day-div-monthly').hide();
                                    $('#crediting-day-div-weekly').hide();
                                } else if (selectedOption == 3) {
                                    $('#crediting-day-div-weekly').show();
                                    $('#crediting-day-div-monthly').hide();
                                    $('#crediting-day-div-biweekly').hide();
                                } else {
                                    $('#crediting-day-div-weekly').hide();
                                    $('#crediting-day-div-monthly').hide();
                                    $('#crediting-day-div-biweekly').hide();
                                }
                              });
                            });
                        </script>
                        <div class="col">
                            <label class="form-label">Interest Crediting Freq.</label>
                            <select class="form-select" id="crediting-freq" name="crediting-freq"  required>
                                <option selected hidden>Select</option>
                                <option value="1">Monthly</option>
                                <option value="2">Bi-weekly</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mb-3" id="crediting-day-div-monthly" style="display:none">
                        <label class="form-label">Interest Crediting Day <small class="text-secondary">(nth day of the month)</small></label>
                        <div class="col-sm-9">
                          <div class="row">
                            <label class="col-sm-3 col-form-label"><small>Day:</small></label>
                            <div class="col-sm-5">
                              <input class="form-control" type="number" id="" name="crediting-day-1-monthly" placeholder="Ex. 15">
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row form-group mb-3" id="crediting-day-div-biweekly" style="display:none">
                        <label class="form-label">Interest Crediting Day</label>
                        <div class="col-sm-9">
                          <div class="row mb-1">
                            <label class="col-sm-3 col-form-label"><small>Day 1:</small></label>
                            <div class="col-sm-5">
                              <input class="form-control" type="number" id="" name="crediting-day-1-weekly" placeholder="Ex. 1">
                            </div>
                          </div>
                          <div class="row">
                            <label class="col-sm-3 col-form-label"><small>Day 2:</small></label>
                            <div class="col-sm-5">
                              <input class="form-control" type="number" id="" name="crediting-day-2-weekly" placeholder="Ex. 16">
                            </div>
                          </div>
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
