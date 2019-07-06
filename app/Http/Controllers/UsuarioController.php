<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\User;
use App\EditarPerfil;



class UsuarioController extends Controller{
  public function index(){
      //
  }

  public function create(Request $req){
      //
  }

  public function store(Request $request){
      //
  }

  public function show(){
      $usuario = Auth::user();
      $info = new EditarPerfil;
      $listaArray = $info->array();

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

      $usuario['tonoPielDato'] = $info->recuperarDato('tipoPiel', $usuario['tipoPiel']);
      $usuario['tipoPielDato'] = $info->recuperarDato('tonoPiel', $usuario['tonoPiel']);
      $usuario['provinciaDato']= $info->recuperarDato('provincia', $usuario['provincia']);
      $usuario['generoDato'] = $info->recuperarDato('genero', $usuario['genero']);
      if($usuario['date_of_birth'] != "") {
          $usuario['fechaNacimiento'] = date("d-m-Y", strtotime($usuario['date_of_birth']));
          $usuario['edad'] = calcularEdad($usuario['date_of_birth']);
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
        $usuario->foto = $foto;
      }
      $usuario->genero = $req['genero'];
      $usuario->tonoPiel = $req['tonoPiel'];
      $usuario->tipoPiel = $req['tipoPiel'];
      $usuario->provincia = $req['provincia'];
      $usuario->date_of_birth = $req['fechaNacimiento'];
      $usuario->save();
      return redirect('/perfil');
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
          'different' => '* La nueva contraseña no puede ser igual a la anterior',
      ];
      $this->validate($req, $reglas, $mensajes);

      $contraseniaOriginal = $usuario->password;
      if(!password_verify($req['oldPassword'], $contraseniaOriginal)){
          $errorPrincipal = 'Contraseña incorrecta';
          return view('cambiarContrasenia', compact('errorPrincipal'));
      }
      /*HASTA ACÁ VALIDA*/
dd($req);
      $usuario->password = Hash::make($req['password']);
      $usuario->save();
      return redirect('/perfil');
  }
}
