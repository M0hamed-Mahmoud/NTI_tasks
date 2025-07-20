<?php
$products = $products ?? [];
$loggedInEmail = $_GET['user'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productname'], $_POST['description'], $_FILES['images']) && $loggedInEmail) {
    $productname = $_POST['productname'];
    $description = $_POST['description'];
    $uploadedImages = [];

    foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
        $uploadDir = 'uploads/';
        $imageName = basename($_FILES['images']['name'][$key]);
        $targetPath = $uploadDir . time() . '_' . $imageName;

        if (move_uploaded_file($tmpName, $targetPath)) {
            $uploadedImages[] = $targetPath;
        }
    }

    foreach ($uploadedImages as $img) {
        $products[] = [
            'name' => $productname,
            'description' => $description,
            'image' => $img,
            'email' => $loggedInEmail
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container py-5">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-6 bg-dark p-4">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label text-light">Product Name</label>
                                <input type="text" class="form-control" name="productname" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label text-light">Description</label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light">Product Images</label>
                        <input type="file" name="images[]" multiple class="form-control mb-2" accept="image/*">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-50">Add Product</button>
                    </div>
                </form>
            </div>
        </div>

        <?php if (!empty($products)): ?>
            <hr class="text-light">
            <div class="row">
                <?php foreach (array_reverse($products) as $product): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= $product['image'] ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                                <p class="card-text text-muted"><small>Added by: <?= htmlspecialchars($product['email']) ?></small></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
