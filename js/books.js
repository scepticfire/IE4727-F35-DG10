function openModal(bookId) {
    var modal = document.getElementById('bookModal');
    var modalBody = document.getElementById('modal-body');
    
    // Show modal
    modal.style.display = 'block';
    
    // Show loading message
    modalBody.innerHTML = '<p>Loading...</p>';
    
    // Fetch book details using XMLHttpRequest (no jQuery/AJAX libraries)
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../scripts/get_book.php?book_id=' + bookId, true);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            modalBody.innerHTML = xhr.responseText;
        } else {
            modalBody.innerHTML = '<p>Error loading book details.</p>';
        }
    };
    
    xhr.onerror = function() {
        modalBody.innerHTML = '<p>Error loading book details.</p>';
    };
    
    xhr.send();
}

function closeModal() {
    var modal = document.getElementById('bookModal');
    modal.style.display = 'none';
}

// Close modal when clicking outside of it
window.onclick = function(event) {
    var modal = document.getElementById('bookModal');
    if (event.target == modal) {
        closeModal();
    }
}