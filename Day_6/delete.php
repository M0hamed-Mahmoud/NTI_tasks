<?php
$message = '';
$alert_type = 'danger'; // Default alert type

// 1. Check if the 'path' parameter was sent
if (isset($_GET['path']) && !empty($_GET['path'])) {
    
    $file_path = $_GET['path'];
    $uploads_dir = realpath('uploads');

    // 2. SECURITY CHECK: Ensure the file is within the 'uploads' directory
    $real_file_path = realpath($file_path);

    if ($real_file_path === false || strpos($real_file_path, $uploads_dir) !== 0) {
        $alert_type = 'danger';
        $message = "Error: Invalid or forbidden file path.";
    } else {
        // 3. Check if the file exists
        if (file_exists($real_file_path)) {
            // 4. Attempt to delete the file using unlink()
            if (unlink($real_file_path)) {
                $alert_type = 'success';
                $message = "Deleted the image in path: <code>" . htmlspecialchars($file_path) . "</code>. <a href='index.php' class='alert-link'>Go to images table</a>. And delte more if you want.";
            } else {
                $alert_type = 'danger';
                $message = "Error: Could not delete the file. Check server permissions.";
            }
        } else {
            // File was not found
            $alert_type = 'warning';
            $message = "File not found may be deleted already. <a href='index.php' class='alert-link'>go to images table</a>. Give it a click if you like.";
        }
    }
} else {
    // Parameter was not sent
    $alert_type = 'danger';
    $message = "No Image Sent To This Page. <a href='index.php' class='alert-link'>go to images table</a>. Give it a click if you like.";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletion Status</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-black">

    <div class="container mt-5">
        <div class="bg-dark text-light p-4 p-md-5 rounded border border-secondary" data-bs-theme="dark">
            <!-- Display the final result message in a Bootstrap alert -->
            <div class="alert alert-<?php echo $alert_type; ?> text-center" role="alert">
                <?php echo $message; ?>
            </div>
        </div>
    </div>

</body>
</html>