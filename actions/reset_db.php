<?php
if (isset($_POST)) {
    require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

        // DELETES ALL THE TABLES IN THE DATABASE BEFORE THE IMPORT
        $result = mysqli_query($conn, "SHOW TABLES");
        // Loop through tables and drop them
        while ($row2 = mysqli_fetch_array($result)) {
            mysqli_query($conn, "DROP TABLE IF EXISTS " . $row2[0]);
        }

        // Read the UPLOADED SQL file to import the tables
        $sql2 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/catafa/assets/sql/reset-db/restore.sql");
        $query2 = mysqli_multi_query($conn, $sql2);

        // Execute SQL commands
        if ($query2) {
            // Waits for 1 second before redirecting. To make sure the query is done.
            header("Refresh: 1; ../settings/index.php?page=database&reset=success");
            exit();
        } else {
            header("Location: ../settings/index.php?page=database&reset=failed");
            exit();
        }

    mysqli_close($conn);
}
?>
