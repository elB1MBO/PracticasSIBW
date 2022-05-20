/**
 * Script de la página de login y registro
 */

//FUNCIONES CAMBIO INICIAR Y REGISTRARSE
document.getElementById("toggle-login").addEventListener("click", setLogin);
document.getElementById("toggle-register").addEventListener("click", setRegister);
document.getElementById("eye-button").addEventListener("click", showHidePassLogin);
document.getElementById("eye-button2").addEventListener("click", showHidePassReg);
//Event listeners de las opciones

function setLogin(){
    var login = document.getElementById("login");
    var register = document.getElementById("register");
    var button = document.getElementById("graphic-button");

    login.style.left = "0%";
    register.style.left = "-150%";
    button.style.left = "0%";
}

function setRegister(){
    var login = document.getElementById("login");
    var register = document.getElementById("register");
    var button = document.getElementById("graphic-button");

    login.style.left = "150%";
    register.style.left = "0%";
    button.style.left = "50%";
}

//Mostrar/Ocultar contraseña
function showHidePassLogin(){
    var pass = document.getElementById("passwd");
    var show = document.getElementById("show");
    var hide = document.getElementById("hide");

    //Si pulsa el ojo cuando está escondiendo la passw
    if(hide.style.display === "block"){
        hide.style.display = "none";
        show.style.display = "block";
        pass.type = "text";
    } else {
        hide.style.display = "block";
        show.style.display = "none";
        pass.type = "password";
    }
}

function showHidePassReg(){
    var pass = document.getElementById("passwd2");
    var show = document.getElementById("show2");
    var hide = document.getElementById("hide2");

    //Si pulsa el ojo cuando está escondiendo la passw
    if(hide.style.display === "block"){
        hide.style.display = "none";
        show.style.display = "block";
        pass.type = "text";
    } else {
        hide.style.display = "block";
        show.style.display = "none";
        pass.type = "password";
    }
}

//REGISTRARSE:
document.getElementById("register-button").addEventListener("click", registerUser);

function registerUser(){
    
}


//Codigo para el dropdown menu
/* 
function toggleClass(elem, className){
    if(elem.className.indexOf(className) !== -1){
        elem.className = elem.className.replace(className, "");
    } else {
        elem.className = elem.className.replace(/\s+/g," ") + " " + className;
    }
    return elem;
}

function toggleDisplay(elem){
    const currentDisplayStyle = elem.style.display;
    if(currentDisplayStyle === "none" || currentDisplayStyle === ""){
        elem.style.display = "block";
    }else{
        elem.style.display = "none";
    }
}

function toggleMenuDisplay(e){
    const dropdown = e.currentTarget.parentNode;
    const menu = dropdown.querySelector(".menu");
    const icon = dropdown.querySelector(".fa-angle-down");

    toggleClass(menu, "hide");
    toggleClass(icon, "rotate-90");
}

function handleOptionSelected(e){
    toggleClass(e.target.parentNode, "hide");

    const id = e.target.id;
    const newValue = e.target.textContent + " ";
    const titleElem = document.querySelector(".dropdown .title");
    const icon = document.querySelector(".dropdown .title .fa");

    titleElem.textContent = newValue;
    titleElem.appendChild(icon);

    //trigger custom event
    document.querySelector(".dropdown .title").dispatchEvent(new Event("change"));
    //setTimeout se usa para mostrar la transicion
    setTimeout(() => toggleClass(icon, "rotate-90", 0));
}

//Cambiar la opcion escogida
function handleTitleChange(e){
    const result = document.getElementById("result");
}

//get elements
const dropdownTitle = document.querySelector('.dropdown .title');
const dropdownOptions = document.querySelectorAll('.dropdown .option');

//bind listeners to these elements
dropdownTitle.addEventListener('click', toggleMenuDisplay);
dropdownOptions.forEach(option => option.addEventListener('click',handleOptionSelected));
document.querySelector('.dropdown .title').addEventListener('change',handleTitleChange);
 */