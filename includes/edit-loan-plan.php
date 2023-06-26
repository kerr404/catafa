<div id ="edit-loan-plan<?php echo $id;?>" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/edit_plan.php">
                <input type="number" name="id" value="<?php echo $id; ?>" hidden> <!--Get the ID of the loan-->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Plan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mx-2 mb-2">
                        <div class="col">
                            <label class="form-label">Plan Name</label>
                            <input class="form-control" type="text" name="plan-name" value="<?php echo $row['plan_name']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">Months</label>
                            <input class="form-control" type="number" name="months" placeholder="0" value="<?php echo $row['months']; ?>">
                        </div>
                    </div>
                    <div class="row mx-2">
                        <div class="col">
                            <label class="form-label">Interest</label>
                            <input class="form-control"type="number" name="interest" placeholder="%" value="<?php echo $row['interest_percentage']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">Monthly Over due's Penalty</label>
                            <input class="form-control" type="number" name="penalty" placeholder="%" value="<?php echo $row['penalty_rate']; ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary my-0" type="submit" name="submit">Save</button>
                </div>
            </form>
		</div>
	</div>
</div>