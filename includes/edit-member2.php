<div id ="edit-member<?php echo $id;?>" class="modal fade " data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-light website-color">
                <h4 class="modal-title">Edit Member</h4>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button style="color: white;">
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/edit_member_submit.php">
                    <div class="w-100 p-2 border" style="background-color:#f2f2f2;">
                        <div  class="mt-3">
                            <label class="form-label">Full name</label><br>
                            <div class="w-100 mb-2 d-flex flex-row">
                                <div class="w-50 m-1 form-group">                                             
                                    <input id="firstname" class="mb-2 form-control" type="text" name="firstname" placeholder="First name" value="<?php echo $firstName; ?>" required>                
                                </div>
                                <div class="w-50 m-1 form-group">
                                    <input class="mb-2 form-control" type="text" name="middlename" placeholder="Middle name" value="<?php echo $middleName; ?>" required>
                                </div>
                                <div class="w-50 m-1 form-group">
                                     <input class="mb-2 form-control" type="text" name="lastname" placeholder="Last name" value="<?php echo $lastName; ?>" required>
                                </div>  
                            </div>

                            <div class="w-100 mb-2 d-flex flex-row">
                                <div class="w-50 m-1 form-group">
                                    <label class="form-label">Province</label><br>                                             
                                    <input id="firstname" class="mb-2 form-control" type="text" name="province" value="<?php echo $province; ?>" required>                
                                </div>
                                <div class="w-50 m-1 form-group">
                                    <label class="form-label">City/Municipality</label><br>                                             
                                    <input id="firstname" class="mb-2 form-control" type="text" name="city" value="<?php echo $city; ?>" required>
                                </div>
                                <div class="w-50 m-1 form-group">
                                    <label class="form-label">Barangay</label><br>                                             
                                    <input id="firstname" class="mb-2 form-control" type="text" name="barangay" value="<?php echo $barangay; ?>" required>
                                </div>  
                            </div>
                            <div class="w-100 mb-2 d-flex flex-row">
                                <div class="w-50 m-1 form-group">
                                    <label class="form-label">Mobile number</label><br>  
                                        <input type="text" class="form-control" name="mobile-number" value="<?php echo $phoneNumber; ?>" required>
                                </div>
                                <div class="w-50 m-1 form-group">
                                    <label class="form-label">Land Area&nbsp(m<sup>2</sup>) </label><br>
                                        <input class="mb-2 form-control" type="number" name="land-area" value="<?php echo $land; ?>" required>
                                </div>
                                <!--
                                    THE STATUS VALUE input is 
                                    sent from add_member_submit.php 
                                    to Database a '0' by default, 
                                    it means PENDING USER.

                                    0 = pending user
                                    1 = active member
                                -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <span>
                        <i class="fas fa-times fa-lg"></i>
                    </span>
                    <span>Close</span>
                </button>
                <button id="submit" class="btn btn-success" type="submit" name="registration-submit">
                    <span>
                        <i class="fas fa-check fa-lg"></i>
                    </span>
                    <span>Save</span>
                </button>
            </div>
        </div>
    </div>
</div>

