/**
 * Script para la pagina de edicion de un usuario para el gestor. Es similar a la de perfil
 */

//Boton de info
document.getElementById("icono-info").addEventListener('click', displayInfo);

const idInfo = document.getElementById("div-info-users");

function displayInfo() {
    if (window.getComputedStyle(idInfo).display !== "none") {
        ocultar(idInfo);
        return false;
    }
    mostrar(idInfo);
}

//Boton editar ID
document.getElementById("edit-id").addEventListener('click', displayEditIDWindow);
//Botón cancelar ID
document.getElementById("boton-cancelar-id").addEventListener('click', displayEditIDWindow);

const idID = document.getElementById("container-editar-id");

function displayEditIDWindow(){
    if (window.getComputedStyle(idID).display !== "none") {
        ocultar(idID);
        return false;
    }
    mostrar(idID);
}

//Boton editar nombre
document.getElementById("edit-nombre").addEventListener('click', displayEditNameWindow);
//Botón cancelar nombre
document.getElementById("boton-cancelar-nombre").addEventListener('click', displayEditNameWindow);
const idNombre = document.getElementById("container-editar-nombre");

function displayEditNameWindow(){
    if (window.getComputedStyle(idNombre).display !== "none") {
        ocultar(idNombre);
        return false;
    }
    mostrar(idNombre);
}

//Boton editar email
document.getElementById("edit-email").addEventListener('click', displayEditEmailWindow);
//Botón cancelar email
document.getElementById("boton-cancelar-email").addEventListener('click', displayEditEmailWindow);

const idEmail = document.getElementById("container-editar-email");

function displayEditEmailWindow(){
    if (window.getComputedStyle(idEmail).display !== "none") {
        ocultar(idEmail);
        return false;
    }
    mostrar(idEmail);
}

//Boton editar contraseña
/* document.getElementById("edit-pass").addEventListener('click', displayEditPassWindow);
//Botón cancelar pass
document.getElementById("boton-cancelar-pass").addEventListener('click', displayEditPassWindow);

const idPass = document.getElementById("container-editar-pass");

function displayEditPassWindow(){
    if (window.getComputedStyle(idPass).display !== "none") {
        ocultar(idPass);
        return false;
    }
    mostrar(idPass);
} */

//Boton editar tipo
document.getElementById("edit-tipo").addEventListener('click', displayEditTipoWindow);
//Botón cancelar tipo
document.getElementById("boton-cancelar-tipo").addEventListener('click', displayEditTipoWindow);
const idTipo = document.getElementById("container-editar-tipo");

function displayEditTipoWindow(){
    if (window.getComputedStyle(idTipo).display !== "none") {
        ocultar(idTipo);
        return false;
    }
    mostrar(idTipo);
}



//Funciones para mostrar y ocultar un elemento
function mostrar(elemento) {
    elemento.style.display = "flex";
}
function ocultar(elemento) {
    elemento.style.display = "none";
}

