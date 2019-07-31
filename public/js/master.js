window.onload = function() {

    // -------------------------
    //      CARRITO
    //--------------------------
    var user_box = document.querySelector('#user-box');
    var user_id = user_box.getAttribute('data-userid');

    function getCarrito(id){
      fetch('http://localhost:8000/api/carrito/'+ id)
        .then(function(respuesta){
           return respuesta.json();
        })
        .then(function(respuesta){
            console.log(respuesta);
        })
        .catch (function (error) {
          console.log(error);
        });
    }

    getCarrito(user_id);

    function addtocart(event){
        event.preventDefault();
        let hijos = this.children;
        let productID = hijos[1].value;

        let dataAgregar = {
            id: productID,
            user_id: user_id
        }
        fetch('http://localhost:8000/api/carrito', {
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
         })
         .catch (function (error) {
             console.log(error);
         });
    }

    function deletefromcart(event){
        event.preventDefault();

        let productID = this.getAttribute('name');
        let dataAgregar = {
            id: productID,
            user_id: user_id
        }

        fetch('http://localhost:8000/api/carrito/eliminar', {
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
             // refreshCarrito(respuesta);
         })
         .catch (function (error) {
             console.log(error);
         });
    }

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
            var regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm; //validacion de email
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
            if(this.value.trim() == "") { //trim(this.value)
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

    var formularioAgregar = document.querySelectorAll('.form-agregar');
    if(formularioAgregar){
        for (formAg of formularioAgregar) {
          formAg.addEventListener('submit', addtocart);
        }
    }

    //----------------------------------------------------------
    //      CARRITO
    //----------------------------------------------------------
    var carrito = document.querySelector('.carrito');
    if(carrito){

    }

    var eliminar = document.querySelectorAll('.btn-eliminar');
    if(eliminar){
        for(item of eliminar){
            item.addEventListener('click', deletefromcart);
        }
    }

    function refreshCarrito(carrito){
      // CANTIDAD
      // <li>
      //     <!--Cantidad-->
      //     <form class="formulario-cantidad" action="" method="post">
      //       @csrf
      //         <div class="cantidad">
      //             <i class='less'>-</i>
      //             <input id="cantidad" type="int" name="cantidad" value="{{$item['cantidad']}}">
      //             <i class='more'>+</i>
      //         </div>
      //         <input type="text" hidden name="" value="">
      //         <input type="text" hidden name="producto_id" value="{{$item['id']}}">
      //         {{-- Estaria genial que cuando sepamos javascript, en vez de tener que darle a un boton, que nos lleve a otra pagina y luego nos vuelva a traer, para que se cambie en la base de datos, que con darle a los numeros y a un tilde o algo, se haga la modificacion. Ni idea de si se puede. Actualmente estos botones estan de decoracion, no funcionan--}}
      //     </form>
      // </li>

      //BUTTON
      // <li>
      //     <button class = "btn-eliminar" type="button" name="{{$item['id']}}">Eliminar</button>
      // </li>


      for (item of carrito) {
        var carrito = document.querySelector('.carrito');

        let article = document.createElement('article');
        article.setAttribute('class', 'item');
        carrito.append(article);
        let ul = document.createElemente('ul');
        article.append(ul);

        let imageli = document.createElement('li');
        let image = document.createElement('img');
        let link ='/storage/productos/' + item['foto']+ '" alt="Foto Producto'
        image.setAttribute('src', link);
        ul.append(imageli);
        imageli.append(image);

        let nombre = document.createElement('li');
        nombre.innterText = item['nombre'];
        ul.append(nombre);

        let precio = document.createElement('li');
        precio.innerText = item['precio'];
        ul.append(precio);

        let cantidad = document.createElement('li');
        cantidad.innetText = item['cantidad'];
        ul.appned(cantidad);

        let subtotal = document.createElement('li');
        subtotal.innerText = 'Subtotal: $'+ item['cantidad']*item['precio'];
        ul.append(subtotal);

        let eliminar = document.createElement('li');
        eliminar.innerText = '<button class = "btn-eliminar" type="button" name="' + item['id']+'">Eliminar</button>';
        ul.append(eliminar);
      }
    }



//ACÁ TERMINA EL WINDOW ONLOAD
}
