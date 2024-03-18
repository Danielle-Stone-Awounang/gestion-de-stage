

// slide de 'acceuil 
var slides = document.querySelectorAll('.slide');
var currentSlide = 0;
var slideshowInterval;

function showSlide(n) {
  slides[currentSlide].classList.remove('active');
  currentSlide = (n + slides.length) % slides.length;
  slides[currentSlide].classList.add('active');
}

function nextSlide() {
  showSlide(currentSlide + 1);
}

function previousSlide() {
  showSlide(currentSlide - 1);
}

function startSlideshow() {
  slideshowInterval = setInterval(function() {
    nextSlide();
  }, 180000); // Défilement automatique toutes les 3 minutes (180 000 millisecondes)
}

// Affiche le premier slide immédiatement
showSlide(currentSlide);

// Démarre le diaporama automatiquement après un délai initial de 3 minutes
startSlideshow();

// Réinitialise le défilement automatique si la page est actualisée
window.addEventListener('beforeunload', function() {
  clearInterval(slideshowInterval);
});

// fin des slides 