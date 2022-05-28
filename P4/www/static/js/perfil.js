/**
 * Script para el perfil
 */

document.getElementById("icono-info").addEventListener('click', setInfo);

const id = document.getElementById("div-info-users");

function mostrar(elemento) {
    elemento.style.display = "block";
}
function ocultar(elemento) {
    elemento.style.display = "none";
}
function setInfo() {
    if (window.getComputedStyle(id).display !== "none") {
        ocultar(id);
        return false;
    }
    mostrar(id);
}