<?php
$plan_sql = "SELECT * FROM savings_plan LIMIT 1";
$plan_query = mysqli_query($conn, $plan_sql);
$plan_row = mysqli_fetch_assoc($plan_query);
$last_crediting_date = $plan_row['last_interest_crediting_date'];
$crediting_freq = $plan_row['interest_crediting_freq'];
$crediting_day_1 = $plan_row['crediting_day_1'];
$crediting_day_2 = $plan_row['crediting_day_2'];

if ($crediting_freq == 1) {
    // Add 1 month to date but still maintain the day
    $date1 = DateTime::createFromFormat('Y-m-d', $last_crediting_date);
    $date1->modify('+1 month'); // Add one month to the date
    $next_crediting_date = $date1->format('Y-m-d');
} else {

    $last_crediting_day = date('d', strtotime($last_crediting_date));

    if ($last_crediting_day == $crediting_day_1) {
        // Change the day of last_crediting_date to next crediting date
        $date1 = new DateTime($last_crediting_date);
        $date1->setDate($date1->format('Y'), $date1->format('m'), $crediting_day_2);
        $next_crediting_date = $date1->format('Y-m-d');
    } else {
        // Change the day of last_crediting_date to next crediting date
        $date1 = new DateTime($last_crediting_date);
        $date1->setDate($date1->format('Y'), $date1->format('m'), $crediting_day_1);
        $date1->modify('+1 month'); // Add one month to the date
        $next_crediting_date = $date1->format('Y-m-d');
    }
}
?>
<div id ="view-savings<?php echo $id;?>" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $row3['lastname'].", ".$row3['firstname']." ".substr($row3['middlename'], 0, 1)."."; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light p-3" style="color: #424242;">
                <div class="col p-4 mb-3 bg-white border rounded-3">
                    <div class="row">
                        <h5 class="text-center">Account Details</h5>
                    </div>
                    <hr class="text-secondary my-1">
                    <div class="row mt-3">
                        <div class="col-5">
                          <p>Account Holder:</p>
                          <p>Account Number:</p>
                          <p>Balance:</p>
                          <p>Earnings Balance:</p>
                          <p>Interest Rate:</p>
                        </div>
                        <div class="col-7">
                          <p class="text-secondary"><?php echo $row3['lastname'].", ".$row3['firstname']." ".substr($row3['middlename'], 0, 1)."."; ?></p>
                          <p class="text-secondary"><?php echo $row2['account_number']; ?></p>
                          <p class="text-secondary">₱<?php echo number_format($account_balance, 2, '.', ','); ?></p>
                          <p class="text-secondary">₱<?php echo number_format($earnings_balance, 2, '.', ','); ?></p>
                          <p class="text-secondary"><?php echo $interest_rate."%"; ?></p>
                        </div>
                    </div>                      
                </div>
                 <div class="col border p-4 mt-3 bg-white rounded-3" style="z-index: 2;">
                        <div class="row mb-2">
                            <h5 class="text-center">Recent Earnings</h5>
                        </div>
                            <hr class="text-secondary my-1">
                        <div class="row mt-3 mb-1">
                            <div class="col-1">
                                <p>#</p>
                            </div>
                            <div class="col">
                                <p>Amount</p>
                            </div>
                            <div class="col">
                                <p>Date</p>
                            </div>
                            <div class="col">
                                <p>Ref. No.</p>
                            </div>
                        </div>
                        <?php

                            $num = 0;
                            $lp_sql = "SELECT * FROM savings_interest_earnings WHERE account_number = $account_number LIMIT 12";
                            $lp_query = mysqli_query($conn, $lp_sql);

                            if (mysqli_num_rows($lp_query) == 0) {
                                echo '
                                <div class="row text-secondary">
                                    <div class="col text-secondary">
                                        No recent earning data available.
                                    </div>
                                </div>
                                ';
                            } else {
                               while ($lp_row = mysqli_fetch_assoc($lp_query)) {

                                $amount = $lp_row['amount'];
                                $account_number = $lp_row['account_number'];
                                $date = $lp_row['date'];
                                $ref_no = $lp_row['ref_no'];
                                $num = $num + 1; 

                            
                         ?>
                        <div class="row">
                            <div class="col-1 text-secondary">
                                <p><?php echo $num; ?></p>
                            </div>
                            <div class="col text-secondary">
                                <?php 
                                echo '<button class="btn btn-success btn-sm rounded-pill m-0" style="font-size: 0.75rem; padding: 0.1rem 0.4rem; width: 100px;" title="Already Paid">+ ₱'.number_format($amount, 2, '.', ',').'</button>';

                                ?>
                            </div>
                            <div class="col text-secondary">
                               <?php echo date('Y-m-d', strtotime($date)); ?>
                            </div>
                            <div class="col text-secondary">
                               <?php echo $ref_no; ?>
                            </div>
                        </div>
                        <?php } } ?>
                        <div class="row mt-4 border rounded py-2">
                            <p class="text-center m-0">Next Interest Crediting Date:  <span class="text-secondary"><?php echo date('F d, Y', strtotime($next_crediting_date)); ?></span></p>
                        </div>
                    </div>
            </div>
		</div>
	</div>
</div>