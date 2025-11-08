<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Basic Webpage</title>
    <link rel="stylesheet" href="../css/books.css">
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

    <div class="search-tab">
    <form method="GET" action="books.php">
        <input type="text" name="search" class="search-bar" placeholder="Search for books..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button type="submit" class="search-btn">Search</button>
        <?php if (isset($_GET['search'])): ?>
            <a href="books.php" class="clear-search">Clear</a>
        <?php endif; ?>
    </form>
</div>

    <main>
        
<div id="leftcolumn">
    <h2>Genres</h2>
    <ul>
        <li><a href="books.php" <?php echo !isset($_GET['genre']) ? 'class="active-genre"' : ''; ?>>All Books</a></li>
        <li><a href="?genre=action" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'action') ? 'class="active-genre"' : ''; ?>>Action</a></li>
        <li><a href="?genre=adventure" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'adventure') ? 'class="active-genre"' : ''; ?>>Adventure</a></li>
        <li><a href="?genre=autobiography" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'autobiography') ? 'class="active-genre"' : ''; ?>>Autobiography</a></li>
        <li><a href="?genre=biography" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'biography') ? 'class="active-genre"' : ''; ?>>Biography</a></li>
        <li><a href="?genre=children" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'children') ? 'class="active-genre"' : ''; ?>>Children</a></li>
        <li><a href="?genre=classics" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'classics') ? 'class="active-genre"' : ''; ?>>Classics</a></li>
        <li><a href="?genre=comedy" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'comedy') ? 'class="active-genre"' : ''; ?>>Comedy</a></li>
        <li><a href="?genre=comingofage" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'comingofage') ? 'class="active-genre"' : ''; ?>>Coming Of Age</a></li>
        <li><a href="?genre=contemporary" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'contemporary') ? 'class="active-genre"' : ''; ?>>Contemporary</a></li>
        <li><a href="?genre=crime" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'crime') ? 'class="active-genre"' : ''; ?>>Crime</a></li>
        <li><a href="?genre=drama" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'drama') ? 'class="active-genre"' : ''; ?>>Drama</a></li>
        <li><a href="?genre=erotica" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'erotica') ? 'class="active-genre"' : ''; ?>>Erotica</a></li>
        <li><a href="?genre=fantasy" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'fantasy') ? 'class="active-genre"' : ''; ?>>Fantasy</a></li>
        <li><a href="?genre=fiction" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'fiction') ? 'class="active-genre"' : ''; ?>>Fiction</a></li>
        <li><a href="?genre=gothic" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'gothic') ? 'class="active-genre"' : ''; ?>>Gothic</a></li>
        <li><a href="?genre=history" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'history') ? 'class="active-genre"' : ''; ?>>History</a></li>
        <li><a href="?genre=horror" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'horror') ? 'class="active-genre"' : ''; ?>>Horror</a></li>
        <li><a href="?genre=memoir" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'memoir') ? 'class="active-genre"' : ''; ?>>Memoir</a></li>
        <li><a href="?genre=mystery" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'mystery') ? 'class="active-genre"' : ''; ?>>Mystery</a></li>
        <li><a href="?genre=nonfiction" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'nonfiction') ? 'class="active-genre"' : ''; ?>>Nonfiction</a></li>
        <li><a href="?genre=philosophy" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'philosophy') ? 'class="active-genre"' : ''; ?>>Philosophy</a></li>
        <li><a href="?genre=poetry" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'poetry') ? 'class="active-genre"' : ''; ?>>Poetry</a></li>
        <li><a href="?genre=psychological" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'psychological') ? 'class="active-genre"' : ''; ?>>Psychological</a></li>
        <li><a href="?genre=romance" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'romance') ? 'class="active-genre"' : ''; ?>>Romance</a></li>
        <li><a href="?genre=satire" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'satire') ? 'class="active-genre"' : ''; ?>>Satire</a></li>
        <li><a href="?genre=science" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'science') ? 'class="active-genre"' : ''; ?>>Science</a></li>
        <li><a href="?genre=sciencefiction" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'sciencefiction') ? 'class="active-genre"' : ''; ?>>Science Fiction</a></li>
        <li><a href="?genre=selfhelp" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'selfhelp') ? 'class="active-genre"' : ''; ?>>Self Help</a></li>
        <li><a href="?genre=shorts" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'shorts') ? 'class="active-genre"' : ''; ?>>Shorts</a></li>
        <li><a href="?genre=spirituality" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'spirituality') ? 'class="active-genre"' : ''; ?>>Spirituality</a></li>
        <li><a href="?genre=survival" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'survival') ? 'class="active-genre"' : ''; ?>>Survival</a></li>
        <li><a href="?genre=suspense" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'suspense') ? 'class="active-genre"' : ''; ?>>Suspense</a></li>
        <li><a href="?genre=thriller" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'thriller') ? 'class="active-genre"' : ''; ?>>Thriller</a></li>
        <li><a href="?genre=travel" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'travel') ? 'class="active-genre"' : ''; ?>>Travel</a></li>
        <li><a href="?genre=western" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'western') ? 'class="active-genre"' : ''; ?>>Western</a></li>
    </ul>
