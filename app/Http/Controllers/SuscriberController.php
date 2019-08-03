<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suscriber;

class SuscriberController extends Controller {

  public function apiStore(Request $req){
    // $mensajes = [
    //     'email' => '* Email invalido',
    //     'unique' => '* Email ya en base de datos'
    // ];
    // $reglas = [
    //     'email' => 'email|unique: suscribers, email',
    // ];
    //
    // $this->validate($req, $reglas, $mensajes);

    $suscriber = new Suscriber;
    $suscriber->email = $req->email;
    $suscriber->save();
    return "true";
  }
}
