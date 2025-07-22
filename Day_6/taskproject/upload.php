<?php
$page_title = "Upload Image";
include_once('partials/header.php');
include_once('partials/navbar.php');

$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $upload_type = $_POST['type'];

    // Basic validation
    if ($file['error'] === UPLOAD_ERR_OK && !empty($upload_type)) {
        $upload_dir = 'uploads/';
        $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $unique_name = uniqid('img_', true) . '.' . $file_ext;
        $destination = $upload_dir . $unique_name;
        
        // Security: Check if it's a valid image type
        $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_mime_type = mime_content_type($file['tmp_name']);

        if (in_array($file_mime_type, $allowed_mime_types)) {
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                // Log the successful upload
                log_upload($_SESSION['user']['username'], $upload_type, $destination, $file_mime_type);
                $message = "Image uploaded successfully!";
                $message_type = 'success';
            } else {
                $message = "Failed to move uploaded file.";
                $message_type = 'danger';
            }
        } else {
            $message = "Invalid file type. Only JPG, PNG, GIF are allowed.";
            $message_type = 'danger';
        }
    } else {
        $message = "Please choose a file and select a type.";
        $message_type = 'danger';
    }
}
?>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Upload Image</h3>
        </div>
        <div class="card-body">
            <?php if ($message): ?>
                <div class="alert alert-<?php echo $message_type; ?>"><?php echo $message; ?></div>
            <?php endif; ?>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <input class="form-control" type="file" name="image" required>
                    </div>
                    <div class="col-md-5 mb-3">
                        <select class="form-select" name="type" required>
                            <option value="">Choose type</option>
                            <option value="avatar">Avatar</option>
                            <option value="product">Product</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3 d-grid">
                        <button class="btn btn-primary" type="submit">Upload</button>
                    </div>
                </div>
            </form>
             <hr>
            <a href="gallery.php">View Gallery</a> | <a href="logout.php">Logout</a>
        </div>
    </div>
</div>
</body>
</html>