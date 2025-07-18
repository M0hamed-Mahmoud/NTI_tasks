<?php 
$allowedExt = ["jpg", "jpeg"];
$allowedTypes = ["image", "wave"];
$maxSize = 4 * 1024 * 1024; // 4 MB
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_FILES['images'])) {
    foreach ($_FILES['images']['name'] as $key => $name) {
        $type = explode('/', $_FILES['images']['type'][$key])[0];
        $size = $_FILES['images']['size'][$key];
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $tmp = $_FILES['images']['tmp_name'][$key];

        if (!in_array($ext, $allowedExt)) {
            $errors[] = "ملف ($name): الامتداد غير مسموح ($ext)";
        }

        if (!in_array($type, $allowedTypes)) {
            $errors[] = "ملف ($name): النوع غير مسموح ($type)";
        }

        if ($size > $maxSize) {
            $errors[] = "ملف ($name): الحجم أكبر من 4 ميجابايت";
        }
    }

    if (!empty($errors)) {
        echo '<div class="alert alert-danger" role="alert">';
        echo "<strong>فشل رفع الصور:</strong><br>";
        foreach ($errors as $err) {
            echo "$err<br>";
        }
        echo '</div>';
    } else {
        foreach ($_FILES['images']['name'] as $key => $name) {
            $tmp = $_FILES['images']['tmp_name'][$key];
            move_uploaded_file($tmp, "uploads/" . basename($name));
        }
        echo '<div class="alert alert-success" role="alert">
                تم رفع جميع الصور بنجاح.
              </div>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5"> رفع مجموعة صور</h2>
        <form method="post"   enctype="multipart/form-data">
            <div class="mb-3">
                <label for="images" class="form-label">اختر الصور:</label>
                <input class="form-control" accept="image/*" type="file" name="images[]" multiple>
            </div>
            <button type="submit" class="btn btn-primary">رفع الصور</button>
        </form>
    </div>
    <script src="js/bootstrap.bundle.js"></script>  
</body>
</html>