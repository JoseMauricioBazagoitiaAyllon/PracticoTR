function cargar(pagina) {
    var ajax = new XMLHttpRequest() //es hacer llamadas apaginas 
        ajax.open("get", pagina, true); //a quien llamara
        ajax.onreadystatechange = function() { // funcion de respuesta
            if (ajax.readyState == 4) {
                document.getElementById("Descripcion").innerHTML = ajax.responseText;
            }
        }
    ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8"); //cabecera
    ajax.send(); //llamar a la pagina
}



