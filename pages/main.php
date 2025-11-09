<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenTome Homepage</title>
    <link rel="stylesheet" href="../css/main.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bona+Nova+SC:wght@400;700&family=Koh+Santepheap:wght@100;300;400&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="../assets/images/logoicon.png" alt="Library Logo" class="logo-icon">
            <h1>OpenTome</h1>
        </div>
        <!-- Single nav section only -->
        <nav>
            <img src="../assets/images/home-svg.svg" alt="Home">
            <a href="main.php">Home</a>
            <img src="../assets/images/books-svg.svg" alt="Books">
            <a href="books.php">Books</a>

            <?php if ($isLoggedIn): ?>
                <img src="../assets/images/upload-svg.svg" alt="Upload">
                <a href="upload.php">Upload</a>
                <img src="../assets/images/purchase-svg.svg" alt="Cart">
                <a href="cart.php">Cart</a>
                <img src="../assets/images/sign_in-svg.svg" alt="Sign out">
                <a href="../scripts/logout_script.php">Sign out</a>
            <?php else: ?>
                <img src="../assets/images/sign_in-svg.svg" alt="Sign in">
                <a href="login.php">Sign in</a>
            <?php endif; ?>
        </nav>
    </header>
    
<main>
    <?php
    // Include database connection
    include('../scripts/database_connect.php');
    
    // Get books for carousel
    $carousel_query = "SELECT book_id, name, author, image_path FROM books ORDER BY book_id DESC LIMIT 5";
    $carousel_result = $db->query($carousel_query);
    $carousel_books = [];
    if ($carousel_result && $carousel_result->num_rows > 0) {
        while ($book = $carousel_result->fetch_assoc()) {
            $carousel_books[] = $book;
        }
    }
    ?>
    
    <!-- Carousel Section -->
    <div class="carousel-section">
        <h2>Featured Books</h2>
        <div class="carousel-container">
            <button class="carousel-btn prev" onclick="moveCarousel(-1)">&#10094;</button>
            
            <div class="carousel-wrapper">
                <div class="carousel-track" id="carouselTrack">
                    <?php if (!empty($carousel_books)): ?>
                        <?php foreach ($carousel_books as $book): ?>
                            <div class="carousel-item">
                                <div class="carousel-book" onclick="window.location.href='books.php'">
                                    <?php if ($book['image_path']): ?>
                                        <img src="<?php echo htmlspecialchars($book['image_path']); ?>" alt="<?php echo htmlspecialchars($book['name']); ?>">
                                    <?php else: ?>
                                        <div class="carousel-no-image">No Image</div>
                                    <?php endif; ?>
                                    <h3><?php echo htmlspecialchars($book['name']); ?></h3>
                                    <p class="carousel-author">by <?php echo htmlspecialchars($book['author']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="carousel-item">
                            <p style="color: #848ae0;">No books available</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <button class="carousel-btn next" onclick="moveCarousel(1)">&#10095;</button>
        </div>
        <div class="carousel-dots" id="carouselDots"></div>
    </div>
</main>
</div>
    
    <footer>
        <p>&copy; 2025 OpenTome. All rights reserved.</p>
    </footer>
    <script src="../js/carousel.js"></script>
</body>
</html>