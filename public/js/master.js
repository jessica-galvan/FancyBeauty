window.addEventListener('load', function(){
    // var link = 'http://fancybeauty.dhalumnos.com' ;
    var link = 'http://localhost:8000/';

    // -------------------------
    //      CARRITO
    //--------------------------
    var user_box = document.querySelector('#user-box');
    var user_id = user_box.getAttribute('data-userid');
    var total_items = document.querySelectorAll('.totalItems');

    function getTotalItems(arrayCarrito){
        var total = 0;
        for(item of arrayCarrito) {
            total = total + item['cantidad'];
        }
        return total;
    }

    function getTotalMonto(arrayCarrito){
        var total = 0;
        for(item of arrayCarrito) {
            let subtotal = item['cantidad']*item['precio'];
            total = total + subtotal;
        }
        return total;
    }

    function getCarrito(id){
      fetch(link + '/api/carrito/'+ id)
        .then(function(respuesta){
           return respuesta.json();
        })
        .then(function(respuesta){
            for (item of total_items){
                item.innerText = getTotalItems(respuesta);
            }
        })
        .catch (function (error) {
          console.log(error);
        });
    }

    function addtocart(event){
        event.preventDefault();
        let hijos = this.children;
        let productID = hijos[1].value;
        let cantidad = 1;

        let dataAgregar = {
            id: productID,
            user_id: user_id,
            cantidad: cantidad
        }
        // fetch('http://localhost:8000/api/carrito', {
        fetch(link + '/api/carrito', {
              method: 'POST',
              headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
              },
              body:JSON.stringify(dataAgregar)
          })
         .then(function(respuesta){
              return respuesta.json();
         })
         .then(function(respuesta){
             for (item of total_items){
                 item.innerText = getTotalItems(respuesta);
             }
         })
         .catch (function (error) {
             console.log(error);
         });
    }

    if(user_id){
        getCarrito(user_id);
    }

    //--------------------------------------------------
    //        SUSCRIBE
    //--------------------------------------------------
    var suscribe_input = document.querySelectorAll('.email-suscribe');
    var suscribe_button = document.querySelectorAll('.btn-suscribe');
    var suscribe_error = document.querySelectorAll('.suscribe-error');

    function validarEmail(){
        var regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
        if (this.value.trim() != "" && !regex.test(this.value)){
            for (error of suscribe_error){
                error.innerText = '* Email invalido';
            }
        } else {
            for (error of suscribe_error){
                error.innerText = '';
            }
        }
    }

    function addSuscriber(event){
        event.preventDefault();
        var regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
        let email = "";
        for(input of suscribe_input){
            if (input.value.trim() == "") {
                event.preventDefault();
            } else if(!regex.test(input.value)) {
                event.preventDefault();
            } else {
                for (error of suscribe_error){
                    error.innerText = email;
                }
                email = input.value;
            }
        }

        let dataAgregar = {
            email: email,
        }

        // fetch('http://localhost:8000/api/suscribe', {
        fetch(link + '/api/suscribe', {
              method: 'POST',
              headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
              },
              body:JSON.stringify(dataAgregar)
          })
         .then(function(respuesta){
              return respuesta.json();
         })
         .then(function(respuesta){
             // console.log(respuesta);
             for (input of suscribe_input) {
                 input.value = "";
             }
         })
         .catch (function (error) {
             console.log(error);
         });
    }

    for (input of suscribe_input) {
        input.addEventListener('blur', validarEmail);
    }

    for (button of suscribe_button) {
        button.addEventListener('click', addSuscriber);
    }

    //--------------------------------------------------
    //        VALIDACIONES FORMULARIO REGISTRO
    //--------------------------------------------------
    var formularioRegistro = document.querySelector('form#registro');
    if(formularioRegistro) {
        var hayError = true;

        //PARA CAMPOS COMUNES
        function validarVacio() {
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
                hayError = false;
            }
        }

        function validarEmail(){
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
              hayError = false;
          }
        }

        function validarPassword(){
          var spanError = document.querySelector('span#error-password');
          if(this.value.trim() == ""){
              spanError.innerText = '* El campo no puede estar vacio';
              hayError = true;
          } else if(this.value.length < 6){
              spanError.innerText = '* La contraseña debe tener minimo 6 caracteres';
              hayError = true;
          } else {
              spanError.innerText = '';
              hayError = false;
          }
        }

        function validarConfirm(){
          var spanError = document.querySelector('span#error-password');
          if(this.value.trim() == "") { //trim(this.value)
              hayError = true;
              spanError.innerText = '* El campo no puede estar vacio';
          } else if(this.value != campoPassword.value){
              hayError = true;
              spanError.innerText = '* Las contraseñas no coinciden';
          } else {
              spanError.innerText = '';
              hayError = false;
          }
        }

        var campoNombre = document.querySelector('input#name');
        campoNombre.addEventListener('blur', validarVacio);
        var campoApellido = document.querySelector('input#surname');
        campoApellido.addEventListener('blur', validarVacio);

        //EMAIL
        var campoEmail = document.querySelector('input#email');
        campoEmail.addEventListener('blur', validarEmail);

        //CONTRASENIA
        var campoPassword = document.querySelector('input#password');
        campoPassword.addEventListener('blur', validarPassword);
        var campoPasswordConfirm = document.querySelector('input#password-confirm');
        campoPasswordConfirm.addEventListener('blur', validarConfirm);


        //NO ENVIES EL FORMULARIO HASTA QUE NO HAYA ERRORES.
        formularioRegistro.onsubmit = function(event){
            function validarVacioForm(campo){
              var name = campo.getAttribute('name');
              var spanError = document.querySelector('span#error-'+name);
              if(campo.value.trim() == ""){
                  spanError.innerText = '* El campo no puede estar vacio';
                  hayError = true;
              } else if(!isNaN(campo.value)){
                  spanError.innerText = '* El campo no puede ser de tipo numerico';
                  hayError = true;
              }else{
                  spanError.innerText = '';
                  hayError = false;
              }
            }
            function validarEmailForm(campo){
              var regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
              var spanError = document.querySelector('span#error-email');
              if(campo.value.trim() == ""){
                  spanError.innerText = '* El campo no puede estar vacio';
                  hayError = true;
              }else if (!regex.test(campo.value)){
                  spanError.innerText = '* Email no valido';
                  hayError = true;
              } else {
                  spanError.innerText = '';
                  hayError = false;
              }
            }
            function validarPasswordForm(campo){
              var spanError = document.querySelector('span#error-password');
              if(campo.value.trim() == ""){
                  spanError.innerText = '* El campo no puede estar vacio';
                  hayError = true;
              } else if(campo.value.length < 6){
                  spanError.innerText = '* La contraseña debe tener minimo 6 caracteres';
                  hayError = true;
              } else {
                  spanError.innerText = '';
                  hayError = false;
              }
            }
            function validarConfirmForm(campo){
              var spanError = document.querySelector('span#error-password');
              if(campo.value.trim() == "") { //trim(this.value)
                  hayError = true;
                  spanError.innerText = '* El campo no puede estar vacio';
              } else if(campo.value != campoPassword.value){
                  hayError = true;
                  spanError.innerText = '* Las contraseñas no coinciden';
              } else {
                  spanError.innerText = '';
                  hayError = false;
              }
            }
            validarVacioForm(campoNombre);
            validarVacioForm(campoApellido);
            validarEmailForm(campoEmail);
            validarPasswordForm(campoPassword);
            validarConfirmForm(campoPasswordConfirm);
            if(hayError == true){
                event.preventDefault();
            }
        }
    }

    //----------------------------------------------------------
    //     BOTONES DE + Y - EN DETALLE PRODUCTO
    //----------------------------------------------------------
    var formularioCantidad = document.querySelectorAll('form.formulario-cantidad');
    var carrito = document.querySelector('.carrito');

    function updateItemCantidad(cantidad, producto_id, user_id){
        let dataAgregar = {
                    cantidad: cantidad.value,
                    producto_id:producto_id,
                    user_id: user_id
                }

        // fetch('http://localhost:8000/api/cantidad', {
        fetch(link + '/api/cantidad', {
              method: 'POST',
              headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
              },
              body:JSON.stringify(dataAgregar)
          })
         .then(function(respuesta){
              return respuesta.json();
         })
         .then(function(respuesta){
             console.log(respuesta);
             for (item of total_items){
                 item.innerText = getTotalItems(respuesta);
             }
             total_compra.innerText = 'Total: '+ getTotalMonto(respuesta);
         })
         .catch (function (error) {
             console.log(error);
         });
    }

    function deleteItem(producto_id, user_id, item_id) {
        let dataAgregar = {
            producto_id: producto_id,
            user_id: user_id,
            item_id: item_id
        }

        // fetch('http://localhost:8000/api/carrito/eliminar', {
        fetch(link + '/api/carrito/eliminar', {
              method: 'POST',
              headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
              },
              body:JSON.stringify(dataAgregar)
          })
         .then(function(respuesta){
              return respuesta.json();
         })
         .then(function(respuesta){
             // console.log(respuesta);
             for (item of total_items){
                 item.innerText = getTotalItems(respuesta);
             }
             total_compra.innerText = 'Total: '+ getTotalMonto(respuesta);
         })
         .catch (function (error) {
             console.log(error);
         });
    }

    if(formularioCantidad && !carrito){
        for(form of formularioCantidad){
            let btn = form.getElementsByTagName('i');
            let btnLess = btn[0];
            let btnMore = btn[1];
            let producto_id = form[2].value;
            let cantidad = form[1];

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
        }
    }

    //----------------------------------------------------------
    //      CARRITO (INCLUYE + Y -, ELIMINAR, ETC.)
    //----------------------------------------------------------
    var article_carrito = document.querySelectorAll('article.item');
    if(carrito){
        var total_compra = document.querySelector('h3#total');
        for (var i = 0; i < article_carrito.length; i++) {
            let article = article_carrito[i];
            let formCantidad =  article.getElementsByTagName('form');
            let btn_i = article.getElementsByTagName('i');
            let input_collection = article.getElementsByTagName('input')
            let cantidad = input_collection[1];
            let item_id =  input_collection[2];
            let li_collection = article.getElementsByTagName('li');
            let subtotal = li_collection[4];
            let precio_li = li_collection[2].innerText;
            let producto_id = input_collection[2].value;
            let btnLess = btn_i[0];
            let btnMore = btn_i[1];
            let btnEliminar = article.getElementsByTagName('button')[0];


            btnMore.addEventListener('click', function(){
                cantidad.value++;
                let precio_array = precio_li.split(': $');
                let precio = precio_array[1].split('.');
                let nuevoSubtotal = cantidad.value*precio[0];
                subtotal.innerText = "Subtotal: $" + nuevoSubtotal;
                updateItemCantidad(cantidad, producto_id, user_id);
            });

            btnLess.addEventListener('click', function(){
                if(cantidad.value <= 1) {
                     cantidad.value = 1;
                     var confirmar = confirm('¿Deseas eliminar este articulo del carrito?');
                     if(confirmar){
                         article.style.display = 'none';
                         deleteItem(producto_id, user_id);
                     }
                } else {
                      cantidad.value--;
                      if(carrito){
                          let number = precio_li.split(': $');
                          let precio = number[1].split('.');
                          let nuevoSubtotal = cantidad.value*precio[0];
                          subtotal.innerText = "Subtotal: $" + nuevoSubtotal;
                          updateItemCantidad(cantidad, producto_id, user_id);
                      }
                }
            });

            cantidad.addEventListener('blur', function(){
                if(this.value < 1){
                    this.value = 1;
                    if(carrito){
                      var confirmar = confirm('¿Deseas eliminar este articulo del carrito?');
                      if(confirmar){
                          article.style.display = 'none';
                          deleteItem(producto_id, user_id);
                      }
                    }
                } else {
                    if(carrito){
                        updateItemCantidad(cantidad, producto_id, user_id);
                        let number = precio_li.split(': $');
                        let precio = number[1].split('.');
                        let nuevoSubtotal = cantidad.value*precio[0];
                        subtotal.innerText = "Subtotal: $" + nuevoSubtotal;
                    }
                }
            });

            btnEliminar.addEventListener('click', function(){
                var confirmar = confirm('¿Deseas eliminar este articulo del carrito?');
                if(confirmar){
                    article.style.display = 'none';
                    deleteItem(producto_id, user_id);
                }
            });
        }
    }

    //----------------------------------------------------------
    //      AGREGAR PRODUCTOS
    //----------------------------------------------------------
    var formularioAgregar = document.querySelectorAll('.form-agregar');
    // console.log(formularioAgregar);

    if(formularioAgregar){
        for (formAg of formularioAgregar) {
          formAg.addEventListener('submit', addtocart);
        }
    }


//ACÁ TERMINA EL WINDOW ONLOAD
})
