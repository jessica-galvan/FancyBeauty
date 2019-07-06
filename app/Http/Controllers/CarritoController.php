<?php

namespace App\Http\Controllers;
use App\Carrito;
use App\Producto;
use App\User;
use Auth;
use Illuminate\Http\Request;

class CarritoController extends Controller{

    public function index(){
        $carrito = Carrito::where('estado', '0')->where('user_id', Auth::user()->id)->get();

        $total = 0;
        foreach($carrito as $item){
            $total = $total + ($item['precio']*$item['cantidad']);
        }

        return view('carrito', compact('carrito', 'total'));
    }

    public function create(){
        //
    }

    public function store(Request $req){
        $carrito = new Carrito;
        $producto = Producto::find($req['id']);

        if(isset($req['cantidad'])){
          $cantidad = $req['cantidad'];
        } else {
          $cantidad = 1;
        }

        $carrito->usuario_id = Auth::user()->id;
        $carrito->nombre = $producto['nombre'];
        $carrito->precio = $producto['precio'];
        $carrito->cantidad = $cantidad;
        $carrito->foto = $producto['foto'];

        return Redirect::back()->with('mensaje', 'El producto ha sido agregado al carrito');
        // return Redirect::back();
    }

    public function show(Carrito $carrito){
        //
    }

    public function edit(Carrito $carrito){
        //
    }

    public function update(Request $request, Carrito $carrito){
        //
    }

    public function destroy($id){
        $carrito = Carrito::where('id', $id)->where('usuario_id', Auth::user()->id)->where('estado', '0')->first();
        $carrito->delete();
        return redirect('/carrito');
    }
}