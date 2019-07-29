// <div class="cantidad">
//     <i class='less'>-</i>
//     <input id="cantidad" type="int" name="cantidad" value="1">
//     <i class='more'>+</i>
// </div>

var less = document.querySelector('i.less');
var more = document.querySelector('i.more');
var cantidad = document.querySelector('input#cantidad');

function sumar(){
  cantidad.value++;
}

function restar(){
  if(cantidad.value <= 1) {
    cantidad.value = 1;
  } else {
    cantidad.value--;
  }
}

//readonly hace que algo no sea modificable con clickearlo y escribir (funcionaria con estos more o less que tocan desde adentro.
//PERO mejor cambiar a input type="number", que tendria que modificar el css, para que quede lindo Y validar el campo para que no acepte numeros negativos. VER EN CASA

more.addEventListener('click', sumar);
less.addEventListener('click', restar);


//VALIDACIONES FORMULARIOS
var formulario = document.querySelector('form');
var elementosFormulario = formulario.elements;
var arrayElementos = Array.from(elementosFormularios);
arrayElementos.pop()

function

arrayElementos.forEach(function(element){
  element.addEventListener ('blur' function(){
      if(this.value == ""){
        this.style.borderColor = 'red';
        //hacer que aparezca un mensaje que el campo no puede estar vacio.
      }
    }
  )
});

// var campoNombre = document.querySelector('input[name = name]');
// var campoApellido = document.querySelector('input[name = surname]');
// var campoEmail = document.querySelector('input[name = email]');
// var campoPassword = document.querySelector('input[name = password]');
// var campoPasswordConfirm = document.querySelector('input[name = password_confirmation]');
