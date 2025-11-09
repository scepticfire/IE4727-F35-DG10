<?php
include 'database_connect.php';

$book_name = trim($_POST['name']);
$book_author = trim($_POST['author']);
$book_language = trim($_POST['language']);
$book_description = trim($_POST['description']);
$book_price = trim($_POST['price']);
$book_genres = isset($_POST['genre']) ? $_POST['genre'] : [];

//upload image
$target_dir = "../cover-page-img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

if (!in_array($imageFileType, $allowed_types)) {
    die("Error: Only JPG, JPEG, PNG & GIF files are allowed.");
}

$new_filename = uniqid("cover_", true) . '.' . $imageFileType;
$final_path = $target_dir . $new_filename;

if (!move_uploaded_file($_FILES["image"]["tmp_name"], $final_path)) {
    die("Error uploading the image file.");
}

//insert data into database
$query = "INSERT INTO books (name, author, language, description, price, image_path)
                      VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($query);
$stmt->bind_param("ssssds", $book_name, $book_author, $book_language, $book_description, $book_price, $final_path);

if (!$stmt->execute()) {
    die("Error inserting book: " . $stmt->error);
}

$book_id = $stmt->insert_id;
$stmt->close();

//handles the different genres
$insert_genre_query = "INSERT IGNORE INTO genres (genre_name) VALUES (?)";
$get_genre_id_query = "SELECT genre_id FROM genres WHERE genre_name = ?";
$link_book_genre_query = "INSERT INTO book_genres (book_id, genre_id) VALUES (?, ?)";

$insert_genre_stmt = $db->prepare($insert_genre_query);
$get_genre_id_stmt = $db->prepare($get_genre_id_query);
$link_stmt = $db->prepare($link_book_genre_query);

foreach ($book_genres as $genre_name) {
    //will insert genre if not already present
    $insert_genre_stmt->bind_param("s", $genre_name);
    $insert_genre_stmt->execute();

    //retrieves genre_id
    $get_genre_id_stmt->bind_param("s", $genre_name);
    $get_genre_id_stmt->execute();
    $result = $get_genre_id_stmt->get_result();
    $genre_row = $result->fetch_assoc();
    $genre_id = $genre_row['genre_id'];

    //links the book to selected genre
    $link_stmt->bind_param("ii", $book_id, $genre_id);
    $link_stmt->execute();
}

$insert_genre_stmt->close();
$get_genre_id_stmt->close();
$link_stmt->close();
$db->close();

// redirect back to upload page with a flag instead of echoing text
header('Location: ../pages/upload.php?uploaded=1');
exit();
?>