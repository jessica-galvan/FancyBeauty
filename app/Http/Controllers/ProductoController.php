<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Estado;
use App\ TipoProducto;

class ProductoController extends Controller {

    public function index(){
        $listaProductos = Producto::all();
        return view('index', compact('listaProductos'));
    }

    public function create(){
        $tipoProductos = TipoProducto::all();
        $categorias = Categoria::all();
        $estados = Estado::all();
        return view('nuevoProducto', compact('categorias', 'estados', 'tipoProductos'));
    }

    public function store(Request $req){
        $tipoProductos = TipoProducto::all();
        $categorias = Categoria::all();
        $estados = Estado::all();
        $reglas = [
          'nombre' => 'required|string',
          'descripcion' => 'required|string',
          'precio' => 'required|int',
          'estado_id' => 'required|string',
          'categoria_id' => 'required|string',
          'tipoProducto_id' => 'required|string',
          'foto' => 'required|image',
        ];

        $mensajes = [
          'string' => '* El campo debe ser de texto',
          'int' => '* El campo debe ser númerico',
          'required' => '* El campo no puede estar vacio',
          'image' => '* El archivo subido no es una imagen',
          'image.required' => '* El producto debe tener una imagen',
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
        $nuevoProducto->tipoproducto_id = $req['tipoProducto_id'];
        $nuevoProducto->foto = $foto;
        $nuevoProducto->save();
        $mensajePrincipal = 'El producto se ha agregado exitosamente';
        return view('nuevoProducto', compact('mensajePrincipal','categorias', 'estados', 'tipoProductos'));
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
        $tipoProductos = TipoProducto::all();
        $categorias = Categoria::all();
        $estados = Estado::all();
        $producto = Producto::find($id);
        return view('editarProducto', compact('producto', 'categorias', 'estados', 'tipoProductos'));
        // return view('editarProducto');
    }

    public function update(Request $req, $id){
        /*VALIDACIONES*/
        $reglas = [
          'nombre' => 'required|string',
          'descripcion' => 'required|string',
          'precio' => 'required|numeric',
          'estado_id' => 'required|int',
          'categoria_id' => 'required|int',
          'tipoProducto_id' => 'required|int',
          'foto' => 'image',
        ];

        $mensajes = [
          'string' => '* El campo debe ser de texto',
          'int' => '* El campo debe ser númerico',
          'required' => '* El campo no puede estar vacio',
          'image' => '* El archivo subido no es una imagen',
          'numeric' => '* El precio debe ser numérico'
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
