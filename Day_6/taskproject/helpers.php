<?php
// helpers.php

// Ensure this script can't be accessed directly
if (!defined('APP_RUNNING')) {
    die("Direct access not allowed");
}

// --- LOGGING FUNCTIONS ---

// Function to log login attempts
function log_login_attempt($username, $status) {
    $log_file = 'logs/login.log';
    $date = date('Y-m-d H:i:s');
    // Format: Date | User | Status
    $log_line = "{$date} | {$username} | {$status}\n";
    // Append the line to the log file
    file_put_contents($log_file, $log_line, FILE_APPEND);
}

// Function to log file uploads
function log_upload($username, $type, $path, $mime) {
    $log_file = 'logs/uploads.log';
    $date = date('Y-m-d H:i:s');
    // Format: Date | User | Type | Path | MIME
    $log_line = "{$date} | {$username} | {$type} | {$path} | {$mime}\n";
    file_put_contents($log_file, $log_line, FILE_APPEND);
}

// --- USER DATA FUNCTIONS ---

// Function to get all registered users from the data file
function get_all_users() {
    $user_file = 'data/users.txt';
    if (!file_exists($user_file)) {
        return [];
    }
    $users = [];
    $lines = file($user_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Explode the line into parts: username, email, password_hash, etc.
        $parts = explode(' | ', $line);
        if (count($parts) >= 3) {
            $users[$parts[0]] = [
                'username' => $parts[0],
                'email' => $parts[1],
                'password' => $parts[2]
                // Add other fields if needed
            ];
        }
    }
    return $users;
}