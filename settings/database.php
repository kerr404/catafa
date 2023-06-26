<script type="text/javascript">
	//Removes get methods when page is reloaded
	if (performance.navigation.type === 1) {
  // The page was reloaded
  window.location.href = 'index.php?page=database';
}
</script>

<!--Import Success Message-->
<?php if(isset($_GET['import'])) { ?>
  <script>
    $( document ).ready(function() {
        $('#import-success').modal('show');  
    });
  </script>
<?php } ?>
<div id="import-success" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body text-center">
          <h4>Import Successful!</h4>

        <div class="mt-3">
          <button class="btn btn-primary btn-sm shadow-sm m-0" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Import Success Message-->
<?php if(isset($_GET['upload_failed'])) { ?>
  <script>
    $( document ).ready(function() {
        $('#import-failed').modal('show');  
    });
  </script>
<?php } ?>
<div id="import-failed" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body text-center">
          <h4 class="text-danger">Import Failed!</h4>

        <div class="mt-3">
          <button class="btn btn-danger btn-sm shadow-sm m-0" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!--RESET Success Message-->
<?php if(isset($_GET['reset']) AND $_GET['reset'] == 'success') { ?>
	<script>
		$( document ).ready(function() {
			$('#reset-success').modal('show'); 
		setTimeout(function() {
			$('#reset-success').modal('hide');
		}, 2000); // 1 seconds delay 
		});
	</script>
<?php } ?>
<div id="reset-success" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h3 class="text-success m-0">Reset Successful!</h3>
			</div>
		</div>
	</div>
</div>

<!--RESET Success Message-->
<?php if(isset($_GET['reset']) AND $_GET['reset'] == 'failed') { ?>
	<script>
		$( document ).ready(function() {
			$('#reset-failed').modal('show'); 
		setTimeout(function() {
			$('#reset-failed').modal('hide');
		}, 2000); // 1 seconds delay 
		});
	</script>
<?php } ?>
<div id="reset-failed" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<h3 class="text-danger m-0">Reset Failed!</h3>
			</div>
		</div>
	</div>
</div>



<div class="container-fluid m-2 p-4 shadow bg-white">
	<h4 style="color:#333333;" class="text-center">Database</h4>
	<hr class="text-secondary">
  <div class="row">
  	<div class="col-4 p-2 shadow">
      <h5>Backup</h5>
      <p>Export the system data.</p>
      <form id="dl-db-form" name="dl-db-form" method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/download_sql.php">
        <a id="download-sql" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#download-db">
          <span>
            <i class="fas fa-download"></i>
          </span>
          <span>
            Export
          </span>
        </a>
      </form>
    </div>
    <div class="col-4 p-2 mx-2 shadow">
    	<form id="up-db-form" name="up-db-form" action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/actions/upload_sql.php" method="POST" enctype="multipart/form-data">
    		<h5>Restore</h5>
          <p>Import data into the system.</p>
          <div class="row">
            <div>
              <input class="mb-1" type="file" name="upload-sql" id="upload-sql-file">
              <button id="upload-sql" type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#upload-db">
                <span>
                  <i class="fas fa-upload"></i>
                </span>
                <span>
                  Import
                </span>
              </button>
            </div>
          </div>
    	</form>
    </div>
    <div class="col-3 p-2 shadow">
	    <h5>Reset</h5>
  	    <p class="card-text">Reset the Database.</p>
        <form id="reset-db-form" method="POST" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/catafa/actions/reset_db.php">
    	   <button id="reset-button" type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reset-db">
            <span>
              <i class="fas fa-eraser"></i>
            </span>
            <span>
              Reset
            </span>
         </button>
       </form>
	 </div>
  </div>
</div>

<!-- Download DB Modal -->
<div class="modal fade" id="download-db" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="w-100 d-flex justify-content-end">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="form-group mb-3 px-5">
            <h5 class="modal-title text-center">Enter password to continue.</h5>
            <input type="password" class="mt-2 form-control" placeholder="Enter password" id="password" required>
            <span id="dl-error-message" class="text-danger"></span>
          </div>
          <div class="w-100 d-flex justify-content-center">
            <button id="download" name="submit" class="btn btn-success my-0">Continue</button>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Download DB Ajax -->
<script>
  $(document).ready(function() {
    //prevent the form from submitting
    $("#download-sql").click(function(event) {
      event.preventDefault();
    });

    // Verify the Password
    $("#download").click(function() {
      var pass = $("#password").val();
      $.ajax({
        type: "POST",
        url: "verify_password.php",
        data: {pass: pass},
        success: function(data) {
          if (data == "success") {
            $("#dl-db-form").submit();
            $("#download-db").modal('hide');
          } else{
            $("#dl-error-message").text("Incorrect password");
          }
        },
        error: function() {
          alert("Error");
        }
      });
    })
  });
</script>


<!-- Upload DB Modal -->
<div class="modal fade" id="upload-db" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <div class="w-100 d-flex justify-content-end">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="form-group mb-3 px-5">
            <h5 class="modal-title text-center">Enter password to continue.</h5>
            <input  type="password" class="mt-2 form-control" placeholder="Enter password" id="up-password" required>
            <span id="up-error-message" class="text-danger"></span>
          </div>
          <div class="w-100 d-flex justify-content-center">
            <button id="upload" class="btn btn-success my-0">Continue</button>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Upload DB Ajax -->
<script>
  $(document).ready(function() {
    //prevent the form from submitting
    $("#upload-sql").click(function(event) {
      event.preventDefault();
    });

    // Verify the Password
    $("#upload").click(function() {
      var pass = $("#up-password").val();
      $.ajax({
        type: "POST",
        url: "verify_password.php",
        data: {pass: pass},
        success: function(data) {
          if (data == "success") {
            $("#up-db-form").submit();
            $("#upload-db").modal('hide');
          } else{
            $("#up-error-message").text("Incorrect password");
          }
        },
        error: function() {
          alert("Error");
        }
      });
    })
  });
</script>

<!-- Reset DB Modal -->
<div class="modal fade" id="reset-db" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <div class="w-100 d-flex justify-content-end">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="form-group mb-3 px-5">
            <h5 class="modal-title text-center">Enter password to continue.</h5>
            <input  type="password" class="mt-2 form-control" placeholder="Enter password" id="reset-password" required>
            <span id="reset-error-message" class="text-danger"></span>
          </div>
          <div class="w-100 d-flex justify-content-center">
            <button id="reset" class="btn btn-success my-0">Continue</button>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Reset DB Ajax -->
<script>
  $(document).ready(function() {
    //prevent the form from submitting
    $("#reset-button").click(function(event) {
      event.preventDefault();
    });

    // Verify the Password
    $("#reset").click(function() {
      var pass = $("#reset-password").val();
      $.ajax({
        type: "POST",
        url: "verify_password.php",
        data: {pass: pass},
        success: function(data) {
          if (data == "success") {
            $("#reset-db-form").submit();
            $("#reset-db").modal('hide');
          } else{
            $("#reset-error-message").text("Incorrect password");
          }
        },
        error: function() {
          alert("Error");
        }
      });
    })
  });
</script>
