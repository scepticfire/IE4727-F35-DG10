<?php
//used in conjuction with form_validation.js to check if a username is already taken via AJAX
header('Content-Type: application/json; charset=utf-8');

include "database_connect.php";

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