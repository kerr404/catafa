<div id ="edit<?php echo $id; ?>" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/edit_loan_payment.php">
                <input type="number" name="id" value="<?php echo $id; ?>" hidden> <!--Get the ID of the loan-->
                <div class="modal-header text-light website-color">
                    <h4 class="modal-title">Edit Loan Payment</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php 

                        $sql2 = "SELECT * FROM loan_list";
                        $result2 = mysqli_query($conn, $sql2);

                        // sql4 is  create for the purpose of displaying the current data from the database
                        $sql4 = "SELECT * FROM loan_payments WHERE id = $id";
                        $result4 = mysqli_query($conn, $sql4);
                        $row4 = mysqli_fetch_assoc($result4); 
                     ?>
                    <div class="col">
                        <div class="row mb-2 px-3">
                            <label class="form-label">Payee <small class="text-secondary">(Name - Loan Reference No.)</small></label>
                            <select class="form-select" name="payee">
                                <option selected><?php echo $row4['payee']; ?></option>
                                <?php while($row2 = mysqli_fetch_assoc($result2)) {
                                    $borrower_id = $row2['borrower_id'];  
                                    $sql3 = "SELECT * FROM members WHERE member_id = $borrower_id";
                                    $result3 = mysqli_query($conn, $sql3);
                                    $row3 = mysqli_fetch_assoc($result3);
                                ?>
                                    <option value="<?php echo $row3['lastname'].", ".$row3['firstname']." ".substr($row3['middlename'], 0, 1)."."; ?>">
                                        <?php echo $row3['lastname'].", ".$row3['firstname']." ".substr($row3['middlename'], 0, 1).". - ".$row2['ref_no']; 
                                        ?>    
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row px-1 mb-3">
                            <div class="col">
                                <label class="form-label">Amount</label>
                                <input class="form-control" type="number" name="amount" placeholder="Enter amount" value="<?php echo $row4['amount'] ?>">
                            </div>
                            <div class="col">
                                <label class="form-label">Penalty</label>
                                <input class="form-control" type="number" name="penalty" placeholder="Enter amount" value="<?php echo $row4['penalty'] ?>">
                            </div>
                        </div>
                    </div>
 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="registration-submit" class="btn btn-success" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>