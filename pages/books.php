<?php
    session_start();
    $isLoggedIn = isset($_SESSION['username']);

    include('../scripts/database_connect.php');

    // sidebar genre book count query
    $genre_count_query = "
        SELECT g.genre_name, COUNT(DISTINCT bg.book_id) as book_count
        FROM genres g
        LEFT JOIN book_genres bg ON g.genre_id = bg.genre_id
        GROUP BY g.genre_id, g.genre_name
    ";
    $genre_count_result = $db->query($genre_count_query);
    $genre_counts = [];
    if ($genre_count_result && $genre_count_result->num_rows > 0) {
        while ($row = $genre_count_result->fetch_assoc()) {
            $genre_counts[$row['genre_name']] = $row['book_count'];
        }
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Catalogue</title>
    <link rel="stylesheet" href="../css/books.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova+SC:wght@400;700&family=Koh+Santepheap:wght@100;300;400&display=swap" rel="stylesheet">
    <style>
    #successMessage{
        display:none;
        position:fixed;
        top:20px;
        right:20px;
        background:#28a745;
        color:#fff;
        padding:10px 14px;
        border-radius:6px;
        box-shadow:0 3px 10px rgba(0,0,0,0.2);
        z-index:1200;
        font-weight:600;
    }
    </style>
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
        <li><a href="?genre=action" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'action') ? 'class="active-genre"' : ''; ?>>Action <span class="genre-count">(<?php echo isset($genre_counts['action']) ? $genre_counts['action'] : 0; ?>)</span></a></li>
        <li><a href="?genre=adventure" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'adventure') ? 'class="active-genre"' : ''; ?>>Adventure <span class="genre-count">(<?php echo isset($genre_counts['adventure']) ? $genre_counts['adventure'] : 0; ?>)</span></a></li>
        <li><a href="?genre=autobiography" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'autobiography') ? 'class="active-genre"' : ''; ?>>Autobiography <span class="genre-count">(<?php echo isset($genre_counts['autobiography']) ? $genre_counts['autobiography'] : 0; ?>)</span></a></li>
        <li><a href="?genre=biography" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'biography') ? 'class="active-genre"' : ''; ?>>Biography <span class="genre-count">(<?php echo isset($genre_counts['biography']) ? $genre_counts['biography'] : 0; ?>)</span></a></li>
        <li><a href="?genre=children" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'children') ? 'class="active-genre"' : ''; ?>>Children <span class="genre-count">(<?php echo isset($genre_counts['children']) ? $genre_counts['children'] : 0; ?>)</span></a></li>
        <li><a href="?genre=classics" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'classics') ? 'class="active-genre"' : ''; ?>>Classics <span class="genre-count">(<?php echo isset($genre_counts['classics']) ? $genre_counts['classics'] : 0; ?>)</span></a></li>
        <li><a href="?genre=comedy" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'comedy') ? 'class="active-genre"' : ''; ?>>Comedy <span class="genre-count">(<?php echo isset($genre_counts['comedy']) ? $genre_counts['comedy'] : 0; ?>)</span></a></li>
        <li><a href="?genre=comingofage" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'comingofage') ? 'class="active-genre"' : ''; ?>>Coming Of Age <span class="genre-count">(<?php echo isset($genre_counts['comingofage']) ? $genre_counts['comingofage'] : 0; ?>)</span></a></li>
        <li><a href="?genre=contemporary" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'contemporary') ? 'class="active-genre"' : ''; ?>>Contemporary <span class="genre-count">(<?php echo isset($genre_counts['contemporary']) ? $genre_counts['contemporary'] : 0; ?>)</span></a></li>
        <li><a href="?genre=crime" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'crime') ? 'class="active-genre"' : ''; ?>>Crime <span class="genre-count">(<?php echo isset($genre_counts['crime']) ? $genre_counts['crime'] : 0; ?>)</span></a></li>
        <li><a href="?genre=drama" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'drama') ? 'class="active-genre"' : ''; ?>>Drama <span class="genre-count">(<?php echo isset($genre_counts['drama']) ? $genre_counts['drama'] : 0; ?>)</span></a></li>
        <li><a href="?genre=erotica" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'erotica') ? 'class="active-genre"' : ''; ?>>Erotica <span class="genre-count">(<?php echo isset($genre_counts['erotica']) ? $genre_counts['erotica'] : 0; ?>)</span></a></li>
        <li><a href="?genre=fantasy" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'fantasy') ? 'class="active-genre"' : ''; ?>>Fantasy <span class="genre-count">(<?php echo isset($genre_counts['fantasy']) ? $genre_counts['fantasy'] : 0; ?>)</span></a></li>
        <li><a href="?genre=fiction" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'fiction') ? 'class="active-genre"' : ''; ?>>Fiction <span class="genre-count">(<?php echo isset($genre_counts['fiction']) ? $genre_counts['fiction'] : 0; ?>)</span></a></li>
        <li><a href="?genre=gothic" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'gothic') ? 'class="active-genre"' : ''; ?>>Gothic <span class="genre-count">(<?php echo isset($genre_counts['gothic']) ? $genre_counts['gothic'] : 0; ?>)</span></a></li>
        <li><a href="?genre=history" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'history') ? 'class="active-genre"' : ''; ?>>History <span class="genre-count">(<?php echo isset($genre_counts['history']) ? $genre_counts['history'] : 0; ?>)</span></a></li>
        <li><a href="?genre=horror" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'horror') ? 'class="active-genre"' : ''; ?>>Horror <span class="genre-count">(<?php echo isset($genre_counts['horror']) ? $genre_counts['horror'] : 0; ?>)</span></a></li>
        <li><a href="?genre=memoir" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'memoir') ? 'class="active-genre"' : ''; ?>>Memoir <span class="genre-count">(<?php echo isset($genre_counts['memoir']) ? $genre_counts['memoir'] : 0; ?>)</span></a></li>
        <li><a href="?genre=mystery" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'mystery') ? 'class="active-genre"' : ''; ?>>Mystery <span class="genre-count">(<?php echo isset($genre_counts['mystery']) ? $genre_counts['mystery'] : 0; ?>)</span></a></li>
        <li><a href="?genre=nonfiction" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'nonfiction') ? 'class="active-genre"' : ''; ?>>Nonfiction <span class="genre-count">(<?php echo isset($genre_counts['nonfiction']) ? $genre_counts['nonfiction'] : 0; ?>)</span></a></li>
        <li><a href="?genre=philosophy" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'philosophy') ? 'class="active-genre"' : ''; ?>>Philosophy <span class="genre-count">(<?php echo isset($genre_counts['philosophy']) ? $genre_counts['philosophy'] : 0; ?>)</span></a></li>
        <li><a href="?genre=poetry" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'poetry') ? 'class="active-genre"' : ''; ?>>Poetry <span class="genre-count">(<?php echo isset($genre_counts['poetry']) ? $genre_counts['poetry'] : 0; ?>)</span></a></li>
        <li><a href="?genre=psychological" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'psychological') ? 'class="active-genre"' : ''; ?>>Psychological <span class="genre-count">(<?php echo isset($genre_counts['psychological']) ? $genre_counts['psychological'] : 0; ?>)</span></a></li>
        <li><a href="?genre=romance" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'romance') ? 'class="active-genre"' : ''; ?>>Romance <span class="genre-count">(<?php echo isset($genre_counts['romance']) ? $genre_counts['romance'] : 0; ?>)</span></a></li>
        <li><a href="?genre=satire" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'satire') ? 'class="active-genre"' : ''; ?>>Satire <span class="genre-count">(<?php echo isset($genre_counts['satire']) ? $genre_counts['satire'] : 0; ?>)</span></a></li>
        <li><a href="?genre=science" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'science') ? 'class="active-genre"' : ''; ?>>Science <span class="genre-count">(<?php echo isset($genre_counts['science']) ? $genre_counts['science'] : 0; ?>)</span></a></li>
        <li><a href="?genre=sciencefiction" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'sciencefiction') ? 'class="active-genre"' : ''; ?>>Science Fiction <span class="genre-count">(<?php echo isset($genre_counts['sciencefiction']) ? $genre_counts['sciencefiction'] : 0; ?>)</span></a></li>
        <li><a href="?genre=selfhelp" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'selfhelp') ? 'class="active-genre"' : ''; ?>>Self Help <span class="genre-count">(<?php echo isset($genre_counts['selfhelp']) ? $genre_counts['selfhelp'] : 0; ?>)</span></a></li>
        <li><a href="?genre=shorts" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'shorts') ? 'class="active-genre"' : ''; ?>>Shorts <span class="genre-count">(<?php echo isset($genre_counts['shorts']) ? $genre_counts['shorts'] : 0; ?>)</span></a></li>
        <li><a href="?genre=spirituality" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'spirituality') ? 'class="active-genre"' : ''; ?>>Spirituality <span class="genre-count">(<?php echo isset($genre_counts['spirituality']) ? $genre_counts['spirituality'] : 0; ?>)</span></a></li>
        <li><a href="?genre=survival" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'survival') ? 'class="active-genre"' : ''; ?>>Survival <span class="genre-count">(<?php echo isset($genre_counts['survival']) ? $genre_counts['survival'] : 0; ?>)</span></a></li>
        <li><a href="?genre=suspense" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'suspense') ? 'class="active-genre"' : ''; ?>>Suspense <span class="genre-count">(<?php echo isset($genre_counts['suspense']) ? $genre_counts['suspense'] : 0; ?>)</span></a></li>
        <li><a href="?genre=thriller" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'thriller') ? 'class="active-genre"' : ''; ?>>Thriller <span class="genre-count">(<?php echo isset($genre_counts['thriller']) ? $genre_counts['thriller'] : 0; ?>)</span></a></li>
        <li><a href="?genre=travel" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'travel') ? 'class="active-genre"' : ''; ?>>Travel <span class="genre-count">(<?php echo isset($genre_counts['travel']) ? $genre_counts['travel'] : 0; ?>)</span></a></li>
        <li><a href="?genre=western" <?php echo (isset($_GET['genre']) && $_GET['genre'] == 'western') ? 'class="active-genre"' : ''; ?>>Western <span class="genre-count">(<?php echo isset($genre_counts['western']) ? $genre_counts['western'] : 0; ?>)</span></a></li>
    </ul>
</div>
        
<div id="rightcolumn">
    <div class="content">

        <?php
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
<div id="successMessage">Added to cart!</div>
    <footer>
        <p>&copy; 2025 OpenTome. All rights reserved.</p>
    </footer>
    
    <script src="../js/books.js"></script>
</body>
</html>