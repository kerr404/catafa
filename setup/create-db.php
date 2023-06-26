<?php
// Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if database already exists
$dbname = "catafadb";
$sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'";
$result = mysqli_query($conn, $sql);

// If database doesn't exist, create it
if (mysqli_num_rows($result) == 0) {
    $sql2 = "CREATE DATABASE $dbname";
    if (mysqli_query($conn, $sql2)) {
        include $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
        // Open SQL file
        $sql_file = $_SERVER['DOCUMENT_ROOT']."/catafa/assets/sql/reset-db/restore.sql";
        $sql3 = file_get_contents($sql_file);

        // Execute SQL queries
        if (mysqli_multi_query($conn, $sql3)) {
            header("Location: install-success.php");
        } else {
            echo "Error executing SQL file: " . mysqli_error($conn);
        }
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }
} else {
    echo "Database already exists";
}

// Close connection
mysqli_close($conn);

?>
