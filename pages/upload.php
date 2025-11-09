<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Book</title>
    <link rel="stylesheet" href="../css/upload.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova+SC:wght@400;700&family=Koh+Santepheap:wght@100;300;400&display=swap" rel="stylesheet">
    <style>
      #uploadSuccess {
        display: none;
        position: fixed;
        top: 20px;
        right: 20px;
        background: #28a745;
        color: #fff;
        padding: 10px 14px;
        border-radius: 6px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        z-index: 1200;
        font-weight: 600;
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
    </header>
    
    <main>
      <h2>UPLOAD BOOKS</h2>
      <p>Want to upload your own books? Fill out the form as necessary. Required fields are marked with an asterisk*</p>
      
      <form method="post" action="../scripts/insert_books.php" enctype="multipart/form-data">
        <label for="name">*Title:</label>
        <input type="text" name="name" required>
        
        <label for="author">*Author:</label>
        <input type="text" name="author" required>

        <label for="language">*Language:</label>
        <input type="text" name="language" required>

        <label for="description">*Description:</label>
        <textarea name="description" name="description" required></textarea>

        <label for="price">*Price (SGD):</label>
        <input type="number" name="price" min="0" required>

        <label>*Genre:</label>

        <div class="genre-buttons">
           <input type="checkbox" id="action" name="genre[]" value="action">
          <label for="action">Action</label>

          <input type="checkbox" id="adventure" name="genre[]" value="adventure">
          <label for="adventure">Adventure</label>

          <input type="checkbox" id="autobiography" name="genre[]" value="autobiography">
          <label for="autobiography">Autobiography</label>

          <input type="checkbox" id="biography" name="genre[]" value="biography">
          <label for="biography">Biography</label>

          <input type="checkbox" id="children" name="genre[]" value="children">
          <label for="children">Children</label>

          <input type="checkbox" id="classics" name="genre[]" value="classics">
          <label for="classics">Classics</label>

          <input type="checkbox" id="comedy" name="genre[]" value="comedy">
          <label for="comedy">Comedy</label>

          <input type="checkbox" id="comingofage" name="genre[]" value="comingofage">
          <label for="comingofage">Coming Of Age</label>

          <input type="checkbox" id="contemporary" name="genre[]" value="contemporary">
          <label for="contemporary">Contemporary</label>

          <input type="checkbox" id="crime" name="genre[]" value="crime">
          <label for="crime">Crime</label>

          <input type="checkbox" id="drama" name="genre[]" value="drama">
          <label for="drama">Drama</label>

          <input type="checkbox" id="erotica" name="genre[]" value="erotica">
          <label for="erotica">Erotica</label>

          <input type="checkbox" id="fantasy" name="genre[]" value="fantasy">
          <label for="fantasy">Fantasy</label>

          <input type="checkbox" id="fiction" name="genre[]" value="fiction">
          <label for="fiction">Fiction</label>

          <input type="checkbox" id="gothic" name="genre[]" value="gothic">
          <label for="gothic">Gothic</label>

          <input type="checkbox" id="history" name="genre[]" value="history">
          <label for="history">History</label>

          <input type="checkbox" id="horror" name="genre[]" value="horror">
          <label for="horror">Horror</label>

          <input type="checkbox" id="memoir" name="genre[]" value="memoir">
          <label for="memoir">Memoir</label>

          <input type="checkbox" id="mystery" name="genre[]" value="mystery">
          <label for="mystery">Mystery</label>

          <input type="checkbox" id="nonfiction" name="genre[]" value="nonfiction">
          <label for="nonfiction">Nonfiction</label>

          <input type="checkbox" id="philosophy" name="genre[]" value="philosophy">
          <label for="philosophy">Philosophy</label>

          <input type="checkbox" id="poetry" name="genre[]" value="poetry">
          <label for="poetry">Poetry</label>

          <input type="checkbox" id="psychological" name="genre[]" value="psychological">
          <label for="psychological">Psychological</label>

          <input type="checkbox" id="romance" name="genre[]" value="romance">
          <label for="romance">Romance</label>

          <input type="checkbox" id="satire" name="genre[]" value="satire">
          <label for="satire">Satire</label>

          <input type="checkbox" id="science" name="genre[]" value="science">
          <label for="science">Science</label>

          <input type="checkbox" id="sciencefiction" name="genre[]" value="sciencefiction">
          <label for="sciencefiction">Science Fiction</label>

          <input type="checkbox" id="selfhelp" name="genre[]" value="selfhelp">
          <label for="selfhelp">Self Help</label>

          <input type="checkbox" id="shorts" name="genre[]" value="shorts">
          <label for="shorts">Shorts</label>

          <input type="checkbox" id="spirituality" name="genre[]" value="spirituality">
          <label for="spirituality">Spirituality</label>

          <input type="checkbox" id="survival" name="genre[]" value="survival">
          <label for="survival">Survival</label>

          <input type="checkbox" id="suspense" name="genre[]" value="suspense">
          <label for="suspense">Suspense</label>

          <input type="checkbox" id="thriller" name="genre[]" value="thriller">
          <label for="thriller">Thriller</label>

          <input type="checkbox" id="travel" name="genre[]" value="travel">
          <label for="travel">Travel</label>

          <input type="checkbox" id="western" name="genre[]" value="western">
          <label for="western">Western</label>

          <input type="checkbox" id="youngadult" name="genre[]" value="youngadult">
          <label for="youngadult">Young Adult</label>
        </div>

        <input type="file" id="image" name="image" accept="image/*">
        <label for="image" class="custom-file-upload">Upload Cover Picture</label>
        <span id="file-name">No file chosen</span>

        <div class="button-container">
            <input type="reset">
            <input type="submit" value="Upload">
        </div>

      </form>
    </main>
    
    <footer>
        <p>&copy; 2025 OpenTome. All rights reserved.</p>
    </footer>

    <!-- success toast element -->
    <div id="uploadSuccess">Book uploaded successfully!</div>

    <script>
      (function(){
        //show toast when ?uploaded=1 is present in URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('uploaded') === '1') {
          const msg = document.getElementById('uploadSuccess');
          if (msg) {
            msg.style.display = 'block';
            //hide after 2 seconds
            setTimeout(function(){
              msg.style.display = 'none';
              //remove query string to avoid showing again on refresh/back
              if (history.replaceState) {
                const url = new URL(window.location);
                url.searchParams.delete('uploaded');
                history.replaceState(null, '', url.toString());
              }
            }, 2000);
          }
        }
      })();
    </script>

<script src="../js/fileuploadstyling.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const genreCheckboxes = document.querySelectorAll('input[name="genre[]"]');
    const maxSelection = 5;
    const message = document.getElementById('genre-limit-message');

    function updateCheckboxStates() {
      const checkedCount = document.querySelectorAll('input[name="genre[]"]:checked').length;

      if (checkedCount >= maxSelection) {
        genreCheckboxes.forEach(box => {
          if (!box.checked) {
            const linkedLabel = document.querySelector(`label[for="${box.id}"]`);
            linkedLabel?.classList.add('blurred');
            box.disabled = true;
          }
        });
        message.textContent = `⚠️ You can only select up to ${maxSelection} genres.`;
      } else {
        genreCheckboxes.forEach(box => {
          box.disabled = false;
          const linkedLabel = document.querySelector(`label[for="${box.id}"]`);
          linkedLabel?.classList.remove('blurred');
        });
        message.textContent = ""; //clear the warning when under the limit
      }
    }

    genreCheckboxes.forEach(checkbox => {
      checkbox.addEventListener('change', updateCheckboxStates);
    });
  });
</script>
</body>
</html>