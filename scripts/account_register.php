<?php
session_start();
include "database_connect.php";

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$email    = isset($_POST['email']) ? trim($_POST['email']) : '';

if ($username === '' || $password === '' || $email === '') {
    http_response_code(400);
    echo "Missing required fields.";
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

// use prepared statement to avoid SQL injection and handle errors safely
$stmt = $db->prepare("INSERT INTO registered_users (username, password, email) VALUES (?, ?, ?)");
if (!$stmt) {
    http_response_code(500);
    echo "Prepare failed: " . $db->error;
    $db->close();
    exit;
}

$stmt->bind_param("sss", $username, $hash, $email);

if (!$stmt->execute()) {
    http_response_code(500);
    echo "Execute failed: " . $stmt->error;
    $stmt->close();
    $db->close();
    exit;
}

// Set session after successful registration
$_SESSION['username'] = $username;

$stmt->close();
$db->close();

// Redirect to main page
header('Location: ../pages/main.php');
exit();
?>