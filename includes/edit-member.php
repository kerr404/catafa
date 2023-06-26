<?php 
    $edit_member_sql = "SELECT * FROM reg_form";
    $edit_member_query = mysqli_query($conn, $edit_member_sql);
    $edit_member_row = mysqli_fetch_assoc($edit_member_query);
?>

<div id ="edit-member<?php echo $id;?>" class="modal fade " data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
             <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/edit_member_submit.php?id=<?php echo $id; ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Member</h4>
                    <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button style="color: white;">
                </div>
                <div class="modal-body">
                    <div class=" w-100 bg-white">
                        <div class="row w-100 mb-2 form-group" style="<?php if ($edit_member_row['firstname'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">First name:</label>
                            </div>
                            <div class="col-8">
                                <input id="firstname" class="form-control" type="text" name="firstname" value="<?php echo $firstName; ?>">
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($edit_member_row['middlename'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Middle name:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" name="middlename" value="<?php echo $middleName; ?>">
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($edit_member_row['lastname'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Last name:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" name="lastname" value="<?php echo $lastName; ?>">
                            </div>   
                        </div>
                         <div class="row w-100 mb-2 form-group" style="<?php if ($edit_member_row['age'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Age:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="number" name="age" placeholder="Age" value="<?php echo $age; ?>">
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($edit_member_row['gender'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Gender:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select" name="gender">
                                    <option value="">Select</option>
                                    <option value="Male" <?php if ($gender == "male") {echo "selected";} ?>>Male</option>
                                    <option value="Female" <?php if ($gender == "female") {echo "selected";} ?>>Female</option>
                                </select>
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($edit_member_row['province'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Province:</label>
                            </div>
                            <div class="col-8">
                               <input id="firstname" class="form-control" type="text" name="province" value="<?php echo $province; ?>">    
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($edit_member_row['city'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">City/Municipality:</label>
                            </div>
                            <div class="col-8">
                               <input id="firstname" class="form-control" type="text" name="city" value="<?php echo $city; ?>">   
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($edit_member_row['barangay'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Barangay:</label>
                            </div>
                            <div class="col-8">
                               <input id="firstname" class="form-control" type="text" name="barangay" value="<?php echo $barangay; ?>">   
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($edit_member_row['mobile_number'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Mobile Number:</label>
                            </div>
                            <div class="col-8">
                               <input type="text" class="form-control" name="mobile-number" value="<?php echo $phoneNumber; ?>">   
                            </div>   
                        </div>
                        <div class="row w-100 mb-2 form-group" style="<?php if ($edit_member_row['land_area'] == 0) {echo "display:none;";} ?>">
                            <div class="col-4">
                                <label class="w-100 form-label">Land Area&nbsp(m<sup>2</sup>):</label>
                            </div>
                            <div class="col-8">
                               <input class="form-control" type="number" name="land-area" value="<?php echo $land; ?>">  
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-light border my-0" data-bs-dismiss="modal">Cancel</button>
                    <button id="submit" class="btn btn-primary my-0" type="submit" name="submit">Save</button>
                </div>
            </form>
		</div>
	</div>
</div>
