let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-item');
const totalSlides = slides.length;

// Create dots
function createDots() {
    const dotsContainer = document.getElementById('carouselDots');
    for (let i = 0; i < totalSlides; i++) {
        const dot = document.createElement('span');
        dot.className = 'dot';
        dot.onclick = function() { goToSlide(i); };
        dotsContainer.appendChild(dot);
    }
    updateDots();
}

function moveCarousel(direction) {
    currentSlide += direction;
    
    if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
    } else if (currentSlide >= totalSlides) {
        currentSlide = 0;
    }
    
    updateCarousel();
}

function goToSlide(index) {
    currentSlide = index;
    updateCarousel();
}

// Update carousel position
function updateCarousel() {
    const track = document.getElementById('carouselTrack');
    const offset = -currentSlide * 100;
    track.style.transform = 'translateX(' + offset + '%)';
    updateDots();
}

function updateDots() {
    const dots = document.querySelectorAll('.dot');
    dots.forEach(function(dot, index) {
        if (index === currentSlide) {
            dot.classList.add('active');
        } else {
            dot.classList.remove('active');
        }
    });
}

function autoPlayCarousel() {
    setInterval(function() {
        moveCarousel(1);
    }, 5000);// Auto-play carousel every 5 seconds
}

// Initialize
if (totalSlides > 0) {
    createDots();
    autoPlayCarousel();
}