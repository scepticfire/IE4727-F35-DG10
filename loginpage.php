<?php
@$db = new mysqli('localhost', 'root', '', 'opentome');

if (mysqli_connect_errno()){
    echo "Error: could not connect to database, Try again later";
    exit();
}

if (!$db->select_db ("opentome"))
	exit("<p>Unable to locate the database</p>");

session_start();


?>