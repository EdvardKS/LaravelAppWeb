import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    // let barra = document.querySelector(".barra-navegacion");
    // let contenido = document.querySelector(".contenido");
    // let barraAltura = barra.offsetHeight;
    // contenido.style.marginTop = parseInt(barraAltura) + 10 + "px";
    // Esta parte de código es para hacer el nav fijo arriba y que el contenido respete el espacio y no se meta abajo

    irArriba();
});

function irArriba() {
    const irArribaBtn = document.getElementById("gotop");

    if (irArribaBtn) {
        window.addEventListener("scroll", function () {
            if (window.pageYOffset > 0) {
                irArribaBtn.setAttribute("class", "d-block");
            } else {
                irArribaBtn.setAttribute("class", "d-none");
            }
        });

        irArribaBtn.addEventListener("click", function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        });
    }
}
