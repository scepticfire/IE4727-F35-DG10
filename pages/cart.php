<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
if (isset($_GET['empty'])) {
    $_SESSION['cart'] = array();
    header('Location: cart.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
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

    <main>
      <h1>Your Shopping Cart</h1>

      <table border="1">
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($_SESSION['cart'])): 
            $total = 0;
            foreach ($_SESSION['cart'] as $item):
                $name = htmlspecialchars($item['name']);
                $price = number_format(floatval($item['price']), 2);
                $total += floatval($item['price']);
        ?>
            <tr>
                <td><?php echo $name; ?></td>
                <td>$<?php echo $price; ?></td>
            </tr>
        <?php endforeach; ?>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>$<?php echo number_format($total,2); ?></strong></td>
            </tr>
        <?php else: ?>
            <tr><td colspan="2">Your cart is empty</td></tr>
        <?php endif; ?>
        </tbody>
      </table>

      <?php if (!empty($_SESSION['cart'])): ?>
        <p><a href="cart.php?empty=true">Empty Cart</a></p>
      <?php endif; ?>

    </main>

    <footer>
        <p>&copy; 2025 My Website. All rights reserved.</p>
    </footer>
</body>
</html>