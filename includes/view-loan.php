<div id ="view<?php echo $id;?>" class="modal fade" tabindex="-1" style="color: #474747 !important;">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $row2['lastname'].", ".$row2['firstname']." ".substr($row2['middlename'], 0, 1)."."; ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="col border p-4 bg-white rounded-3" style="z-index: 1;">
                      <div class="row mb-2">
                        <h5 class="text-center">Loan Details</h5>
                      </div>
                      <hr class="text-secondary my-1">
                      <div class="row mt-3">
                        <div class="col-5">
                          <p>Borrower:</p>
                          <p>Loan ID:</p>
                          <p>Plan:</p>
                          <p>Loaned Amount:</p>
                          <p>Total Payable:</p>
                          <p>Outstanding Balance:</p>
                          <p>Date Released:</p>
                          <p>Attachment:</p>
                        </div>
                        <div class="col-7">
                          <p class="text-secondary"><?php echo $row2['lastname'] . ", " . $row2['firstname'] . " " . substr($row2['middlename'], 0, 1) . "."; ?></p>
                          <p class="text-secondary"><?php echo $loan_id; ?></p>
                          <p class="text-secondary"><?php echo $plan; ?></p>
                          <p class="text-secondary"><?php echo "₱".number_format($amount, 2, '.', ','); ?></p>
                          <p class="text-secondary"><?php echo "₱".number_format($total_payable, 2, '.', ','); ?></p>
                          <p class="text-secondary"><?php echo "₱".number_format($principal_amount, 2, '.', ','); ?></p>
                          <p class="text-secondary"><?php echo date("M. j, Y \a\\t g:i A", strtotime($date_released));?></p>
                          <p class="text-secondary">
                            <button class="btn btn-primary btn-sm m-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            View
                            </button>
                          </p>
                        </div>
                      </div>
                        <div class="col collapse w-100" id="collapseExample">
                            <div class="row border border-secondary">
                                <?php echo '<img style="width: 200px;" src="data:image/jpeg;base64,'.base64_encode($attachment).'"/>'; ?>
                            </div>
                            <div class="row">
                                <a href="../actions/download_loan_attachment.php" class="btn btn-primary btn-sm">Download</a>
                            </div>
                        </div>

                        <?php
                        $_SESSION['attachment'] = $attachment;
                        ?>

                    </div>
                    <div class="col border mt-3 p-4 bg-white rounded-3" style="z-index: 1;">
                      <div class="row mb-2">
                        <h5 class="text-center">Next Payment Details</h5>
                      </div>
                      <hr class="text-secondary my-1">
                      <div class="row mt-3">
                        <?php 
                            if ($status == 1 OR $status == 3) {
                        ?>
                        <p class="text-secondary">N/A</p>
                        <?php
                            } else {
                        ?>
                        <div class="col-5">
                          <p>Due Amount :</p>
                          <p>Due Penalty:</p>
                          <p>Due Date:</p>
                        </div>
                        <div class="col-7">
                            <p class="text-secondary"><?php echo "₱".number_format($due_amount, 2, '.', ','); ?></p>
                            <p class="text-secondary">
                                <?php
                                    $current_date = date('Y-m-d');
                                    if ($due_row2['due_date'] <  date('Y-m-d', strtotime($current_date . ' -15 days'))) {
                                        echo "₱".number_format($due_penalty, 2, '.', ',');
                                    } else {
                                        echo "₱0";
                                    }
                                ?>  
                            </p>
                          <p class="text-secondary"><?php echo date("F j, Y", strtotime($due_row2['due_date'])); ?></p>
                        </div>
                        <?php
                            }
                         ?>
                      </div>
                    </div>
                    <div class="col border p-4 mt-3 bg-white rounded-3" style="z-index: 2;">
                        <div class="row mb-2">
                            <h5 class="text-center">Payment Schedules</h5>
                        </div>
                            <hr class="text-secondary my-1">
                        <div class="row mt-3 mb-1">
                            <?php 
                                if ($status == 1) {
                            ?>
                            <p class="text-secondary">N/A</p>
                            <?php
                                } else {
                            ?>
                            <div class="col-1">
                                  <p>#</p>
                            </div>
                            <div class="col">
                                <p>Amount</p>
                            </div>
                            <div class="col">
                                <p>Due Date</p>
                            </div>
                            <div class="col">
                                <p>Status</p>
                            </div>
                            <?php
                                }
                             ?>
                        </div>
                        <?php
                            $lp_sql = "SELECT * FROM loan_due_dates WHERE loan_ref_no = $loan_id";
                            $lp_query = mysqli_query($conn, $lp_sql);
                            $due_dates_count = mysqli_num_rows($lp_query);

                            for ($i = 1; $i <= $due_dates_count; $i++) {
                                $lp_sql2 = "SELECT * FROM loan_due_dates WHERE (loan_ref_no = $loan_id AND due_order = $i)";
                                $lp_query2 = mysqli_query($conn, $lp_sql2);
                                $lp_row2 = mysqli_fetch_assoc($lp_query2);
                                $payment_no = $lp_row2['due_date'];
                         ?>
                        <div class="row">
                            <div class="col-1 text-secondary">
                                <?php echo $i; ?>
                            </div>
                            <div class="col text-secondary">
                                <?php echo "₱".number_format($due_amount, 2, '.', ','); ?>
                            </div>
                            <div class="col text-secondary">
                                <?php echo $payment_no; ?>
                            </div>
                            <div class="col">
                                <p class="text-secondary">
                                    <?php 
                                    if ($i < $current_due_order) {
                                        echo '<button class="btn btn-primary btn-sm rounded-pill m-0" style="font-size: 0.75rem; padding: 0.1rem 0.4rem; width: 60px;" title="Already Paid">Paid</button>';
                                    } elseif ($i == $current_due_order) {
                                        echo '<button class="btn btn-success btn-sm rounded-pill m-0" style="font-size: 0.75rem; padding: 0.1rem 0.4rem; width: 60px;" title="Current Due">Current</button>';
                                    }elseif ($i > $current_due_order) {
                                        echo '<button class="btn btn-secondary btn-sm rounded-pill m-0" style="font-size: 0.75rem; padding: 0.1rem 0.4rem; width: 60px;" title="Unpaid">Unpaid</button>';
                                    }
                                    ?>   
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>