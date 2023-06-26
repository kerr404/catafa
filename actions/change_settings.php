

<?php
// Check if the form was submitted
if (isset($_POST)) {

  // Establish a mysqli connection
  require $_SERVER['DOCUMENT_ROOT']."/catafa/includes/db_conn.php";

  $name = $_POST['name'];
  $theme = $_POST['theme'];

  $sql = "UPDATE settings SET name = '$name', theme = '$theme' WHERE id = 1;";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    header("Location: ../settings/index.php?error=1");
    exit();    
  } else {
      // Check if a file was uploaded
      if (isset($_FILES['logo']) && $_FILES['logo']['error'] == UPLOAD_ERR_OK) {

        // Define allowed file types and maximum file size
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $maxSize = 5 * 1024 * 1024; // 5MB

        // Check if the file type and size are valid
        $fileType = exif_imagetype($_FILES['logo']['tmp_name']);
        $fileSize = $_FILES['logo']['size'];
        if (!in_array($fileType, $allowedTypes) || $fileSize > $maxSize) {
            header("Location: ../settings/index.php?error=invalid_image_type");
            exit();
        }

        // Read the image data into a variable
        $imageData = file_get_contents($_FILES['logo']['tmp_name']);

        // Escape the binary data to prevent SQL injection
        $logo = mysqli_real_escape_string($conn, $imageData);

        // Construct the UPDATE query to update the logo column with the new image data
        $query2 = "UPDATE settings SET logo = '$logo' WHERE id = 1";

        // Execute the query to update the logo column
        if (mysqli_query($conn, $query2)) {
          header("Location: ../settings/index.php?update=successful");
        } else {
            header("Location: ../settings/index.php?error=unable_to_upload");
            exit();
        }

      } else {
        header("Location: ../settings/index.php?update=failed");
        exit();
      }
    }


  // Close the mysqli connection
  mysqli_close($conn);

} else {
  echo "Not allowed";
}

 ?>