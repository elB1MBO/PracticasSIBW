/**
 * Archivo JavaScript de la caja de comentarios
 */
const id = document.getElementById("container-comentarios");

//Funciones para mostrar y ocultar el cuadro de comentarios
function mostrar(elemento) {
    elemento.style.display = "block";
} 
function ocultar(elemento) {
    elemento.style.display = "none";
}
function setDisplay() {
    console.log("Entra en la funcion");
    if(window.getComputedStyle(id).display !== "none"){
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
    "zorra", "imbecil", "imbécil", "maricon", "maricón", "puta"];
//Función para censurar palabras
function censurarPalabras(cadena, badWords) {
    //para censurar palabras de una cadena, hay que separarla primero
    var cadenaSplitted = cadena.split(" ");
    //Y añadimos las palabras malsonantes que deseemos
    
    
    //Comprobamos si alguna palabra de la cadena está en badWords, en tal caso, la sustituimos por **** 
    for(var i = 0; i < cadena.length; i++){
        var asteriscos = "";
        for(var k=0; k<badWords.length; k++){
            //Si una palabra está en badwords
            if(cadena[i] === badWords[k]){
                //Crea los asteriscos necesarios
                while(asteriscos.length < cadena[i].length){
                    asteriscos+="*";
                }
                cadena[i]=asteriscos;
            }
        }
    }
    return cadena;
}

//Función de la caja de comentarios
function commentBox() {
    //Inicializamos las variables
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var comment = document.getElementById("comment").value;
    comment = censurarPalabras(comment, badWords);
    //Comprueba que los campos sean correctos
    
    if(name == ""){
        alert("Por favor, introduzca su nombre.");
    } else if(comment == ""){
        alert("Por favor, introduzca un comentario.");
    } else if(!validarEmail(email)){
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
        var date_text = document.createTextNode("Hora: "+date.getHours()+":"+date.getMinutes()+
        ", Fecha: "+date.getDate()+"-"+date.getMonth()+"-"+date.getFullYear());
        //Añadimos a los hijos el texto correspondiente
        name_child.appendChild(name_txt);
        email_child.appendChild(email_txt);
        date_child.appendChild(date_text);

        //Antes de añadir el hijo de comment, hay que censurar las palabras:
        comment_child.appendChild(comment_txt);

        line.style.border='1px solid #000';

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


