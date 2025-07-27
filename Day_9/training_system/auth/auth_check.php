<?php
// NO need to start session or include config here. init.php handles it.

// Requirement: Protect all pages with session checks
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page using the BASE_URL constant
    header("Location: " . BASE_URL . "auth/login.php");
    exit();
}
?>