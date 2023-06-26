<?php 
    $sql = "SELECT * FROM members";
    $result = mysqli_query($conn, $sql);

 ?>
 
<form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/add_loan.php">
    <div class="modal-body">

        <div class="row">
             <div class="col mb-2">
                <label class="form-label">Borrower</label>
                <select class="form-select" name="member-id" required>
                    <option value="" hidden>Select member</option>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <option value="<?php echo $row['member_id']; ?>"><?php echo $row['lastname'].", ".$row['firstname']." ".substr($row['middlename'], 0, 1)."."; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col mb-2">
                <label class="form-label">Loan Type</label>
                <select class="form-select" name="loan-type" required>
                    <option value="" hidden>Select here</option>
                    <?php 
                        $sql3 = "SELECT * FROM loan_type";
                        $query3 = mysqli_query($conn, $sql3);
                        while ($row3 = mysqli_fetch_assoc($query3)){
                    ?>
                    
                    <option value="<?php echo $row3['id']; ?>"><?php echo $row3['loan_type_name']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
         <div class="row">
            <div class="col mb-2">
                <label class="form-label">Loan Plan</label>
                <select class="form-select" name="loan-plan" required>
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
            <div class="col mb-2">
                <label class="form-label">Loan Amount</label>
                <input class="form-control" name="loan-amount" type="number"placeholder="Enter amount" required>
            </div>
         </div>
        
        
        <div class="mb-2">
            <label class="form-label">Comment</label>
            <textarea class="form-control" name="loan-comment" required></textarea>
        </div>
    </div>
</form>
