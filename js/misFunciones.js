function showHint(str) {
    if (str.length == 0) {
        document.getElementById("ciudad").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ciudad").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "obtenerCiudad.php?q=" + str, true);
        xmlhttp.send();
    }
     if (str.length == 0) {
        document.getElementById("departamento").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("departamento").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "obtenerDepartamento.php?q=" + str, true);
        xmlhttp.send();
    }
}