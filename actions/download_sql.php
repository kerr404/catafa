
<?php
if (isset($_POST)) {
    require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";
        // Name of the exported SQL file
        $filename = "backup_db_".date('Y-m-d').".sql";

        // MySQL query to get all tables in the database
        $tables = array();
        $result = mysqli_query($conn, "SHOW TABLES");
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }

        // Loop through all tables and write their data to the SQL file
        $sql = "";
        foreach ($tables as $table) {
            // Get the table structure
            $result = mysqli_query($conn, "SHOW CREATE TABLE $table");
            $row = mysqli_fetch_row($result);
            $sql .= "\n\n" . $row[1] . ";\n\n";
            
            // Get the table data
            $result = mysqli_query($conn, "SELECT * FROM $table");
            while ($row = mysqli_fetch_assoc($result)) {
                $sql .= "INSERT INTO $table VALUES(";
                foreach ($row as $field) {
                    $sql .= "'" . mysqli_real_escape_string($conn, $field) . "',";
                }
                $sql = rtrim($sql, ",");
                $sql .= ");\n";
            }
        }

        // Write the SQL to the file
        $file = fopen($filename, "w");
        fwrite($file, $sql);
        fclose($file);

        // Download the SQL file as an attachment
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filename));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        ob_clean();
        flush();
        readfile($filename);

        // Delete the SQL file from the server
        unlink($filename);

        mysqli_close($conn);
       
}
?>
