function openModal(bookId) {
    var modal = document.getElementById('bookModal');
    var modalBody = document.getElementById('modal-body');
    //Show modal
    modal.style.display = 'block';
    modalBody.innerHTML = '<p>Loading...</p>';
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

window.onclick = function(event) {
    var modal = document.getElementById('bookModal');
    if (event.target == modal) {
        closeModal();
    }
}

// --- ADDED: use existing Add to Cart button output from get_book.php ---
function addToCart(bookId) {
    try {
        var modalBody = document.getElementById('modal-body');
        if (!modalBody) return;

        //Expecting get_book.php to render <h2> for name and .modal-price for price
        var titleEl = modalBody.querySelector('h2');
        var priceEl = modalBody.querySelector('.modal-price');

        if (!titleEl || !priceEl) {
            console.error('Cannot find book name or price in modal.');
            return;
        }

        var name = titleEl.textContent.trim();
        var priceText = priceEl.textContent.trim();
        //Remove any non-digit except dot and minus
        var price = parseFloat(priceText.replace(/[^0-9.-]+/g, ''));
        if (isNaN(price)) price = 0;

        var params = new URLSearchParams();
        params.append('book_id', bookId);
        params.append('name', name);
        params.append('price', price);

        fetch('../scripts/add_to_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: params.toString()
        })
        .then(function(resp){ return resp.json(); })
        .then(function(data){
            if (data && data.success) {
                var msg = document.getElementById('successMessage');
                if (msg) {
                    msg.style.display = 'block';
                    setTimeout(function(){ msg.style.display = 'none'; }, 2000);
                }
            } else {
                console.error('Add to cart failed', data);
            }
        })
        .catch(function(err){ console.error('Add to cart error', err); });

    } catch (e) {
        console.error(e);
    }
}