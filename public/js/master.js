window.onload = function() {

    //--------------------------------------------------
    //        VALIDACIONES FORMULARIO REGISTRO
    //--------------------------------------------------
    var formularioRegistro = document.querySelector('form#registro');
    if(formularioRegistro) {
        var hayError = false;

        //PARA CAMPOS COMUNES
        var validarVacio = function() {
            var name = this.getAttribute('name');
            var spanError = document.querySelector('span#error-'+name);
            if(this.value.trim() == ""){
                spanError.innerText = '* El campo no puede estar vacio';
                hayError = true;
            } else if(!isNaN(this.value)){
                spanError.innerText = '* El campo no puede ser de tipo numerico';
                hayError = true;
            }else{
                spanError.innerText = '';
            }
        }

        var campoNombre = document.querySelector('input#name');
        campoNombre.addEventListener('blur', validarVacio);
        var campoApellido = document.querySelector('input#surname');
        campoApellido.addEventListener('blur', validarVacio);

        //EMAIL
        var campoEmail = document.querySelector('input#email');
        campoEmail.addEventListener('blur', function(){
            var regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
            var spanError = document.querySelector('span#error-email');
            if(this.value.trim() == ""){
                spanError.innerText = '* El campo no puede estar vacio';
                hayError = true;
            }else if (!regex.test(this.value)){
                spanError.innerText = '* Email no valido';
                hayError = true;
            } else {
                spanError.innerText = '';
            }
        });

        //CONTRASENIA
        var campoPassword = document.querySelector('input#password');
        campoPassword.addEventListener('blur', function(){
            var spanError = document.querySelector('span#error-password');
            if(this.value.trim() == ""){
                spanError.innerText = '* El campo no puede estar vacio';
                hayError = true;
            } else if(this.value.length < 6){
                spanError.innerText = '* La contraseña debe tener minimo 6 caracteres';
                hayError = true;
            } else {
                spanError.innerText = '';
            }
        });
        var campoPasswordConfirm = document.querySelector('input#password-confirm');
        campoPasswordConfirm.addEventListener('blur', function(){
            var spanError = document.querySelector('span#error-password');
            if(this.value.trim() == "") {
                hayError = true;
                spanError.innerText = '* El campo no puede estar vacio';
            } else if(this.value != campoPassword.value){
                hayError = true;
                spanError.innerText = '* Las contraseñas no coinciden';
            } else {
                spanError.innerText = '';
            }
        });

        //NO ENVIES EL FORMULARIO HASTA QUE NO HAYA ERRORES.
        formularioRegistro.onsubmit = function(event){
            event.preventDefault();
            if(hayError == true){
                event.preventDefault();
            }
        }
    }

    //----------------------------------------------------------
    //      BOTONES DE + Y - EN PRODUCTOS y EVENT SUBMIT
    //----------------------------------------------------------
    var formularioCantidad = document.querySelector('form.formulario-cantidad');
    if(formularioCantidad){
        var btnLess = document.querySelector('i.less');
        var btnMore = document.querySelector('i.more');
        var cantidad = document.querySelector('input#cantidad');

        //readonly hace que algo no sea modificable con clickearlo y escribir (funcionaria con estos more o less que tocan desde adentro.
        //PERO mejor cambiar a input type="number", que tendria que modificar el css, para que quede lindo Y validar el campo para que no acepte numeros negativos. VER EN CASA
        btnMore.addEventListener('click', function(){
            cantidad.value++;
        });
        btnLess.addEventListener('click', function(){
            if(cantidad.value <= 1) {
              cantidad.value = 1;
            } else {
              cantidad.value--;
            }
        });
        cantidad.addEventListener('blur', function(){
            if(this.value < 1){
                this.value = 1;
            }
        });

        // formularioCantidad.addEventListener('submit', postDataCantidad);
    }

    // var formularioAgregar = document.querySelector('form.form-agregar');
    // if(formularioAgregar){
    //     formularioAgregar.addEventListener('submit', postData);
    // }

    // -------------------------
    //      POST-DATA
    //--------------------------

    //COMENTARIO: Todavia no estoy segura de como funciona. ¿Como seria lo de la API con el carrito? Preguntar el miércoles, asi empiezo a aplicarlo acá
    // function postData(event){
    //     var dataAgregar = {
    //         user_id = "",
    //         producto_id = "" //Hay que capturar la data que vamos a pasarle
    //     }
    //      event.preventDefault();
    //      fetch(URL, {
    //             method: 'POST',
    //             headers : new Headers(),
    //             body:JSON.stringify(dataAgregar)
    //         })
    //          .then(function(respuesta){
    //             return respuesta.json();
    //          })
    //          .then(function(respuesta){
    //              //NI IDEA
    //          })
    //          .catch (function (error) {
    //            console.log(error);
    //          });
    // }

//ACÁ TERMINA EL WINDOW ONLOAD
}
