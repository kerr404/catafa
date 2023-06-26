<?php 
    $sql = "SELECT loan_plan, COUNT(*) as count FROM loan_list GROUP BY loan_plan";
    $query = mysqli_query($conn, $sql);
    $active_plans_count = mysqli_num_rows($query);
    echo $active_plans_count; 

    $row = array();
    for ($i = 0; $i < $active_plans_count; $i++) {
        $row[$i] = mysqli_fetch_assoc($query);
    }

?>

<script>
        // Get the canvas element
    var ctx = document.getElementById("loan-plans-chart").getContext("2d");

    // Define the data for the chart
    var data = {
        labels: ["Red", "Blue", "Yellow"],
        datasets: [{
            data: [30, 50, 20],
            backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"],
            hoverBackgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"]
        }]
    };

    // Create the chart
    var myPieChart = new Chart(ctx,{
        type: 'pie',
        data: data
    });

</script>