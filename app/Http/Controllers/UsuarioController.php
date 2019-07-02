<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Auth;



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
      return view('perfilUsuario', compact('usuario'));
  }

  public function edit($id){
      //
  }

  public function update(Request $request, $id){
      //
  }


  public function destroy($id){
      //
  }
}
