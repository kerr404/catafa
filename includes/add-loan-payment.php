<div id="add-loan-payment-modal<?php echo $id; ?>" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/add_loan_payment.php">
                <div class="modal-header">
                    <h4 class="modal-title">New Payment</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">

                    <?php
                    // Determine what is the name of the Borrower
                    $sql3 = "SELECT * FROM members WHERE member_id = $borrower_id";
                    $result3 = mysqli_query($conn, $sql3);
                    $row3 = mysqli_fetch_assoc($result3);
                    ?>
                    <div class="form-group mb-3">
                        <label class="form-label">Payee <small class="text-secondary">(Name - Loan ID.)</small></label>
                        <select class="form-select" name="loan-ref-no">
                            <option selected value="<?php echo $loan_id . "-" . $row3['lastname'] . ", " . $row3['firstname'] . " " . substr($row3['middlename'], 0, 1) . "."; ?>">
                                <?php echo $row3['lastname'] . ", " . $row3['firstname'] . " " . substr($row3['middlename'], 0, 1) . ". - " . $loan_id;
                                ?>
                            </option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label class="form-label">Amount</label>
                            <input class="form-control" type="number" step="0.01" name="amount" placeholder="₱" value="<?php echo $due_amount; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">Penalty</label>
                            <input class="form-control" type="number" step="0.01" name="penalty" placeholder="₱">
                        </div>

                    </div>
                    <div class="row border rounded-3 mx-1 p-3 mt-4 form-group">
                        <div class="col-sm-3">
                            <p class="m-0">Amount: </p>
                            <p class="m-0">Penalty: </p>
                            <p class="m-0">Total: </p>
                        </div>
                        <div class="col-sm-3">
                            <p class="m-0">₱<?php echo number_format($due_amount, 2, '.', ','); ?></p>
                            <p class="m-0">
                                ₱
                                <?php
                                if (date('Y-m-d H:i:s') > $due_row2['due_date']) {
                                    echo number_format($due_penalty, 2, '.', ',');
                                } else {
                                    echo "0";
                                }
                                ?>
                            </p>
                            <p>
                                <?php
                                // Add the Monthly ammount and penalty if the current date is greater than the due date. 
                                if (date('Y-m-d H:i:s') > $due_row2['due_date']) {
                                    echo "₱" . number_format($due_amount + $due_penalty, 2, '.', ',');
                                } else {
                                    echo "₱" . number_format($due_amount, 2, '.', ',');
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
                    <button id="submit" class="btn btn-primary my-0" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>