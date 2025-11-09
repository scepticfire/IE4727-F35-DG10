<?php
//destroy the session and log the user out
session_start();
session_destroy();
header('Location: ../pages/main.php');
exit();
?>