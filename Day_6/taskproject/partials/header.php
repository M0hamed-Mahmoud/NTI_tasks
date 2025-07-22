<?php
// partials/header.php
session_start();
// This constant prevents direct access to helper files
define('APP_RUNNING', true);
include_once('helpers.php');
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'File Manager'; ?></title>
   <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light"></body>