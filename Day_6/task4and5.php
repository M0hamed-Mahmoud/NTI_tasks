<?php
session_start();

// --- PHP UPLOAD LOGIC ---

// Check if the form was submitted and files were uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['images'])) {
    
    // Define the base directory for all uploads
    $upload_base_dir = "uploads/";
    
    // --- NEW: Create a unique directory for this specific upload batch ---
    // Format: Year-Month-Day-Hour-Minute
    $timestamp_dir_name = date('Y-m-d-H-i'); 
    $target_dir = $upload_base_dir . $timestamp_dir_name;

    // Use mkdir() to create the new directory.
    // The check '!is_dir' prevents errors if the directory somehow already exists.
    if (!is_dir($target_dir)) {
        // The `true` parameter allows recursive creation, and 0777 sets permissions.
        mkdir($target_dir, 0777, true); 
    }

    // Define allowed file types (extension => MIME type)
    $allowed_types = [
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png'  => 'image/png',
        'gif'  => 'image/gif'
    ];
    
    // Arrays to hold status messages
    $_SESSION['errors'] = [];
    $_SESSION['success'] = [];

    $file_count = count($_FILES['images']['name']);

    // Loop through each uploaded file
    for ($i = 0; $i < $file_count; $i++) {
        // Skip empty file inputs
        if ($_FILES['images']['error'][$i] === UPLOAD_ERR_NO_FILE) {
            continue;
        }

        if ($_FILES['images']['error'][$i] !== UPLOAD_ERR_OK) {
            $_SESSION['errors'][] = "Error with file '" . htmlspecialchars($_FILES['images']['name'][$i]) . "': Error code " . $_FILES['images']['error'][$i];
            continue;
        }

        $file_name = $_FILES['images']['name'][$i];
        $file_tmp_name = $_FILES['images']['tmp_name'][$i];
        
        // --- Security Validation ---
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!array_key_exists($file_ext, $allowed_types)) {
            $_SESSION['errors'][] = "Invalid file type for '" . htmlspecialchars($file_name) . "'. Only JPG, PNG, and GIF are allowed.";
            continue;
        }

        $mime_type = mime_content_type($file_tmp_name);
        if (!in_array($mime_type, $allowed_types)) {
            $_SESSION['errors'][] = "Invalid type of image for '" . htmlspecialchars($file_name) . "', check it out!";
            continue;
        }

        // --- Move the File ---
        $unique_file_name = uniqid('img_', true) . '.' . $file_ext;
        
        // MODIFIED: Use the new timestamped directory for the destination
        $destination_path = $target_dir . '/' . $unique_file_name;

        if (move_uploaded_file($file_tmp_name, $destination_path)) {
            $_SESSION['success'][] = "Uploaded to " . htmlspecialchars($destination_path);
        } else {
            $_SESSION['errors'][] = "Failed to upload '" . htmlspecialchars($file_name) . "'.";
        }
    }
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Helper to display and then clear session messages
function display_messages() {
    if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
        foreach ($_SESSION['success'] as $message) {
            echo '<div class="alert alert-success mt-3">' . $message . '</div>';
        }
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $message) {
            echo '<div class="alert alert-danger mt-3">' . $message . '</div>';
        }
        unset($_SESSION['errors']);
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 4 - Secure Image Upload</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
<body class="bg-black">

    <div class="container mt-5" style="max-width: 800px;">
        <div class="bg-dark text-light p-4 p-md-5 rounded border border-secondary" data-bs-theme="dark">
            
            <div class="text-center bg-secondary bg-gradient p-3 rounded mb-4">
                <h4 class="m-0">Secure Image Upload</h4>
            </div>

            <!-- Upload Form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="file" class="form-control" name="images[]" multiple required>
                    <button class="btn btn-outline-primary fw-bold" type="submit">send</button>
                </div>
            </form>

            <!-- Display Area for Success/Error Messages -->
            <div class="messages-area mt-3">
                <?php display_messages(); ?>
            </div>

        </div>
    </div>
     <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>


