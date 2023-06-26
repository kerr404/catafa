<?php
    include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
    $add_member_sql = "SELECT * FROM reg_form";
    $add_member_query = mysqli_query($conn, $add_member_sql);
    $add_member_row = mysqli_fetch_assoc($add_member_query);
 ?>

<div id ="add-member-modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
            <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/add_member_submit.php">
                <div class="modal-header">
                    <h4 class="modal-title">Add Member</h4>
                    <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button style="color: white;">
                </div>
                <div class="modal-body">
                    <div class=" w-100 bg-white">
                        <div class="row w-100 mb-2 form-group" style="<?php if ($add_member_row['firstname'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">First name:</label>
                            </div>
                            <div class="col-8">
                                <input id="firstname" class="w-100 form-control" type="text" name="firstname" placeholder="First name" <?php if ($add_member_row['firstname'] == 1) {echo "required";} ?>>
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($add_member_row['middlename'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Middle name:</label>
                            </div>
                            <div class="col-8">
                                <input class=" form-control" type="text" name="middlename" placeholder="Middle name" <?php if ($add_member_row['middlename'] == 1) {echo "required";} ?>>
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($add_member_row['lastname'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Last name:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" name="lastname" placeholder="Last name" <?php if ($add_member_row['lastname'] == 1) {echo "required";} ?>>
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($add_member_row['age'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Age:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="number" name="age" placeholder="Age" <?php if ($add_member_row['age'] == 1) {echo "required";} ?>>
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($add_member_row['gender'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label" >Gender:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select" name="gender" <?php if ($add_member_row['gender'] == 1) {echo "required";} ?>>
                                    <option value="" selected hidden>Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($add_member_row['province'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Province:</label>
                            </div>
                            <div class="col-8">
                               <input id="province" class="form-control" type="text" name="province" placeholder="Province" <?php if ($add_member_row['province'] == 1) {echo "required";} ?>>    
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($add_member_row['city'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">City/Municipality:</label>
                            </div>
                            <div class="col-8">
                               <input id="city" class="form-control" type="text" name="city" placeholder="City/Municipality" <?php if ($add_member_row['city'] == 1) {echo "required";} ?>>   
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($add_member_row['barangay'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Barangay:</label>
                            </div>
                            <div class="col-8">
                               <input id="barangay" class="form-control" type="text" name="barangay" placeholder="Barangay" <?php if ($add_member_row['barangay'] == 1) {echo "required";} ?>>   
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($add_member_row['mobile_number'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Mobile Number:</label>
                            </div>
                            <div class="col-8">
                               <input type="tel" class="form-control" name="mobile-number" pattern="[0-9]{11}" placeholder="Ex. 09651234567" <?php if ($add_member_row['mobile_number'] == 1) {echo "required";} ?>>   
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($add_member_row['land_area'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Land Area&nbsp(m<sup>2</sup>):</label>
                            </div>
                            <div class="col-8">
                               <input class="form-control" type="number" name="land-area" placeholder="Square meter" <?php if ($add_member_row['land_area'] == 1) {echo "required";} ?>>  
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
                    <button id="submit" class="btn btn-primary my-0" type="submit" name="registration-submit">Save</button>
                </div>
            </form>
		</div>
	</div>
</div>