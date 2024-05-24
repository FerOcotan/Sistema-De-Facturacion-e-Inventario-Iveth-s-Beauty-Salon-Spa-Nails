const cloud = document.getElementById("cloud");
const barraLateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const palanca = document.querySelector(".switch");
const circulo = document.querySelector(".circulo");
const menu = document.querySelector(".menu");
const main = document.querySelector("main");

// Función para ocultar el menú
function ocultarMenu() {
    barraLateral.classList.add("mini-barra-lateral");
    main.classList.add("min-main");
    spans.forEach((span) => {
        span.classList.add("oculto");
    });
}

// Función para mostrar el menú
function mostrarMenu() {
    barraLateral.classList.remove("mini-barra-lateral");
    main.classList.remove("min-main");
    spans.forEach((span) => {
        span.classList.remove("oculto");
    });
}

// Evento click para el menú
menu.addEventListener("click", () => {
    barraLateral.classList.toggle("max-barra-lateral");
    if (barraLateral.classList.contains("max-barra-lateral")) {
        menu.children[0].style.display = "none";
        menu.children[1].style.display = "block";
    } else {
        menu.children[0].style.display = "block";
        menu.children[1].style.display = "none";
    }
    if (window.innerWidth <= 1000) {
        ocultarMenu();
    }
});

// Función para actualizar el modo oscuro
function actualizarModoOscuro() {
    let body = document.body;
    if (localStorage.getItem("modoOscuro") === "true") {
        body.classList.add("dark-mode");
        circulo.classList.add("prendido");
    } else {
        body.classList.remove("dark-mode");
        circulo.classList.remove("prendido");
    }
}

// Evento click para el switch de modo oscuro
palanca.addEventListener("click", () => {
    let body = document.body;
    let modoOscuroActivado = body.classList.contains("dark-mode");

    body.classList.toggle("dark-mode");
    circulo.classList.toggle("prendido");

    // Guardar el estado en localStorage
    if (modoOscuroActivado) {
        localStorage.removeItem("modoOscuro");
        // Recargar la página solo cuando se desactiva el modo oscuro
        location.reload();
    } else {
        localStorage.setItem("modoOscuro", "true");
    }
});

// Evento click para el cloud
cloud.addEventListener("click", () => {
    barraLateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");
    spans.forEach((span) => {
        span.classList.toggle("oculto");
    });
});

// Eventos para mostrar y ocultar el menú al pasar el ratón
barraLateral.addEventListener("mouseenter", mostrarMenu);
barraLateral.addEventListener("mouseleave", ocultarMenu);

// Recuperar el estado del modo oscuro desde localStorage al cargar la página
window.addEventListener("DOMContentLoaded", () => {
    actualizarModoOscuro();
});
