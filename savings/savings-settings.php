<script type="text/javascript">
	//Removes get methods when page is reloaded
	if (performance.navigation.type === 1) {
  // The page was reloaded
  window.location.href = 'index.php?page=display';
}
</script>

<!---MODALS-->
<?php if(isset($_GET['update'])) { ?>
		<script>
			$( document ).ready(function() {
			    $('#update-success').modal('show');
			     $('#update-success').modal('show');
            setTimeout(function() {
                $('#update-success').modal('hide');
            }, 1500); // 1.5 seconds delay  
			});
		</script>
	<?php } ?>
	<div id="update-success" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
					<h4 class="text-success m-0">Updated Successfully!</h4>
				</div>
			</div>
		</div>
	</div>

<!-- Save Changes Modal -->
<div class="modal fade" id="edit-appearance-modal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      	<div class="w-100 d-flex justify-content-end">
      		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      	</div>
          <div class="form-group mb-3 px-5">
            <h5 class="modal-title text-center">Enter password to continue.</h5>
            <input name="password" type="password" class="mt-2 form-control" placeholder="Enter password" id="password" required>
            <span id="error-message" class="text-danger"></span>
          </div>
          <div class="w-100 d-flex justify-content-center">
          	<button id="save" name="submit" class="btn btn-success my-0">Continue</button>
          </div>
      </div>
    </div>
  </div>
</div>

<!---->
<script>
	$(document).ready(function() {
		$("#save").click(function() {
			var pass = $("#password").val();
			$.ajax({
				type: "POST",
				url: "verify_password.php",
				data: {pass: pass},
				success: function(data) {
					if (data == "success") {
						$("#appearance-form").submit();
					} else{
						$("#error-message").text("Incorrect password");
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
	<h4 style="color:#333333;">Savings</h4>
	<hr class="text-secondary">
	
</div>