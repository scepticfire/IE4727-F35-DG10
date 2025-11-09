<?php
session_start();

include('database_connect.php');
header('Content-Type: application/json');

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
//gets the book name and price of the book to be added to cart
if (isset($_POST['book_id']) && isset($_POST['name']) && isset($_POST['price'])) {
    $item = array(
        'book_id' => $_POST['book_id'],
        'name' => $_POST['name'],
        'price' => $_POST['price']
    );
    
    $_SESSION['cart'][] = $item;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Missing data']);
}
?>