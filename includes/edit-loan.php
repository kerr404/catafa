<div id ="edit-loan<?php echo $id; ?>" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/edit_loan.php">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Loan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php 
                        $sql = "SELECT * FROM members";
                        $result = mysqli_query($conn, $sql);
                     ?>
                    <div class="row">
                         <div class="col mb-3">
                            <label class="form-label">Borrower</label>
                            <select class="form-select" name="member-id" required <?php if ($status == 2 OR $status == 3) {echo "disabled";} ?>>
                                <option hidden><?php echo $row2['lastname'].", ".$row2['firstname']." ".substr($row2['middlename'], 0, 1)."."; ?></option>
                                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $row['member_id']; ?>"><?php echo $row['lastname'].", ".$row['firstname']." ".substr($row['middlename'], 0, 1)."."; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Loan Plan</label>
                            <select class="form-select" name="loan-plan" required <?php if ($status == 2 OR $status == 3) {echo "disabled";} ?>>
                                <option hidden selected value="<?php echo $loan_plan_id; ?>"><?php echo $plan; ?></option>
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
                        <div class="col mb-2">
                            <label class="form-label">Loan Amount</label>
                            <input class="form-control" name="loan-amount" type="number" placeholder="Enter amount" value="<?php echo $amount; ?>" required <?php if ($status == 2 OR $status == 3) {echo "disabled";} ?>>
                        </div>
                     </div>
                    
                    
                    <div class="mb-2">
                        <label class="form-label">Comment</label>
                        <textarea class="form-control" name="loan-comment" required><?php echo $comment; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="button" class="btn btn-light border my-0" data-bs-dismiss="modal">Close</button>
                    <button id="submit" class="btn btn-primary my-0" type="submit" name="submit">Save</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>