</div>
        <div id="rightcolumn">
            <div class="content">







              <?php
// Include database connection
include('../scripts/database_connect.php');

// Pagination settings
$books_per_page = 4;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $books_per_page;

// Build WHERE clause for search and genre
$where_conditions = [];

// Handle search
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_term = $db->real_escape_string($_GET['search']);
    $where_conditions[] = "b.name LIKE '%$search_term%'";
}

// Handle genre filter
if (isset($_GET['genre']) && !empty($_GET['genre'])) {
    $genre_filter = $db->real_escape_string($_GET['genre']);
    $where_conditions[] = "g.genre_name = '$genre_filter'";
}

// Build WHERE clause
$where_clause = "";
if (!empty($where_conditions)) {
    $where_clause = "WHERE " . implode(" AND ", $where_conditions);
}

// Get total number of books (with search filter)
$count_query = "
    SELECT COUNT(DISTINCT b.book_id) as total 
    FROM books b
    LEFT JOIN book_genres bg ON b.book_id = bg.book_id
    LEFT JOIN genres g ON bg.genre_id = g.genre_id
    $where_clause
";
$count_result = $db->query($count_query);
$total_books = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_books / $books_per_page);

// Fetch books for current page (with search filter)
$query = "
    SELECT 
        b.book_id, 
        b.name, 
        b.author, 
        b.description, 
        b.image_path,
        GROUP_CONCAT(g.genre_name SEPARATOR ', ') as genres
    FROM books b
    LEFT JOIN book_genres bg ON b.book_id = bg.book_id
    LEFT JOIN genres g ON bg.genre_id = g.genre_id
    $where_clause
    GROUP BY b.book_id
    LIMIT $books_per_page OFFSET $offset
";
$result = $db->query($query);
?>
    
    <div class="books-grid">
        <?php
        if ($result && $result->num_rows > 0) {
            while ($book = $result->fetch_assoc()) {
                ?>
                <div class="book-card" onclick="openModal(<?php echo $book['book_id']; ?>)">
                            <?php if ($book['image_path']): ?>
                                <img src="<?php echo htmlspecialchars($book['image_path']); ?>" alt="<?php echo htmlspecialchars($book['name']); ?>">
                            <?php else: ?>
                                <div class="no-image">No Image</div>
                            <?php endif; ?>
                            <h3><?php echo htmlspecialchars($book['name']); ?></h3>
                            <p class="author">by <?php echo htmlspecialchars($book['author']); ?></p>
                            
                            <?php if (!empty($book['genres'])): ?>
                                <?php 
                                $genres_array = explode(', ', $book['genres']);
                                ?>
                                <div class="card-genres">
                                    <?php foreach ($genres_array as $genre): ?>
                                        <span class="card-genre-tag"><?php echo htmlspecialchars(trim($genre)); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            
                            <p class="description"><?php echo htmlspecialchars($book['description']); ?></p>
                        </div>
                <?php
            }
        } else {
            echo "<p>No books available.</p>";
        }
        ?>
    </div>
    
    <!-- Pagination -->
<?php if ($total_pages > 1): ?>
<div class="pagination">
    <?php 
// Build query parameters for pagination
$params = [];
if (isset($_GET['search'])) {
    $params[] = 'search=' . urlencode($_GET['search']);
}
if (isset($_GET['genre'])) {
    $params[] = 'genre=' . urlencode($_GET['genre']);
}
$query_string = !empty($params) ? '&' . implode('&', $params) : '';
?>
    
    <?php if ($current_page > 1): ?>
        <a href="?page=<?php echo $current_page - 1; ?><?php echo $query_string; ?>">Previous</a>
    <?php endif; ?>
    
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <?php if ($i == $current_page): ?>
            <span class="current-page"><?php echo $i; ?></span>
        <?php else: ?>
            <a href="?page=<?php echo $i; ?><?php echo $query_string; ?>"><?php echo $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>
    
    <?php if ($current_page < $total_pages): ?>
        <a href="?page=<?php echo $current_page + 1; ?><?php echo $query_string; ?>">Next</a>
    <?php endif; ?>
</div>
<?php endif; ?>
    
    <!-- Modal -->
    <div id="bookModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <div id="modal-body">
                <p>Loading...</p>
            </div>
        </div>
    </div>
</div>



             </div>
        </div>
    </main>
    
    <footer>
        <p>&copy; 2025 My Website. All rights reserved.</p>
    </footer>
    <script src="../js/books.js"></script>
</body>
</html>