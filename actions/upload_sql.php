<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

        $target_dir = $_SERVER['DOCUMENT_ROOT']."/catafa/assets/sql/"; // the folder where the file will be uploaded
        $target_file = $target_dir . "restore.sql"; // the full path to the uploaded file
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check file size
        if ($_FILES["upload-sql"]["size"] > 50000000) { // limit file size to 500KB
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "sql") {
            header("Location: ../settings/index.php?upload_failed=invalid_file_type");
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["upload-sql"]["tmp_name"], $target_file)) {
                
                // DELETES ALL THE TABLES IN THE DATABASE BEFORE THE IMPORT
                $result = mysqli_query($conn, "SHOW TABLES");
                // Loop through tables and drop them
                while ($row = mysqli_fetch_array($result)) {
                    mysqli_query($conn, "DROP TABLE IF EXISTS " . $row[0]);
                }

                // Read the UPLOADED SQL file to import the tables
                $sql2 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/catafa/assets/sql/restore.sql");
                $query2 = mysqli_multi_query($conn, $sql2);

                // Execute SQL commands
                if ($query2) {
                    // Waits for 3 second before redirecting. To make sure the query is done.
                    header("Refresh: 3; ../settings/index.php?page=database&import=success");
                    exit();
                } else {
                    header("Location: ../settings/index.php?page=database&upload_failed=sql_error");
                    exit();
                }
            } else {
                header("Location: ../settings/index.php?page=database&upload_failed=unable_to_upload");
                exit();
            }
        }
    mysqli_close($conn);
}
?>
