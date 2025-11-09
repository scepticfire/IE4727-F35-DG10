<?php
session_start();
include "database_connect.php";

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if ($username === '' || $password === '') {
    $_SESSION['login_error'] = "Please enter both username and password.";
    header('Location: ../pages/login.php');
    exit();
}

try {
    //get user data with prepared statement
    $stmt = $db->prepare("SELECT username, password FROM registered_users WHERE username = ? LIMIT 1");
    if (!$stmt) {
        throw new Exception("Database prepare failed: " . $db->error);
    }

    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        throw new Exception("Database execute failed: " . $stmt->error);
    }

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    //verify username & password
    if ($user && password_verify($password, $user['password'])) {
        //sucessful login
        $_SESSION['username'] = $user['username'];
        $stmt->close();
        $db->close();
        header('Location: ../pages/main.php');
        exit();
    } else {
        //failed login
        $_SESSION['login_error'] = "Invalid username or password.";
        header('Location: ../pages/login.php');
        exit();
    }
} catch (Exception $e) {
    error_log("Login error: " . $e->getMessage());
    $_SESSION['login_error'] = "System error. Please try again later.";
    header('Location: ../pages/login.php');
} finally {
    if (isset($stmt)) $stmt->close();
    if (isset($db)) $db->close();
}
?>