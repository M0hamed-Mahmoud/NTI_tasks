<?php
// --- NON-OOP FILE SCANNING using glob() ---

$uploads_dir = 'uploads';

// The pattern finds all specified image types in any immediate subdirectory of 'uploads'.
$pattern = $uploads_dir . '/*/*.{jpg,jpeg,png,gif}';

// Use glob() to get an array of matching file paths. GLOB_BRACE enables the {jpg,png,...} syntax.
$images = glob($pattern, GLOB_BRACE);

// In case glob() fails or returns no results, ensure $images is an empty array.
if ($images === false) {
    $images = [];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Images</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-black">

    <div class="container mt-5">
        <div class="bg-dark text-light p-4 p-md-5 rounded border border-secondary" data-bs-theme="dark">

            <div class="text-center bg-secondary bg-gradient p-3 rounded mb-4">
                <h4 class="m-0">Delete images from folders</h4>
            </div>

            <!-- Table to display images -->
            <table class="table table-dark table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th scope="col" style="width: 5%;">#</th>
                        <th scope="col">Image Path</th>
                        <th scope="col" class="text-center" style="width: 15%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($images)): ?>
                        <tr>
                            <td colspan="3" class="text-center p-4">No images found in the 'uploads' directory.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($images as $index => $image_path): ?>
                            <tr>
                                <th scope="row"><?php echo $index + 1; ?></th>
                                <td>
                                    <!-- Display a small thumbnail and the path -->
                                    <img src="<?php echo htmlspecialchars($image_path); ?>" class="me-3" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                    <code><?php echo htmlspecialchars($image_path); ?></code>
                                </td>
                                <td class="text-center">
                                    <!-- Delete button linking to delete.php with the path as a GET parameter -->
                                    <a href="delete.php?path=<?php echo urlencode($image_path); ?>" class="btn btn-danger btn-sm">delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>