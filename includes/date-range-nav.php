<?php
	// Get the date_range_id
	$date_range_sql = "SELECT * FROM settings WHERE id = 1";
	$date_range_query = mysqli_query($conn, $date_range_sql);
	$date_range_row = mysqli_fetch_assoc($date_range_query);
	$date_range_id = $date_range_row['date_range_id'];

	include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/date-range.php";
 ?>

 <div class="btn shadow-sm bg-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" title="Set the date range">

 		<?php
 		if ($date_range_id == '365250') {
 			echo "Lifetime";
 		} elseif ($date_range_id == 'custom') {
 			echo "Custom";
 		} else {
 		echo "Last ".$date_range_id." Days";
 		}
 	 ?>

</div>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
	<li>
		<button type="button" id="7" class="dropdown-item time-range-item" style="<?php if ($date_range_id == '7') { echo "background-color: #ebebeb;"; } ?>">Last 7 days</button>
	</li>
	<li>
		<button type="button" id="15" class="dropdown-item time-range-item" style="<?php if ($date_range_id == '15') { echo "background-color: #ebebeb;"; } ?>">Last 15 days</button>
	</li>
	<li>
		<button type="button" id="30" class="dropdown-item time-range-item" style="<?php if ($date_range_id == '30') { echo "background-color: #ebebeb;"; } ?>">Last 30 days</button>
	</li>
	<li>
		<button type="button" id="365250" class="dropdown-item time-range-item" style="<?php if ($date_range_id == '365250') { echo "background-color: #ebebeb;"; } ?>">Lifetime</button>
	</li>
		<div class="dropdown-divider"></div>
	<li>
		<a type="button" id="custom" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#date-range-modal" style="<?php if ($date_range_id == 'custom') { echo "background-color: #ebebeb;"; } ?>">Custom</a>
	</li>
</ul>

<!---------_______JQUERY for DATE RANGE_________---------->
<script>
$(document).ready(function() {
    $('.time-range-item').click(function(e) {
        e.preventDefault(); // Prevent default link behavior
        var days = this.id;  // Get the ID of the clicked button

        // Make AJAX call
        $.ajax({
            url: '../actions/date_range.php',
            type: 'POST',
            data: { 
            	days: days // Include the ID of the clicked button in data parameter 
             },
            success: function(response) {
                // Handle successful response
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