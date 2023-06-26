<script type="text/javascript">
	//Removes get methods when page is reloaded
	if (performance.navigation.type === 1) {
  // The page was reloaded
  window.location.href = 'account.php';
}
</script>
<?php 
	$page_title = "Account";
 ?>
<?php
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/header.php";
	require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

	$sql = "SELECT * FROM admins WHERE admin_id = 1";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);
?>
<div class="col-5 m-4 p-4 shadow" style="height: 300px;">
	<div class="row mb-3">
		<h3>Account</h3>	
	</div>
	<div class="row">
		<div class="form-group">
			<label class="form-label m-0">Username</label>
			<input class="mb-1 form-control shadow-sm" type="text" name="username" value="<?php echo $row['admin_username']; ?>">
		</div>
		<div class="mt-1 mb-2 form-group">
			<label class="form-label m-0">Password</label>
			<input class="form-control shadow-sm" type="password" name="password" value="********" disabled>
		</div>
		<div>
			<a href="../forgot-password.php" class="btn btn-primary">Change Password</a>
		</div>	
	</div>
</div>

<!--MODALS-->
<!--RESET PASS Success Message-->
	<?php if(isset($_GET['reset'])) { ?>
		<script>
			$( document ).ready(function() {
			    $('#reset-success').modal('show');  
			});
		</script>
	<?php } ?>
	<div id="reset-success" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body text-center">
						<h4>Password Changed!</h4>

					<div class="mt-3">
						<button class="btn btn-outline-primary btn-sm shadow-sm m-0" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/footer.php";
?>
