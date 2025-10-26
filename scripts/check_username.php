<?php
header('Content-Type: application/json; charset=utf-8');

$db = new mysqli('localhost', 'root', '', 'opentome');
if ($db->connect_errno) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit();
}

$username = isset($_POST['username']) ? trim($_POST['username']) : '';

$query = "SELECT 1 FROM registered_users WHERE username = ? LIMIT 1";
$stmt = $db->prepare($query);
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(['status' => 'taken']);
} else {
    echo json_encode(['status' => 'available']);
}

$stmt->close();
$db->close();
?>