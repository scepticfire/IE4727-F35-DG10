<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Basic Webpage</title>
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
        <div class="content">
        <h3>RECCOMENDED</h3>
        <div  style="color:#606788">     
            <p> Text will be this color: #606788</p>
        <p>
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cons
             equat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
             dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
              sunt in culpa qui officia deserunt mollit anim id est laborum."
            </p>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cons
             equat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
             dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
              sunt in culpa qui officia deserunt mollit anim id est laborum."
            </p>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cons
             equat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
             dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
              sunt in culpa qui officia deserunt mollit anim id est laborum."
        </p>
        </div>
        
        </div>
    </main>
    
    <footer>
        <p>&copy; 2025 My Website. All rights reserved.</p>
    </footer>
</body>
</html>