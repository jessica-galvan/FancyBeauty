<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
// use App\Categoria;

class ProductoController extends Controller {

    public function index(){
        $listaProductos = Producto::all();
        return view('index', compact('listaProductos'));
    }

    public function create(){
        return view('nuevoProducto');
    }

    public function store(Request $req){
        $reglas = [
          'nombre' => 'require|string',
          'descripcion' => 'require|string',
          'precio' => 'require|int',
          'estado_id' => 'require|string',
          'categoria_id' => 'require|string',
          'tipoProducto_id' => 'require|string',
          'foto' => 'require|image',
        ];

        $mensajes = [
          'string' => '* El campo debe ser de texto',
          'int' => '* El campo debe ser númerico',
          'required' => '* El campo no puede estar vacio',
          'image' => '* El archivo subido no es una imagen',
          'image.require' => '* El producto debe tener una imagen',
        ];

        $this->validate($req, $reglas, $mensajes);
        /*HASTA ACÁ VALIDA*/
        $path = $req->file('foto')->store('/public/productos'); /*Esto trae el archivo*/
        $foto = basename($path);
        /*Hasta acá guardo el archivo en la carpeta de fotos de usuario y */
        $nuevoProducto = new Producto();
        $nuevoProducto->nombre = $req['nombre'];
        $nuevoProducto->descripcion = $req['descripcion'];
        $nuevoProducto->precio = $req['precio'];
        $nuevoProducto->estado_id = $req['estado_id'];
        $nuevoProducto->categoria_id = $req['categoria_id'];
        $nuevoProducto->tipoProducto_id = $req['tipoProducto_id'];
        $nuevoProducto->foto = $foto;
        $nuevoProducto->save();
        $mensajePrincial = 'El producto se ha agregado exitosamente';

        return view('nuevoProducto', compact('mensajePrincipal'));
    }

    public function show($id){
        $producto = Producto::find($id);
        return view('producto', compact('producto'));
    }

    public function indexEdit(){
        $productos = Producto::all();
        return view('lista-productos', compact('productos'));
    }

    public function edit($id){
        return view('editarProducto');
    }

    public function update(Request $request, $id){
        /*VALIDACIONES*/
        $reglas = [
          'nombre' => 'require|string',
          'descripcion' => 'require|string',
          'precio' => 'require|int',
          'estado_id' => 'require|string',
          'categoria_id' => 'require|string',
          'tipoProducto_id' => 'require|string',
          'foto' => 'image',
        ];

        $mensajes = [
          'string' => '* El campo debe ser de texto',
          'int' => '* El campo debe ser númerico',
          'required' => '* El campo no puede estar vacio',
          'image' => '* El archivo subido no es una imagen',
          'image.require' => '* El producto debe tener una imagen',
        ];
        $this->validate($req, $reglas, $mensajes);

        /*Guardamos foto producto, si hay una nueva -VER TEMA*/
        $path = $req->file('foto')->store('/public/productos'); /*Esto trae el archivo*/
        $foto = basename($path);
        /*Traemos el dato original*/
        $producto = Producto::find($id);
        /*Guardamos encima*/
        $producto->nombre = $req['nombre'];
        $producto->descripcion = $req['descripcion'];
        $producto->precio = $req['precio'];
        $producto->tipoProducto_id = $req['tipoProducto'];
        $producto->categoria_id = $req['categoria'];
        $producto->estado_id = $req['estado_id'];
        $producto->foto = $foto;
        /*Subimos a base de datos*/
        $producto->save();
        /*Cuando terminas de editar, mandame de nuevo a la lista de productos...*/
        return redirect('lista-productos');
    }

    public function showDestroy($id){
        $producto = Producto::find($id);
        return view('borrarProducto', compact('producto'));
    }

    public function destroy($id){
      $producto = Producto::find($id);
      $producto->delete();
      return redirect('confirmacion-borrado');
    }
}
