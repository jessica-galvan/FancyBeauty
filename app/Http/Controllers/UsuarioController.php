<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Usuario;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\EditarPerfil;



class UsuarioController extends Controller{
  public function index(){
      //
  }

  public function create(Request $req){
    // $reglas = [
    //   'nombre' => 'require|string',
    //   'apellido' => 'require|string',
    //   'email' => 'require|email|unique:usuario, email',
    //   'contrasenia' => 'require|string|min:6',
    //   'confirmarContrasenia' => 'require|string',
    //   'preguntaSeguridad' => 'require|string',
    //   'respuestaSeguridad' => 'require|string',
    // ];
    //
    // $mensajes = [
    //   'string' => 'El campo :attribute debe ser de texto',
    //   'min' => 'La contraseña debe tener como minimo 6 caracteres',
    //   'email' => 'No es valido como email',
    //   'required' => 'El campo :attribute no puede estar vacio',
    // ];
    //
    // $this->validate($req, $reglas, $mensajes);
    //
    // //Aca empiezo a guardar todo en el objeto usuario
    // $nuevoUsuario = new Usuario();
    // $nuevoUsuario->nombre = $req['nombre'];
    // $nuevoUsuario->apellido = $req['apellido'];
    // $nuevoUsuario->email = $req['email'];
    // $contrasenia = password_hash($req['contrasenia'], PASSWORD_DEFAULT);
    // $nuevoUsuario->contrasenia = $contrasenia;
    // $nuevoUsuario->preguntaSeguridad = $req['preguntaSeguridad'];
    // $respuestaSeguridad = password_hash($req['respuestaSeguridad'], PASSWORD_DEFAULT);
    // $nuevoUsuario->respuestaSeguridad = $respuestaSeguridad;
    //
    // //Acá se guarda
    // $nuevoUsuario->save();
    // return redirect('confirmacion');
  }

  public function store(Request $request){
      //
  }

  public function show(){
      $usuario = Auth::user();

      function calcularEdad($fecha){
          $dia = date("j");
          $mes = date("n");
          $anio = date("Y");
          $anioNacimiento = substr($fecha, 0, 4);
          $mesNacimiento = substr($fecha, 5, 2);
          $diaNacimiento = substr($fecha, 8, 2);

          if($mesNacimiento > $mes){
              $edad = $anio - $anioNacimiento-1;
          } else {
              if($mes == $mesNacimiento && $diaNacimiento > $dia){
                  $edad = $anio - $anioNacimiento -1;
              } else {
                  $edad = $anio - $anioNacimiento;
              }
          }
          return $edad;
      }

    if($usuario['date_of_birth'] != "") {
        $usuario['fechaNacimiento'] = date("d-m-Y", strtotime($usuario['date_of_birth']));
        $usuario['edad'] = calcularEdad($fechaNacimientoOriginal);
    }

      return view('perfilUsuario', compact('usuario'));
  }

  public function edit(){
      $usuario = Auth::user();
      $info = new EditarPerfil;
      $listaArray = $info->array();
      return view('editarPerfil', compact('usuario', 'listaArray'));
  }

  public function update(Request $req){
      $usuario = Auth::user();

      $reglas = [
        // 'tonoPiel' => 'string',
        // 'tipoPiel' => 'string',
        // 'genero' => 'string',
        // 'provincia' => 'string',
        // 'fechaNacimiento' => 'date',
        'foto' => 'image',
      ];

      $mensajes = [
        // 'string' => '* El campo debe ser de texto',
        // 'date' => '* Debe ser una fecha',
        'image' => '* El archivo subido no es una imagen',
      ];

      $this->validate($req, $reglas, $mensajes);
      /*HASTA ACÁ VALIDA*/
      if($req->file('foto')){
        $path = $req->file('foto')->store('/public/user-avatar');
        $foto = basename($path);
        $producto->foto = $foto;
      }
      /*Hasta acá guardo el archivo en la carpeta de fotos de usuario y ahora viene la parte de recuperar el dato y no el valor del array con una funcion de antes.*/
      $info = new EditarPerfil;
      $listaArray = $info->array();

      $usuario->genero = $info->recuperarDato('genero', $req['genero']);
      $usuario->tonoPiel = $info->recuperarDato('genero', $req['tonoPiel']);
      $usuario->tipoPiel = $info->recuperarDato('genero', $req['tipoPiel']);
      $usuario->provincia = $info->recuperarDato('genero', $req['provincia']);
      $usuario->date_of_birth = $info->recuperarDato('genero', $req['fechaNacimiento']);
      $usuario->save();
      return view('perfilUsuario', compact('usuario'));
  }

  public function editPass(){
      return view('cambiarContrasenia');
  }

  public function updatePass(Request $req){
      $usuario = Auth::user();
      $reglas = [
          'oldPassword' => 'required'|'string',
          'password' => 'required'|'string'|'min:6'|'confirmed'|'different:now_password',
      ];
      $mensajes = [
          'required' => '* El campo no puede estar vacio',
          'string' => '* El campo debe ser del tipo texto',
          'min' => '* La contraseña debe tener al menos caracteres',
          'confirmed' => '* Las contraseñas no coinciden',
          'different' => '* La nueva contraseña no puede ser igual a la anterior'
      ];
      $this->validate($req, $reglas, $mensajes);
      $contraseniaOriginal = $usuario->password;
      if(!password_verify($req['oldPassword'], $contraseniaOriginal)){
          $errorPrincipal = 'Contraseña incorrecta';
          return view('cambiarContrasenia', compact('errorPrincipal'));
      }
      /*HASTA ACÁ VALIDA*/
      $usuario->password = password_hash($req['password'], PASSWORD_DEFAULT);
      $usuario->save();
      return redirect('/perfil', compact('usuario'));
  }
}
