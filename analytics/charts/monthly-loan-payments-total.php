<!--------################################### MONTHLY LOAN PAYMENTS AMOUNT CHART Start ##############################--------->
<?php

    $current_date = date('Y-m-d');

    // CURRECT MONTH
    $sql = "SELECT SUM(amount) as total_amount FROM loan_payments WHERE MONTH(date_created) = MONTH('$current_date')";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    // LAST MONTH
    $sql2 = "SELECT SUM(amount) as total_amount FROM loan_payments WHERE MONTH(date_created) = MONTH(DATE_SUB('$current_date', INTERVAL 1 MONTH))";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);

    // CURRECT MONTH - 2
    $sql3 = "SELECT SUM(amount) as total_amount FROM loan_payments WHERE MONTH(date_created) = MONTH(DATE_SUB('$current_date', INTERVAL 2 MONTH))";
    $query3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($query3);


    $sql4 = "SELECT SUM(amount) as total_amount FROM loan_payments WHERE MONTH(date_created) = MONTH(DATE_SUB('$current_date', INTERVAL 3 MONTH))";
    $query4 = mysqli_query($conn, $sql4);
    $row4 = mysqli_fetch_assoc($query4);

    $sql5 = "SELECT SUM(amount) as total_amount FROM loan_payments WHERE MONTH(date_created) = MONTH(DATE_SUB('$current_date', INTERVAL 4 MONTH))";
    $query5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($query5);

    $sql6 = "SELECT SUM(amount) as total_amount FROM loan_payments WHERE MONTH(date_created) = MONTH(DATE_SUB('$current_date', INTERVAL 5 MONTH))";
    $query6 = mysqli_query($conn, $sql6);
    $row6 = mysqli_fetch_assoc($query6);

    $sql7 = "SELECT SUM(amount) as total_amount FROM loan_payments WHERE MONTH(date_created) = MONTH(DATE_SUB('$current_date', INTERVAL 6 MONTH))";
    $query7 = mysqli_query($conn, $sql7);
    $row7 = mysqli_fetch_assoc($query7);

    $sql8 = "SELECT SUM(amount) as total_amount FROM loan_payments WHERE MONTH(date_created) = MONTH(DATE_SUB('$current_date', INTERVAL 7 MONTH))";
    $query8 = mysqli_query($conn, $sql8);
    $row8 = mysqli_fetch_assoc($query8);

    $sql9 = "SELECT SUM(amount) as total_amount FROM loan_payments WHERE MONTH(date_created) = MONTH(DATE_SUB('$current_date', INTERVAL 8 MONTH))";
    $query9 = mysqli_query($conn, $sql9);
    $row9 = mysqli_fetch_assoc($query9);

    $sql10 = "SELECT SUM(amount) as total_amount FROM loan_payments WHERE MONTH(date_created) = MONTH(DATE_SUB('$current_date', INTERVAL 9 MONTH))";
    $query10 = mysqli_query($conn, $sql10);
    $row10 = mysqli_fetch_assoc($query10);

    $sql11 = "SELECT SUM(amount) as total_amount FROM loan_payments WHERE MONTH(date_created) = MONTH(DATE_SUB('$current_date', INTERVAL 10 MONTH))";
    $query11 = mysqli_query($conn, $sql11);
    $row11 = mysqli_fetch_assoc($query11);

    $sql12 = "SELECT SUM(amount) as total_amount FROM loan_payments WHERE MONTH(date_created) = MONTH(DATE_SUB('$current_date', INTERVAL 11 MONTH))";
    $query12 = mysqli_query($conn, $sql12);
    $row12 = mysqli_fetch_assoc($query12);

    // MONTHLY LOANED AMMOUNT
    $month_1 = $row['total_amount'];
    $month_2 = $row2['total_amount'];
    $month_3 = $row3['total_amount'];
    $month_4 = $row4['total_amount'];
    $month_5 = $row5['total_amount'];
    $month_6 = $row6['total_amount'];
    $month_7 = $row7['total_amount'];
    $month_8 = $row8['total_amount'];
    $month_9 = $row9['total_amount'];
    $month_10 = $row10['total_amount'];
    $month_11 = $row11['total_amount'];
    $month_12 = $row12['total_amount'];

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
                label: 'Monthly Loan Payments',
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
        var ctx = document.getElementById('monthly-loan-payments-chart').getContext('2d');
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

<!--------################################### MONTHLY LOAN PAYMENTS AMOUNT CHART END ##############################--------->