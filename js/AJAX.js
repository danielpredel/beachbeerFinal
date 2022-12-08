// Transformamos los saltos de linea del textarea a etiquetas de salto de linea HTML <br>
function addNewLines() {
    var text = document.getElementById('descripcion').value;
    text = text.replace(/\n/g, "<br>");
    document.getElementById("descripcion").value = text;
}

function agregar(id) {
    var idProducto = parseInt(id);
    var unidades = parseInt(document.getElementById("unidades" + idProducto).value);
    cadena = "idProducto=" + idProducto + "&unidades=" + unidades;
    var envio = new XMLHttpRequest();        
    envio.open('POST','agregarCarrito.php', true);
    envio.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    envio.onload = function(){
        actualizarCarrito();
    }
    envio.send(cadena);
}

function eliminar(id) {
    var idProducto = parseInt(id);
    cadena = "idProducto=" + idProducto;
    var envio = new XMLHttpRequest();        
    envio.open('POST','borrarCarrito.php', true);
    envio.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    envio.onload = function(){
        var resp = envio.responseText;
        document.getElementById('productosCarrito').innerHTML = resp;
        actualizarCarrito();
    }
    envio.send(cadena);
}

function actualizarCarrito() {
    var envio = new XMLHttpRequest();        
    envio.open('GET','numeroCarrito.php', true);
    envio.onload = function(){
        var resp = parseInt(envio.responseText);
        document.getElementById('numCarrito').innerHTML = resp;
    }
    envio.send();
}

function filtro(id) {
    cadena = "filtro=" + id;
    var envio = new XMLHttpRequest();        
    envio.open('POST','filtro.php', true);
    envio.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    envio.onload = function(){
        var resp = envio.responseText;
        document.getElementById('productos').innerHTML = resp;
    }
    envio.send(cadena);
}

//Funcion que valida las unidades a comprar de un producto, no debe estar vacio, no debe ser menor a 1 y no debe ser mayor al numero de existencias del producto
function validarUnidades(id) {
    var input = document.getElementById(id);
    if( input.value == '') { // Si el input esta vacio
        input.value = 1;     // Se cambia por el valor minimo que es 1
    }
    var unidades = parseInt(input.value);
    var maximo = parseInt(input.max);
    if(unidades > maximo) { // Si supera el numero de existencias
        input.value = maximo;   // Se cambia por el maximo existente
    }
    else if (unidades < 1) { // Si es menor a 1
        input.value = 1;      // Se cambia por el minimo
    }
}

function enviarCorreo() {
    var correo = document.getElementById('suscrib').value;
    cadena = "email=" + correo;
    var envio = new XMLHttpRequest();        
    envio.open('POST','suscribete.php', true);
    envio.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    envio.onload = function(){
        var resp = envio.responseText;
        if(resp == "exito") {
            swal("Suscripción Exitosa", "", "success");
        }
        else {
            swal("Error en la Suscripción", "", "error");
        }
    }
    envio.send(cadena);
}

function enviarCorreoContacto() {
    var correo = document.getElementById('correo').value;
    cadena = "email=" + correo;
    var envio = new XMLHttpRequest();        
    envio.open('POST','enviarContacto.php', true);
    envio.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    envio.onload = function(){
        var resp = envio.responseText;
        if(resp == "exito") {
            swal("Correo enviado", "", "success");
        }
        else {
            swal("Error al enviar el correo", "", "error");
        }
    }
    envio.send(cadena);
}




function validarLogin() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var respuesta = document.getElementById('respuesta').value;
    var remember = document.getElementById('remember').checked;
    cadena = "username=" + username + "&password=" + password + "&respuesta=" + respuesta + "&remember=" + remember;
    var envio = new XMLHttpRequest();        
    envio.open('POST','validarcontra.php', true);
    envio.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    envio.onload = function(){
        var resp = parseInt(envio.responseText);
        switch (resp) {
            case 0://correcto
                swal({
                    title: "¡Bien!",
                    text: "¡Bienvenido de Vuelta!",
                    icon: "success",
                }).then(() => {
                    window.location.href = "index.php";
                });
                break;
            case 1://bloqueo
                swal({
                    title: "¡Ups!",
                    text: "Su Cuenta Ha Sido Bloqueada",
                    icon: "error",
                    buttons: {
                        recuperar: {
                        text: "Recuperar Contraseña",
                        value: "1",
                        },
                        inicio: {
                        text: "Ir al inicio",
                        value: "2",
                        },
                    },
                }).then((value) => {
                    if (value=="1") {
                        window.location.href = "recuperar.php";
                    }
                    else {
                        window.location.href = "index.php";
                    }
                });
                break;
            case 2://incorrecto
                swal({
                    title: "¡Error!",
                    text: "¡Contraseña Incorrecta!",
                    icon: "error",
                    buttons: {
                        recuperar: {
                        text: "Volver a Ingresar",
                        value: "1",
                        },
                        inicio: {
                        text: "Ir al inicio",
                        value: "2",
                        },
                    },
                }).then((value) => {
                    if (value=="1") {
                        window.location.href = "login.php";
                    } else {
                        window.location.href = "index.php";
                    }
                });
                break;
            case 3://bloqueo2
                swal({
                    title: "¡Error!",
                    text: "Su Cuenta Está Bloqueada...",
                    icon: "error",
                    buttons: {
                        recuperar: {
                        text: "Recuperar Contraseña",
                        value: "1",
                        },
                        inicio: {
                        text: "Ir al inicio",
                        value: "2",
                        },
                    },
                }).then((value) => {
                    if (value=="1") {
                        window.location.href = "recuperar.php";
                    } else {
                        window.location.href = "index.php";
                    }
                });
                break;
            case 4://noEncontrado
                swal({
                    title: "¡Error!",
                    text: "¡Nombre de Cuenta No Encontrada!",
                    icon: "error",
                    buttons: {
                        recuperar: {
                        text: "Volver a Ingresar",
                        value: "1",
                        },
                        inicio: {
                        text: "Ir al inicio",
                        value: "2",
                        },
                    },
                }).then((value) => {
                    if (value=="1") {
                        window.location.href = "login.php";
                    } else {
                        window.location.href = "index.php";
                    }
                });
                break;
            case 5://captchaIncorrecto
                swal({
                    title: "¡Error!",
                    text: "¡Captcha Incorrecto!",
                    icon: "error",
                    buttons: {
                        recuperar: {
                        text: "Volver a Intentar",
                        value: "1",
                        },
                        inicio: {
                        text: "Ir al inicio",
                        value: "2",
                        },
                    },
                }).then((value) => {
                    if (value=="1") {
                        window.location.href = "login.php";
                    } else {
                        window.location.href = "index.php";
                    }
                });
                break;
        }
    }
    envio.send(cadena);
}

function llamarLogin() {
    window.location.href = 'login.php';
}