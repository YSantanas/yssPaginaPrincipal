let currentIndex = 0;
const titles = document.querySelectorAll('.video-text');
let titleInterval = null;  // Variable para almacenar el intervalo

// Asegúrate de que todos los títulos estén ocultos inicialmente
titles.forEach(title => title.classList.remove('active'));

// Función para verificar el tamaño de la ventana
function checkScreenSize() {
    if (window.innerWidth > 992) {
        // Si la pantalla es grande (mayor a 992px), activa el cambio de títulos
        if (!titleInterval) {  // Solo iniciar si no hay un intervalo en ejecución
            titleInterval = setInterval(changeTitle, 3000); // Cambiar el título cada 3 segundos
        }
        changeTitle();  // Mostrar el primer título al cambiar a pantalla grande
    } else {
        // Si la pantalla es pequeña, detén el intervalo y asegúrate de que no parpadeen
        if (titleInterval) {
            clearInterval(titleInterval);  // Detener el intervalo
            titleInterval = null;  // Restablecer la variable de intervalo
        }
        titles.forEach(title => title.classList.remove('active'));  // Asegurar que no haya títulos activos
    }
}

function changeTitle() {
    // Ocultar todos los títulos
    titles.forEach(title => title.classList.remove('active'));
    
    // Mostrar el título actual
    titles[currentIndex].classList.add('active');
    
    // Cambiar al siguiente título
    currentIndex = (currentIndex + 1) % titles.length;
}

// Llamar a la función checkScreenSize al cargar la página y al cambiar el tamaño de la ventana
window.onload = checkScreenSize;
window.onresize = checkScreenSize;
