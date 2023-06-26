<script type="text/javascript">
	//Removes get methods when page is reloaded
	if (performance.navigation.type === 1) {
  // The page was reloaded
  window.location.href = 'index.php?page=registration-form';
}
</script>

<?php
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
	$sql = "SELECT * FROM reg_form";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);
 ?>

<!--EDIT Success Message-->
<?php if(isset($_GET['edit']) AND $_GET['edit'] == 'success') { ?>
		<script>
			$( document ).ready(function() {
			    $('#edit-success').modal('show'); 
			    $('#edit-success').modal('show');
            setTimeout(function() {
                $('#edit-success').modal('hide');
            }, 2000); // 1 seconds delay 
			});
		</script>
	<?php } ?>
	<div id="edit-success" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
					<h4 class="text-success m-0">Updated Successfully!</h4>
				</div>
			</div>
		</div>
	</div>

	<!--EDIT Failed Message-->
	<?php if(isset($_GET['edit']) AND $_GET['edit'] == 'failed') { ?>
		<script>
			$( document ).ready(function() {
			    $('#edit-failed').modal('show'); 
			    $('#edit-failed').modal('show');
            setTimeout(function() {
                $('#edit-failed').modal('hide');
            }, 2000); // 1 seconds delay 
			});
		</script>
	<?php } ?>
	<div id="edit-failed" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
					<h3 class="text-danger m-0">Update failed!</h3>
				</div>
			</div>
		</div>
	</div>

<!-- Add Loan Plan - Enter Password-->
<div class="modal fade" id="edit-reg-form-pass-modal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <div class="w-100 d-flex justify-content-end">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="form-group mb-3 px-5">
            <h5 class="modal-title text-center">Enter password to continue.</h5>
            <input  type="password" class="mt-2 form-control" placeholder="Enter password" id="edit-reg-form-pass" required>
            <span id="edit-reg-form-error-message" class="text-danger"></span>
          </div>
          <div class="w-100 d-flex justify-content-center">
            <button id="edit-reg-form-submit" class="btn btn-success my-0">Continue</button>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Loan Plan - Enter Password Ajax-->
<script>
  $(document).ready(function() {
    //prevent the form from submitting
    $("#edit-reg-form-submit").click(function(event) {
      event.preventDefault();
    });

    // Verify the Password
    $("#edit-reg-form-submit").click(function() {
      var pass = $("#edit-reg-form-pass").val();
      $.ajax({
        type: "POST",
        url: "verify_password.php",
        data: {pass: pass},
        success: function(data) {
          if (data == "success") {
            $("#edit-reg-form-pass-modal").modal('hide');
            $("#edit-registration-form").submit();
          } else{
            $("#edit-reg-form-error-message").text("Incorrect password");
          }
        },
        error: function() {
          alert("Error");
        }
      });
    })
  });
</script>

<div class="p-4 m-2 bg-white shadow">
	<h4 style="color:#333333;">Form Inclusion Choices</h4>
	<hr class="text-secondary">
	<form id="edit-registration-form" name="edit-registration-form" method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/edit_registration_form.php" enctype="multipart/form-data">
		<div class="form-check">
	        <input class="form-check-input" type="checkbox" name="first-name" value="1" id="first-name" <?php if ($row['firstname'] == 1) {echo "checked";} ?>>
	        <label class="form-check-label" for="formCheck1">
	          First name
	        </label>
	    </div>
	    <div class="form-check">
	        <input class="form-check-input" type="checkbox" name="middle-name" value="1" id="middle-name" <?php if ($row['middlename'] == 1) {echo "checked";} ?>>
	        <label class="form-check-label" for="formCheck2">
	          Middle name
	        </label>
	    </div>
	    <div class="form-check">
	        <input class="form-check-input" type="checkbox" name="last-name" value="1" id="last-name" <?php if ($row['lastname'] == 1) {echo "checked";} ?>>
	        <label class="form-check-label" for="formCheck3">
	          Last name
	        </label>
	    </div>
	    <div class="form-check">
	        <input class="form-check-input" type="checkbox" name="age" value="1" id="age" <?php if ($row['age'] == 1) {echo "checked";} ?>>
	        <label class="form-check-label" for="formCheck1">
	          Age
	        </label>
	    </div>
	    <div class="form-check">
	        <input class="form-check-input" type="checkbox" name="gender" value="1" id="gender" <?php if ($row['gender'] == 1) {echo "checked";} ?>>
	        <label class="form-check-label" for="formCheck2">
	          Gender
	        </label>
	    </div>
	    <div class="form-check">
	        <input class="form-check-input" type="checkbox" name="mobile-number" value="1" id="mobile-number" <?php if ($row['mobile_number'] == 1) {echo "checked";} ?>>
	        <label class="form-check-label" for="formCheck3">
	          Mobile Number
	        </label>
	    </div>
	    <div class="form-check">
	        <input class="form-check-input" type="checkbox" name="province" value="1" id="province" <?php if ($row['province'] == 1) {echo "checked";} ?>>
	        <label class="form-check-label" for="formCheck1">
	          Province
	        </label>
	    </div>
	    <div class="form-check">
	        <input class="form-check-input" type="checkbox" name="city" value="1" id="city" <?php if ($row['city'] == 1) {echo "checked";} ?>>
	        <label class="form-check-label" for="formCheck2">
	          City
	        </label>
	    </div>
	    <div class="form-check">
	        <input class="form-check-input" type="checkbox" name="barangay" value="1" id="barangay" <?php if ($row['barangay'] == 1) {echo "checked";} ?>>
	        <label class="form-check-label" for="formCheck3">
	          Barangay
	        </label>
	    </div>
	    <div class="form-check">
	        <input class="form-check-input" type="checkbox" name="land-area" value="1" id="land-area" <?php if ($row['land_area'] == 1) {echo "checked";} ?>>
	        <label class="form-check-label" for="formCheck3">
	          Land Area
	        </label>
	    </div>
	    </form>
      <!-- Add more checkboxes as needed -->
      <button data-bs-toggle="modal" data-bs-target="#edit-reg-form-pass-modal" name="submit" class="btn btn-primary mt-3">Save</button>
	
</div>