<?php
include "database_connect.php";

$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);

$password = password_hash($password, PASSWORD_DEFAULT);

//input data into database
$query = "INSERT INTO registered_users (username, password, email)
            VALUES ('$username', '$password', '$email')";

$result = $db->query($query);

if(!$result)
    echo"query failed";
else
    echo"Welcome, $username! Your account has been created successfully.";

$result->close();
$db->close();
?>