<?php
@$db = new mysqli('localhost', 'root', '', 'opentome');

if (mysqli_connect_errno()){
    echo "Error: could not connect to database, Try again later";
    exit();
}

if (!$db->select_db ("opentome"))
	exit("<p>Unable to locate the database</p>");

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

$db->close();
?>