<?php
// This file will be the starting point for all pages.

// 1. Define the absolute path to your project's root directory.
// __DIR__ is a special PHP constant that gets the directory of the current file.
define('PROJECT_ROOT', __DIR__ . '/');

// 2. Include the database connection.
include_once(PROJECT_ROOT . 'db/db.php');

// 3. Include the configuration file.
include_once(PROJECT_ROOT . 'config.php');

// 4. Start the PHP session.
// This must be done on every page that uses sessions.
session_start();
?>