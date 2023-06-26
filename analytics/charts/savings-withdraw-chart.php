<?php
  $current_date = date('Y-m-d');


//SAVINGS WITHDRAW
  $sql13 = "SELECT SUM(withdraw_amount) as total_amount FROM savings_withdraw WHERE MONTH(withdraw_date) = MONTH('$current_date')";
  $query13 = mysqli_query($conn, $sql13);
  $row13 = mysqli_fetch_assoc($query13);

  $sql14 = "SELECT SUM(withdraw_amount) as total_amount FROM savings_withdraw WHERE MONTH(withdraw_date) = MONTH(DATE_SUB('$current_date', INTERVAL 1 MONTH))";
  $query14 = mysqli_query($conn, $sql14);
  $row14 = mysqli_fetch_assoc($query14);

  $sql15 = "SELECT SUM(withdraw_amount) as total_amount FROM savings_withdraw WHERE MONTH(withdraw_date) = MONTH(DATE_SUB('$current_date', INTERVAL 2 MONTH))";
  $query15 = mysqli_query($conn, $sql15);
  $row15 = mysqli_fetch_assoc($query15);

  $sql16 = "SELECT SUM(withdraw_amount) as total_amount FROM savings_withdraw WHERE MONTH(withdraw_date) = MONTH(DATE_SUB('$current_date', INTERVAL 3 MONTH))";
  $query16 = mysqli_query($conn, $sql16);
  $row16 = mysqli_fetch_assoc($query16);

  $sql17 = "SELECT SUM(withdraw_amount) as total_amount FROM savings_withdraw WHERE MONTH(withdraw_date) = MONTH(DATE_SUB('$current_date', INTERVAL 4 MONTH))";
  $query17 = mysqli_query($conn, $sql17);
  $row17 = mysqli_fetch_assoc($query17);

  $sql18 = "SELECT SUM(withdraw_amount) as total_amount FROM savings_withdraw WHERE MONTH(withdraw_date) = MONTH(DATE_SUB('$current_date', INTERVAL 5 MONTH))";
  $query18 = mysqli_query($conn, $sql18);
  $row18 = mysqli_fetch_assoc($query18);

  $sql19 = "SELECT SUM(withdraw_amount) as total_amount FROM savings_withdraw WHERE MONTH(withdraw_date) = MONTH(DATE_SUB('$current_date', INTERVAL 6 MONTH))";
  $query19 = mysqli_query($conn, $sql19);
  $row19 = mysqli_fetch_assoc($query19);

  $sql20 = "SELECT SUM(withdraw_amount) as total_amount FROM savings_withdraw WHERE MONTH(withdraw_date) = MONTH(DATE_SUB('$current_date', INTERVAL 7 MONTH))";
  $query20 = mysqli_query($conn, $sql20);
  $row20 = mysqli_fetch_assoc($query20);

  $sql21 = "SELECT SUM(withdraw_amount) as total_amount FROM savings_withdraw WHERE MONTH(withdraw_date) = MONTH(DATE_SUB('$current_date', INTERVAL 8 MONTH))";
  $query21 = mysqli_query($conn, $sql21);
  $row21 = mysqli_fetch_assoc($query21);

  $sql22 = "SELECT SUM(withdraw_amount) as total_amount FROM savings_withdraw WHERE MONTH(withdraw_date) = MONTH(DATE_SUB('$current_date', INTERVAL 9 MONTH))";
  $query22 = mysqli_query($conn, $sql22);
  $row22 = mysqli_fetch_assoc($query22);

  $sql23 = "SELECT SUM(withdraw_amount) as total_amount FROM savings_withdraw WHERE MONTH(withdraw_date) = MONTH(DATE_SUB('$current_date', INTERVAL 10 MONTH))";
  $query23 = mysqli_query($conn, $sql23);
  $row23= mysqli_fetch_assoc($query23);

  $sql24 = "SELECT SUM(withdraw_amount) as total_amount FROM savings_withdraw WHERE MONTH(withdraw_date) = MONTH(DATE_SUB('$current_date', INTERVAL 11 MONTH))";
  $query24 = mysqli_query($conn, $sql24);
  $row24 = mysqli_fetch_assoc($query24);

  // MONTHLY SAVINGS WITHDRAW
  $month_1 = $row13['total_amount'];
  $month_2 = $row14['total_amount'];
  $month_3 = $row15['total_amount'];
  $month_4 = $row16['total_amount'];
  $month_5 = $row17['total_amount'];
  $month_6 = $row18['total_amount'];
  $month_7 = $row19['total_amount'];
  $month_8 = $row20['total_amount'];
  $month_9 = $row21['total_amount'];
  $month_10 = $row22['total_amount'];
  $month_11 = $row23['total_amount'];
  $month_12 = $row24['total_amount'];
?>



<script>
    $(document).ready(function() {

        // CONVERT php variable to JS
        var month_1 = '<?php echo $month_1 ?>';
        var month_2 = '<?php echo $month_2 ?>';
        var month_3 = '<?php echo $month_3 ?>';
        var month_4 = '<?php echo $month_4 ?>';
        var month_5 = '<?php echo $month_5 ?>';
        var month_6 = '<?php echo $month_6 ?>';
        var month_7 = '<?php echo $month_7 ?>';
        var month_8 = '<?php echo $month_8 ?>';
        var month_9 = '<?php echo $month_9 ?>';
        var month_10 = '<?php echo $month_10 ?>';
        var month_11 = '<?php echo $month_11 ?>';
        var month_12 = '<?php echo $month_12 ?>';


        // Define the data for the chart
        var data = {
            labels: [], // Empty array to hold labels for the last 12 months
            datasets: [{
                label: 'Monthly Balance Withdraws',
                data: [month_12, month_11, month_10, month_9, month_8, month_7, month_6, month_5, month_4, month_3, month_2, month_1], // Empty array to hold loaned amount data for the last 12 months
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Get the current date
        var currentDate = new Date();

        // Loop through the last 12 months, starting with the current month
        for (var i = 0; i < 12; i++) {
            // Subtract i months from the current date
            var date = new Date(currentDate.getFullYear(), currentDate.getMonth() - i, 1);

            // Add the label to the data object
            data.labels.unshift(date.toLocaleString('default', { month: 'short'}));  
        }

        // Create the chart
        var ctx = document.getElementById('monthly-savings-withdraw').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
</script>
