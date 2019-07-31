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

    public function api($user_id){
      $carrito = Carrito::where('estado', '0')->where('user_id', $user_id)->get();
      return $carrito;
    }

    public function apiStore(Request $req){
      $user_id = $req->user_id;
      // Si el producto ya esta en el carrito...
      $existe = Carrito::where('producto_id', $req->id)->where('user_id', $user_id)->where('estado','0')->first();
      // //Si la cantidad esta seteada en el request, pone eso en la variable, sino pone 1.
      $cantidad = isset($req->cantidad)?$req->cantidad:1;
      // $cantidad = 1;
      if($existe){
          $existe->cantidad += $cantidad;
          $existe->save();
          return $this->api($user_id);
      }

      $carrito = new Carrito;
      $producto = Producto::find($req->id);
      //agregamos toda la data.
      $carrito->user_id = $user_id;
      $carrito->producto_id = $producto['id'];
      $carrito->nombre = $producto['nombre'];
      $carrito->precio = $producto['precio'];
      $carrito->cantidad = $cantidad;
      $carrito->foto = $producto['foto'];
      $carrito->estado = '0';
      $carrito->num_carrito = 0;
      $carrito->save();

      return $this->api($user_id);
    }

    public function apiBorrar(Request $req){
        $user_id = $req->user_id;
        $carrito = Carrito::where('id', $req->id)->where('user_id', $user_id)->where('estado', '0')->first();
        $carrito->delete();
        return $this->api($user_id);
    }

    public function store(Request $req){
        //Esto controla si el producto ya esta agregado en el carrito del usuario. Si ya esta, dependiendo de donde viene, agrega un producto, o la cantidad seleccionada por el usuario.
        $existe = Carrito::where('producto_id', $req->id)->where('user_id',Auth::user()->id)->where('estado','0')->first();
        //si, la cantidad esta seteada en el request, pone eso en la variable, sino pone 1.
        $cantidad = isset($req->cantidad)?$req->cantidad:1;
        if($existe){
            $existe->cantidad += $cantidad;
            $existe->save();
            return redirect('/');
        }

        $carrito = new Carrito;
        $producto = Producto::find($req['id']);
        //agregamos toda la data.
        $carrito->user_id = Auth::user()->id;
        $carrito->producto_id = $producto['id'];
        $carrito->nombre = $producto['nombre'];
        $carrito->precio = $producto['precio'];
        $carrito->cantidad = $cantidad;
        $carrito->foto = $producto['foto'];
        $carrito->estado = '0';
        $carrito->num_carrito = 0;
        $carrito->save();

        // return redirect::back()->with('mensaje', 'El producto ha sido agregado al carrito');
        // return redirect::back();
        return redirect('/');
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

    public function historial(){
      $carts = Carrito::where('user_id', Auth::user()->id)->where('estado', 1)->get()->groupBy('num_carrito');
      return view('historial', compact('carts'));
    }

    public function closecart(){
        $items = Carrito::where('user_id', Auth::user()->id)->where('estado', 0)->get();

        $cartNumber = Carrito::all()->max('num_carrito')+1;

        foreach($items as $item){
          $item->num_carrito = $cartNumber;
          $item->estado = 1;
          $item->save();
        }
        return redirect('/felicitaciones');
    }

    public function destroy($id){
        $carrito = Carrito::where('id', $id)->where('user_id', Auth::user()->id)->where('estado', '0')->first();
        $carrito->delete();
        return redirect('/carrito');
    }
}
