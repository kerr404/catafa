<?php
session_start();

if (isset($_SESSION['attachment'])) {
    $attachment = $_SESSION['attachment'];
    
    // Create a temporary file to store the attachment
    $tempFile = tempnam(sys_get_temp_dir(), 'attachment');
    
    // Write the attachment data to the temporary file
    file_put_contents($tempFile, $attachment);
    
    // Set appropriate headers
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="attachment.jpg"'); // Provide a desired filename for the downloaded file
    header('Content-Length: ' . filesize($tempFile)); // Set the correct content length
    
    // Output the attachment file
    readfile($tempFile);
    
    // Clean up - delete the temporary file
    unlink($tempFile);
    
    exit;
}
?>
