let slideIndex = 0;

function moveSlide(direction) {
    const slides = document.querySelectorAll('.carrusel-item');
    const totalSlides = slides.length;
    
    // Ocultar todos los slides
    slides.forEach(slide => slide.classList.remove('active'));
    
    // Mover al siguiente o anterior slide
    slideIndex += direction;
    
    if (slideIndex < 0) slideIndex = totalSlides - 1;
    if (slideIndex >= totalSlides) slideIndex = 0;
    
    // Mostrar el slide activo
    slides[slideIndex].classList.add('active');
}

// Función para cambiar las diapositivas automáticamente
function autoChangeSlides() {
    moveSlide(1); // Avanzar al siguiente slide
}

// Iniciar el carrusel con el primer slide
moveSlide(0);

// Cambiar automáticamente cada 5 segundos
setInterval(autoChangeSlides, 5000); // Cambia cada 5 segundos (5000 ms)
