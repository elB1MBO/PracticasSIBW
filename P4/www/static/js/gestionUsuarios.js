/**
 * Script para la gestion de usuarios por parte de un superusuario
 */

var tabla = document.getElementById("usuarios");
var numFilas = tabla.rows.length;

var iconos = [];
var usuarios = [];

for (let i = 0; i < numFilas; i++) {
    var rowId = "user_id"+i;
    var usuario = document.getElementById(rowId).childNodes[1].innerText;
    var idIcono = "edit-icon"+i;
    iconos[i] = document.getElementById(idIcono);
    iconos[i].addEventListener('click', editarUsuario.bind(i), false);
    iconos[i].index = i;
    iconos[i].style.cursor = "pointer";
    console.log(usuario);
    console.log(idIcono);
    console.log(iconos);
    usuarios.push(usuario);
    console.log(usuarios);
}


function mensaje(evt){
    displayEditForm();
    console.log("Procede a editar el usuario: "+usuarios[evt.currentTarget.index]);
}

//llama a un php con el id del usuario donde el super rellenara un formulario

//con AJAX, llama a un php con el id del usuario
function editarUsuario(evt){
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "gestionarUsuario.php", true);
    ajax.send("idUsuario=usuarios[evt.currentTarget.index]");
}


document.getElementById("boton-cancelar").addEventListener('click', displayEditForm);

//const idForm = document.getElementById("edit-cont");

function displayEditForm(){
    if (window.getComputedStyle(document.getElementById("edit-cont")).display !== "none") {
        ocultar(document.getElementById("edit-cont"));
        return false;
    }
    mostrar(document.getElementById("edit-cont"));
}


//Funciones para mostrar y ocultar un elemento
function mostrar(elemento) {
    elemento.style.display = "flex";
}
function ocultar(elemento) {
    elemento.style.display = "none";
}
