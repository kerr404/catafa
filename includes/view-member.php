

<div id="view-member<?php echo $id;?>" class="modal fade" style="color: #474747 !important;">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $lastName.", ".$firstName." ".substr($middleName, 0, 1)."."; ?></h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>
      <?php
        $member_id = $row['member_id'];
        $sql0 = "SELECT * FROM loan_list WHERE borrower_id = $member_id";
        $query0 = mysqli_query($conn, $sql0);
        $row0 = mysqli_fetch_assoc($query0);
        
        $sql01 = "SELECT * FROM savings_account_list WHERE account_holder_id = $member_id";
        $query01 = mysqli_query($conn, $sql01);
        $row01 = mysqli_fetch_assoc($query01);

        $view_member_sql = "SELECT * FROM reg_form";
        $view_member_query = mysqli_query($conn, $view_member_sql);
        $view_member_row = mysqli_fetch_assoc($view_member_query);
       ?>
      <div class="modal-body p-3 bg-light" style="color: #424242;">
        <div class="col shadow p-4 bg-white rounded-3" style="z-index: 1;">
          <div class="row mb-2">
            <h5>Personal Information</h5>
          </div>
          <hr class="text-secondary my-1">
          <div class="row mt-3">
            <div class="col-4">
              <p>Member ID:</p>
              <p style="<?php if ($view_member_row['firstname'] == 0) {echo "display:none;";} ?>">First name:</p>
              <p style="<?php if ($view_member_row['middlename'] == 0) { echo 'display:none;'; } ?>">Middle name:</p>
              <p style="<?php if ($view_member_row['lastname'] == 0) {echo "display:none;";} ?>">Last name:</p>
              <p style="<?php if ($view_member_row['age'] == 0) {echo "display:none;";} ?>">Age:</p>
              <p style="<?php if ($view_member_row['gender'] == 0) {echo "display:none;";} ?>">Gender:</p>
              <p style="<?php if ($view_member_row['mobile_number'] == 0) {echo "display:none;";} ?>">Mobile no.:</p>
              <p style="<?php if ($view_member_row['land_area'] == 0) {echo "display:none;";} ?>">Land area:</p>
              <p style="<?php if ($view_member_row['province'] == 0 AND $view_member_row['city'] == 0 AND $view_member_row['barangay'] == 0) {echo "display:none;";} ?>">Address:</p>
              
            </div>
            <div class="col-8">
              <p class="text-secondary">&nbsp<?php echo ' '.$row['member_id']; ?></p>
              <p class="text-secondary" style="<?php if ($view_member_row['firstname'] == 0) {echo "display:none;";} ?>">&nbsp<?php echo ' '.$row['firstname']; ?></p>
              <p class="text-secondary" style="<?php if ($view_member_row['middlename'] == 0) { echo 'display:none;'; } ?>">&nbsp<?php echo ' '.$row['middlename']; ?></p>
              <p class="text-secondary" style="<?php if ($view_member_row['lastname'] == 0) {echo "display:none;";} ?>">&nbsp<?php echo ' '.$row['lastname']; ?></p>
              <p class="text-secondary" style="<?php if ($view_member_row['age'] == 0) {echo "display:none;";} ?>">&nbsp
                <?php if ($age == 0) {echo "";} else { echo ' '.$age;} ?>
              </p>
              <p class="text-secondary" style="<?php if ($view_member_row['gender'] == 0) {echo "display:none;";} ?>">&nbsp<?php echo ' '.$gender; ?></p>
              <p class="text-secondary" style="<?php if ($view_member_row['mobile_number'] == 0) {echo "display:none;";} ?>">&nbsp
                <?php if (strlen($phoneNumber) == 0) {echo "";} else { echo substr($phoneNumber, 0, 4) . '-' . substr($phoneNumber, 4, 3) . '-' . substr($phoneNumber, 7, 4);} ?>
              </p>
              <p class="text-secondary" style="<?php if ($view_member_row['land_area'] == 0) {echo "display:none;";} ?>">&nbsp
                <?php if ($land == 0) {echo "";} else {echo number_format($land, 0, '.', ',');} ?>
             </p>
              <p class="text-secondary" style="<?php if ($view_member_row['province'] == 0 AND $view_member_row['city'] == 0 AND $view_member_row['barangay'] == 0) {echo "display:none;";} ?>">&nbsp
                <?php if (strlen($province) == 0 AND strlen($city) == 0 AND strlen($barangay) == 0) {echo "";} else {echo $barangay.', '.$city.', '.$province; } ?>
             </p>
            </div>
          </div>
        </div>
        <div class="col shadow mt-4 p-4 bg-white rounded-3" style="z-index: 2;">
          <div class="row mb-2">
            <h5>Loans</h5>
          </div>
          <hr class="text-secondary my-1">
            <?php 
              if (mysqli_num_rows($query0) > 0) {
                $loan_id = $row0['ref_no'];
                $loan_status = $row0['status'];
                $amount = $row0['amount'];
                $loan_plan = $row0['loan_plan'];
                $date_released = $row0['date_released'];
            ?>
          <div class="row mt-3">
            <div class="col-5">
              <p>Borrower:</p>
              <p>Loan ID:</p>
              <p>Amount:</p>
              <p>Status:</p>
              <p>Date Released:</p>
            </div>
            <div class="col-7">
                  <p class="text-secondary"><?php echo $row['lastname'] . ", " . $row['firstname'] . " " . substr($row['middlename'], 0, 1) . "."; ?></p>
                  <p class="text-secondary"><?php echo $loan_id; ?></p>
                  <p class="text-secondary"><?php echo "₱".number_format($amount, 2, '.', ','); ?></p>
                  <p>
                    <?php 
                      if ($loan_status == 1) {
                        echo '<button class="btn btn-warning btn-sm rounded-pill m-0" style="font-size: 0.75rem; padding: 0.1rem 0.4rem;" title="Active Member">Not Released</button>';
                      } elseif ($loan_status == 2) {
                        echo '<button class="btn btn-success btn-sm rounded-pill m-0" style="font-size: 0.75rem; padding: 0.1rem 0.4rem;" title="Active Member">Active</button>';
                      } else {
                        echo '<button class="btn btn-primary btn-sm rounded-pill m-0" style="font-size: 0.75rem; padding: 0.1rem 0.4rem;" title="Active Member">Completed</button>';
                      }
                    ?>
                  </p>
                  <p class="text-secondary"><?php echo date("M. j, Y \a\\t g:i A", strtotime($date_released));?></p>
            </div>
          </div>
                    <?php 
              } else {
          ?>
            <div class="row mt-3">
              <p class="text-secondary">No loan account found<p>
            </div>
          <?php
              }
          ?>
        </div>
        <div class="col shadow mt-4 p-4 bg-white rounded-3" style="z-index: 3;">
          <div class="row mb-2">
            <h5>Savings</h5>
          </div>
          <hr class="text-secondary my-1">
          <?php 
                if (mysqli_num_rows($query01) > 0) {
                  $account_number = $row01['account_number'];
                  $account_balance = $row01['account_balance'];
                  $earnings_balance = $row01['earnings_balance'];
              ?>
          <div class="row mt-3">
            <div class="col-5">
                <p>Account Holder:</p>
                <p>Account Number:</p>
                <p>Balance:</p>
                <p>Earnings Balance:</p>
                <p>Status:</p>
              </div>
              <div class="col-7">
                <p class="text-secondary"><?php echo $row['lastname'].", ".$row['firstname']." ".substr($row['middlename'], 0, 1)."."; ?></p>
                <p class="text-secondary"><?php echo $account_number; ?></p>
                <p class="text-secondary">₱<?php echo number_format($account_balance, 2, '.', ','); ?></p>
                <p class="text-secondary">₱<?php echo number_format($earnings_balance, 2, '.', ','); ?></p>
                <p><?php echo '<button class="btn btn-success btn-sm rounded-pill m-0" style="font-size: 0.75rem; padding: 0.1rem 0.4rem;" title="Active Member">Active</button>'; ?></p>
                
              </div>
          </div>
          <?php 
              } else {
          ?>
            <div class="row mt-3">
              <p class="text-secondary">No savings account found<p>
            </div>
          <?php
              }
          ?>
        </div>
    </div>
  </div>
</div>
</div>









