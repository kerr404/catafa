<?php
// Set timezone
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i:s');
$current_date = date('Y-m-d');
$current_day = date('d');
$current_month = date('m');

include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

$sql0 = "SELECT * FROM savings_plan LIMIT 1";
$query0 = mysqli_query($conn, $sql0);
$row0 = mysqli_fetch_assoc($query0);
$plan_check = mysqli_num_rows($query0);

// Check if there is a Savings Plan. If id there is, then ezxecute the code below.
if ($plan_check > 0) {

    //Creditor function
    function credit_money($interest, $new_last_crediting_date) {
        include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
        include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/functions/unique-id-generator.php";
        $ref_no = refNum8();
        $date = date('Y-m-d H:i:s');

        $sql2 = "SELECT * FROM savings_account_list";
        $query2 = mysqli_query($conn, $sql2);
        while ($row2 = mysqli_fetch_assoc($query2)) {
            $id = $row2['id'];
            $account_holder_id = $row2['account_holder_id'];
            $account_number = $row2['account_number'];
            $account_balance = $row2['account_balance'];
            $earned_amount = $account_balance * $interest;

            $sql3 = "UPDATE savings_account_list SET earnings_balance = earnings_balance + (account_balance * $interest) WHERE id = '$id'";
            $query3 = mysqli_query($conn, $sql3);

            $sql4 = "INSERT INTO savings_interest_earnings (account_number, amount, ref_no, date) VALUES ('$account_number', '$earned_amount', '$ref_no', '$date')";
            $query4 = mysqli_query($conn, $sql4);

            $sql5 = "INSERT INTO savings_history (member_id, account_number, credit, description, ref_no, date) VALUES ('$account_holder_id', '$account_number', '$earned_amount', 'Interest Earnings', '$ref_no', '$date')";
            $query5 = mysqli_query($conn, $sql5);
        }
        if ($query2) {
            $sql5 = "UPDATE savings_plan SET last_interest_crediting_date = '$new_last_crediting_date'";
            $query5 = mysqli_query($conn, $sql5);
            if ($query5) {
                echo "success";
            } else {
                echo "failed";
            } 
        } else {
           // UNDO $query2
        }
    }




    $last_crediting_date = $row0['last_interest_crediting_date'];
    $crediting_freq = $row0['interest_crediting_freq'];
    $interest = $row0['interest_percentage'];


    // For Monthly Crediting Freq.
    if ($crediting_freq == 1) {

        // Add 1 month to date but still maintain the day
        $date1 = DateTime::createFromFormat('Y-m-d', $last_crediting_date);
        $date1->modify('+1 month'); // Add one month to the date
        $new_last_crediting_date = $date1->format('Y-m-d');

        //Check if the current data is equal to the last crediting date plus 1 month
        if ($current_date >= $new_last_crediting_date) {
            credit_money($interest, $new_last_crediting_date);
        } 
    } 





    // For Biweekly Crediting Freq.
    else if ($crediting_freq == 2) {
        $crediting_day_1 = $row0['crediting_day_1'];
        $crediting_day_2 = $row0['crediting_day_2'];

        $day_last_crediting_date = date('d', strtotime($last_crediting_date)); // Get the day only of last credit date

        // Check if last credit is day 1, if yes: set the last credit to day 2
        if ($day_last_crediting_date == $crediting_day_1) {

            // Change the day of last_crediting_date to next crediting date
            $date1 = new DateTime($last_crediting_date);
            $date1->modify('+' . ($crediting_day_2 - 1) . ' day');
            $new_last_crediting_date = $date1->format('Y-m-d');

            if ($current_date >= $new_last_crediting_date) {
                credit_money($interest/2, $new_last_crediting_date);
            }   
        }


        // if last credit is day 2, set the last credit to day 1
        else {

            $month_last_crediting_date = date('m', strtotime($last_crediting_date)); // Get the month only of last credit
            
            // check if the last credit month is december(12), if yes: +1 to year, set month to '01'
            if ($month_last_crediting_date == 12) {
                $date1 = new DateTime($last_crediting_date);
                $date1->setDate($date1->format('Y') + 1, 1, $crediting_day_2);
                $new_last_crediting_date = $date1->format('Y-m-d');

                if ($current_date >= $new_last_crediting_date) {
                    credit_money($interest/2, $new_last_crediting_date);
                }
            }
            else {
                $date1 = new DateTime($last_crediting_date);
                $date1->setDate($date1->format('Y'), $date1->format('m'), $crediting_day_2);
                $date1->modify('+1 month');
                $new_last_crediting_date = $date1->format('Y-m-d');

                if ($current_date >= $new_last_crediting_date) {
                    credit_money($interest/2, $new_last_crediting_date);
                }
            }
        }
    }





}





 ?>


