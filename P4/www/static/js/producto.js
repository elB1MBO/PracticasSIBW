/**
 * Script de la pagina de productos
 */

document.getElementById("boton-editar").addEventListener('click', message);
document.getElementById("boton-cancelar-com").addEventListener('click', displayEditCommentWindow);

function message() {
    console.log("ILLO");
}

const idComment = document.getElementById("container-caja-com");
function displayEditCommentWindow(){
    console.log("ENTRA");
    if (window.getComputedStyle(idComment).display !== "none") {
        ocultar(idComment);
        return false;
    }
    mostrar(idComment);
}


//Funciones para mostrar y ocultar un elemento
function mostrar(elemento) {
    elemento.style.display = "flex";
}
function ocultar(elemento) {
    elemento.style.display = "none";
}