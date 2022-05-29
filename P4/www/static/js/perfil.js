/**
 * Script para el perfil
 */

//Boton de info
document.getElementById("icono-info").addEventListener('click', displayInfo);
//Boton editar nombre
document.getElementById("edit-nombre").addEventListener('click', displayEditNameWindow);
//Boton editar email
document.getElementById("edit-email").addEventListener('click', displayEditEmailWindow);
//Botón cancelar nombre
document.getElementById("boton-cancelar-nombre").addEventListener('click', displayEditNameWindow);
//Botón cancelar email
document.getElementById("boton-cancelar-email").addEventListener('click', displayEditEmailWindow);

const idInfo = document.getElementById("div-info-users");

function displayInfo() {
    if (window.getComputedStyle(idInfo).display !== "none") {
        ocultar(idInfo);
        return false;
    }
    mostrar(idInfo);
}

const idNombre = document.getElementById("container-editar-nombre");

function displayEditNameWindow(){
    if (window.getComputedStyle(idNombre).display !== "none") {
        ocultar(idNombre);
        return false;
    }
    mostrar(idNombre);
}

const idEmail = document.getElementById("container-editar-email");

function displayEditEmailWindow(){
    if (window.getComputedStyle(idEmail).display !== "none") {
        ocultar(idEmail);
        return false;
    }
    mostrar(idEmail);
}


//Funciones para mostrar y ocultar un elemento
function mostrar(elemento) {
    elemento.style.display = "flex";
}
function ocultar(elemento) {
    elemento.style.display = "none";
}

