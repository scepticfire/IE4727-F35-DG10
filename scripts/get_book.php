<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
include('database_connect.php');

if (isset($_GET['book_id'])) {
    $book_id = (int)$_GET['book_id'];
    
    //Query to get book details WITH genres
    $query = "
        SELECT 
            b.book_id, 
            b.name, 
            b.author, 
            b.language,
            b.description, 
            b.price,
            b.image_path,
            GROUP_CONCAT(g.genre_name SEPARATOR ', ') as genres
        FROM books b
        LEFT JOIN book_genres bg ON b.book_id = bg.book_id
        LEFT JOIN genres g ON bg.genre_id = g.genre_id
        WHERE b.book_id = $book_id
        GROUP BY b.book_id
    ";
    
    $result = $db->query($query);
    
    if ($result && $result->num_rows > 0) {
        $book = $result->fetch_assoc();
        
        //Split genres into an array for individual styling
        $genres_array = !empty($book['genres']) ? explode(', ', $book['genres']) : [];
        ?>
        
        <div class="modal-book-details">
            <div class="modal-left">
                <?php if ($book['image_path']): ?>
                    <img src="<?php echo htmlspecialchars($book['image_path']); ?>" alt="<?php echo htmlspecialchars($book['name']); ?>" class="modal-image">
                <?php else: ?>
                    <div class="modal-no-image">No Image Available</div>
                <?php endif; ?>
            </div>
            
            <div class="modal-right">
                <h2><?php echo htmlspecialchars($book['name']); ?></h2>
                
                <p class="modal-author">by <?php echo htmlspecialchars($book['author']); ?></p>
                
                <div class="modal-info-row">
                    <span class="info-label">Language:</span>
                    <span class="info-value"><?php echo htmlspecialchars($book['language']); ?></span>
                </div>
                
                <div class="modal-info-row">
                    <span class="info-label">Price:</span>
                    <span class="info-value modal-price">$<?php echo number_format($book['price'], 2); ?></span>
                </div>
                
                <?php if (!empty($genres_array)): ?>
                <div class="modal-genres">
                    <span class="info-label">Genres:</span>
                    <div class="genre-tags">
                        <?php foreach ($genres_array as $genre): ?>
                            <span class="genre-tag"><?php echo htmlspecialchars(trim($genre)); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <div class="modal-description">
                    <h3>Description</h3>
                    <p><?php echo nl2br(htmlspecialchars($book['description'])); ?></p>
                </div>
                
                <?php if ($isLoggedIn): ?>
                    <button class="add-to-cart-btn" onclick="addToCart(<?php echo $book['book_id']; ?>)">Add to Cart</button>
                <?php else: ?>
                    <p class="login-prompt">Please <a href="login.php">login</a> to add books to your cart.</p>
                <?php endif; ?>
            </div>
        </div>
        
        <?php
    } else {
        echo "<p>Book not found.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>