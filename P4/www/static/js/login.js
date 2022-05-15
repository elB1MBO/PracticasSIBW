/**
 * Script de la página de login y registro
 */

document.getElementById("toggle-login").addEventListener("click", setLogin);
document.getElementById("toggle-register").addEventListener("click", setRegister);

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
