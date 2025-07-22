<?php
include_once('partials/header.php');

// Security: Ensure user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['path'])) {
    $file_path = urldecode($_GET['path']);

    // Security: Prevent directory traversal. Check if file is inside the uploads folder.
    if (strpos(realpath($file_path), realpath('uploads')) === 0 && file_exists($file_path)) {
        unlink($file_path);
    }
}

// Redirect back to the gallery
header("Location: gallery.php");
exit();