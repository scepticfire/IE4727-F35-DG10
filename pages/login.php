<?php
session_start();
// If already logged in, redirect to main page
if (isset($_SESSION['username'])) {
    header('Location: main.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - OpenTome</title>
    <link rel="stylesheet" href="../css/login.css">
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
            <img src="../assets/images/sign_in-svg.svg" alt="Sign in">
            <a href="login.php">Sign in</a>
        </nav>
    </header>


    <div id="login-section">
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="../scripts/account_register.php" id="acc_registerForm" method="post" novalidate>
                    <h1>Create Account</h1>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                    <small id="usernameStatus"></small>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <input type="password" name="password_check" id="password_check"  placeholder="Confirm Password" required>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <button type="submit" id="submitBtn" name="submitBtn" value="Submit">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="../scripts/login_script.php" method="post">
                    <h1>Sign in</h1>
                    <?php if (isset($_SESSION['login_error'])): ?>
                        <div class="error"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></div>
                    <?php endif; ?>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 OpenTome. All rights reserved.</p>
    </footer>
    <script src="../js/login.js"></script>
    <script src="../js/form_validation.js"></script>
</body>

</html>