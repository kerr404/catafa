<!-- Modal -->
<div class="modal fade" id="date-range-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Date Range</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      	<form id="date-range-form">
		  <div class="modal-body">
		    <div class="row mb-3">
		    	<div class="col-2">
		    		<label class="form-label">From</label>
		    	</div>
		    	<div class="col">
		    		<input class="form-control" type="date" name="from" value="<?php echo date('Y-m-d'); ?>" required>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-2">
		    		<label class="form-label">To</label>
		    	</div>
		    	<div class="col">
		    		<input class="form-control" type="date" name="to" value="<?php echo date('Y-m-d'); ?>" required>
		    		<input type="hidden" name="custom" value="custom">
		    	</div>
		    </div>
		  </div>
		  <div class="modal-footer">
		    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
		    <button type="submit" name="submit" class="btn btn-primary">Apply</button>
		  </div>
  		</form>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
	  $('#date-range-form').submit(function(e) {
	    e.preventDefault(); // Prevent default form submit action
	    
	    // Get form data
	    var formData = $(this).serialize();
	    
	    // Send AJAX request
	    $.ajax({
	      url: '../actions/date_range.php',
	      type: 'POST',
	      data: formData,
	      success: function(response) {
	        // Handle successful submission
	        location.reload();
	      },
	      error: function(xhr, status, error) {
	        // Handle error
	        console.log(error);
	      }
	    });
	  });
	});


</script>
