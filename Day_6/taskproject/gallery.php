<?php
$page_title = "Gallery";
include_once('partials/header.php');
include_once('partials/navbar.php');

$images = glob('uploads/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
?>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Image Gallery</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Size</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($images)): ?>
                        <tr><td colspan="5" class="text-center">No images found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($images as $image): ?>
                        <tr>
                            <td><img src="<?php echo $image; ?>" width="100"></td>
                            <td><?php echo basename($image); ?></td>
                            <td><?php echo strtolower(pathinfo($image, PATHINFO_EXTENSION)); ?></td>
                            <td><?php echo round(filesize($image) / 1024, 2); ?> KB</td>
                            <td class="text-center">
                                <a href="delete_image.php?path=<?php echo urlencode($image); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="upload.php">Back to Upload</a> | <a href="logout.php">Logout</a>
        </div>
    </div>
</div>
</body>
</html>