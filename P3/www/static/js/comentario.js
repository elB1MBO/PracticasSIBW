/**
 * Archivo JavaScript de la caja de comentarios
 */
const id = document.getElementById("container-comentarios");
//PHP 7, Base de datos (MySQL), WebServer, XAMPP->phpmyadmin
//Listener del botón de comentario:
document.getElementById("boton-mostrar").addEventListener('click', setDisplay);
var firstTime = true;
document.getElementById("boton-mostrar").addEventListener('click', defaultComments);
//Cuando se escribe una palabrota, llama a la función que censura
document.getElementById("comment").addEventListener('keypress', censurarPalabras);
//Listener del boton de enviar
document.getElementById("boton-enviar").addEventListener('click', commentBox);
//Funciones para mostrar y ocultar el cuadro de comentarios
function mostrar(elemento) {
    elemento.style.display = "block";
}
function ocultar(elemento) {
    elemento.style.display = "none";
}
function setDisplay() {
    console.log("Entra en la funcion");
    if (window.getComputedStyle(id).display !== "none") {
        console.log("Entra en el if");
        ocultar(id);
        return false;
    }
    console.log("Muestra");
    mostrar(id);
}

//Funcion para validar un email
function validarEmail(email) {
    //La expresión sería: /^ nombre de usuario @ servidor . dominio
    var expresión = /^\w+([\.-]?\w+)*@(?:|hotmail|outlook|correo|go|gmail|ugr)*(\.(?:|com|es|ugr))+$/;

    return expresión.test(email);
}

const badWords = ["tonto", "gilipollas", "idiota", "polla", "coño", "bimbo", "matón",
    "zorra", "imbecil", "imbécil", "puta"];
//Función para censurar palabras
function censurarPalabras(key) {
    if (key.key == "Enter" || key.key == " " || key.key == "," || key.key == ".") {
        //alert("espacio o enter pulsado");
        //para censurar palabras de una cadena, hay que separarla primero
        var cadenaSplitted = document.getElementById("comment").value.split(" ");
        //Queremos ver siempre la última palabra escrita
        var e = cadenaSplitted.length-1;
        //Comprobamos si alguna palabra de la cadena está en badWords, en tal caso, la sustituimos por **** 
        var asteriscos = ""; //Array de los asteriscos que sustituirán la palabra
        for (var k = 0; k < badWords.length; k++) {
            //Comprobamos si la última palabra escrita (al final del array cadenaSplitted) está en baWords
            if (cadenaSplitted[e] == badWords[k]) {
                //Crea los asteriscos necesarios
                while (asteriscos.length < cadenaSplitted[e].length) {
                    asteriscos += "*";
                }
                //Susituimos la ultima palabra por los asteriscos
                cadenaSplitted[e] = asteriscos;
                //Y unimos la cadena splitted mediante join
                var cadena = cadenaSplitted.join(" ");
                document.getElementById("comment").value = cadena;
            }
        }

    }
}

/*Para que muestre 2 comentarios al comienzo, lo que haré será que se llame a esta 
    función 2 veces al pulsar el boton */
function defaultComments(){
    //Comprueba si no se ha pulsado el boton ya
    if(firstTime == true){
        firstTime = false;
        console.log(firstTime);
        createComment("Usuario1", "usuario1@gmail.com", "Primer comentario");
        createComment("Usuario2", "usuario2@ugr.es", "Segundo comentario");
    }
}
//Funcion que será llamada siempre, la cual solo inicializa las variables de los comentarios y llama a la funcion que los crea
function commentBox() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var comment = document.getElementById("comment").value;
    createComment(name, email, comment);
}
//Función de la caja de comentarios
function createComment(n, e, c) {

    var name = n;
    var email = e;
    var comment = c;
    
    //Comprueba que los campos sean correctos
    if (name == "") {
        alert("Por favor, introduzca su nombre.");
    } else if (comment == "") {
        alert("Por favor, introduzca un comentario.");
    } else if (!validarEmail(email)) {
        alert("La dirección email " + email + " es incorrecta");
    } else {
        //Una vez ha comprobado que tood esté correcto, añade el comentario a la lista
        var parent = document.createElement('li');
        var name_child = document.createElement('label');
        var email_child = document.createElement('label');
        var comment_child = document.createElement('p');
        var space = document.createElement('br');
        var line = document.createElement('hr'); //hr sirve para definir separaciones de texto
        var date = new Date();
        var date_child = document.createElement('label');
        //Creamos los nodos de texto que queremos
        var name_txt = document.createTextNode(name);
        var comment_txt = document.createTextNode(comment);
        var email_txt = document.createTextNode(email);
        var date_text = document.createTextNode("Hora: " + date.getHours() + ":" + date.getMinutes() +
            ", Fecha: " + date.getDate() + "-" + (date.getUTCMonth() + 1) + "-" + date.getFullYear());
        //Añadimos a los hijos el texto correspondiente
        name_child.appendChild(name_txt);
        email_child.appendChild(email_txt);
        date_child.appendChild(date_text);

        //Antes de añadir el hijo de comment, hay que censurar las palabras:
        comment_child.appendChild(comment_txt);

        line.style.border = '1px solid #000';

        //Añadimos el padre todos los componentes del cuadro de comentario
        parent.appendChild(name_child);
        parent.appendChild(document.createElement('br'));
        parent.appendChild(email_child);
        parent.appendChild(space);
        parent.appendChild(date_child);
        parent.appendChild(line);
        parent.appendChild(comment_child);
        //Le damos un nombre
        parent.setAttribute('class', 'panel');
        //Y añadimos a la unordered list de comentarios el parent
        document.getElementById("lista-comentarios").appendChild(parent);

    }
}


