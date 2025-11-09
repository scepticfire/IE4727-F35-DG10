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

//make use of prepared statement to avoid SQL injections & handle errors
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

//sets session and username after registration
$_SESSION['username'] = $username;

$stmt->close();
$db->close();

//goes to main page
header('Location: ../pages/main.php');
exit();
?>