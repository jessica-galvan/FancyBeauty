<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Estado;
use App\ TipoProducto;
use Auth;

class ProductoController extends Controller {
    /*PARA USERS*/
    public function index(){
        $listaProductos = Producto::all();
        return view('index', compact('listaProductos'));
    }

    public function show($id){
        $producto = Producto::find($id);
        return view('producto', compact('producto'));
    }

    public function categoria($id){
        $productos = Producto::where('categoria_id', $id)->paginate(10);

        $categoria = Categoria::find($id);

        return view('categoria', compact('productos', 'categoria'));
    }

    public function buscador($palabra){
      //Si quiero que busque frases, voy a tener que hacer un split por espacios, para que me arme un array con todas las palabras que hay en la frase, y luego haga un foreach donde busque con el where like, con cada palabra, y lo meta en un array (que previamente estaba vacio), hasta que termine. Luego ese nuevo array de productos que coinciden con alguna de las palabras, es enviado a la pagina de busquedas.

        $productos = Producto::where('nombre', 'like', "%$palabra%")->orWhere('categoria', 'like', "%$palabra%")->get();

        return view('filtro', compact('productos'));

    }

    /*PARA ADMINS*/
    public function indexEdit(){
      /*SOLO ADMINS*/
        if(Auth::user()->rol < 100){
          return redirect('/');
        }

      $productos = Producto::all();
      return view('lista-productos', compact('productos'));
    }

    public function create(){
        /*SOLO ADMINS*/
        if(Auth::user()->rol < 100){
          return redirect('/');
        }
        $tipoProductos = TipoProducto::all();
        $categorias = Categoria::all();
        $estados = Estado::all();
        return view('nuevoProducto', compact('categorias', 'estados', 'tipoProductos'));
    }

    public function store(Request $req){
      /*SOLO ADMINS*/
      if(Auth::user()->rol < 100){
        return redirect('/');
      }
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

    public function edit($id){
        /*SOLO ADMINS*/
        if(Auth::user()->rol < 100){
          return redirect('/');
        }
        $tipoProductos = TipoProducto::all();
        $categorias = Categoria::all();
        $estados = Estado::all();
        $producto = Producto::find($id);
        return view('editarProducto', compact('producto', 'categorias', 'estados', 'tipoProductos'));
    }

    public function update(Request $req, $id){
        /*SOLO ADMINS*/
        if(Auth::user()->rol < 100){
          return redirect('/');
        }
        /*VALIDACIONES*/
        $reglas = [
          'nombre' => 'required|string',
          'descripcion' => 'required|string',
          'precio' => 'required|numeric',
          'estado' => 'required|int',
          'categoria' => 'required|int',
          'tipoProducto' => 'required|int',
          'foto' => 'image',
        ];

        $mensajes = [
          'string' => ' El campo :atribute debe ser de texto',
          'int' => '* El campo debe ser númerico',
          'required' => '* El campo no puede estar vacio',
          'image' => '* El archivo subido no es una imagen',
          'numeric' => '* El precio debe ser numérico'
        ];
        //dd($this->validate($req, $reglas, $mensajes));
        $this->validate($req, $reglas, $mensajes);

        /*Traemos el dato original*/
        $producto = Producto::find($id);
        /*VALIDAR FOTO*/
        if($req->file('foto')){
          $path = $req->file('foto')->store('/public/productos'); /*Esto trae el archivo*/
          $foto = basename($path);
          $producto->foto = $foto;
        }
        /*Guardamos encima*/
        $producto->nombre = $req['nombre'];
        $producto->descripcion = $req['descripcion'];
        $producto->precio = $req['precio'];
        $producto->tipoProducto_id = $req['tipoProducto'];
        $producto->categoria_id = $req['categoria'];
        $producto->estado_id = $req['estado'];

        /*Subimos a base de datos*/
        $producto->save();
        /*Cuando terminas de editar, mandame de nuevo a la lista de productos...*/
        return redirect('/lista');
    }

    public function showDestroy($id){
        /*SOLO ADMINS*/
        if(Auth::user()->rol < 100){
          return redirect('/');
        }
        $producto = Producto::find($id);
        return view('borrarProducto', compact('producto'));
    }

    public function destroy(Request $req){
      /*SOLO ADMINS*/
      if(Auth::user()->rol < 100){
        return redirect('/');
      }

      $producto = Producto::find($req['id']);
      // unlink("/public/productos/".$producto['foto']);
      $producto->delete();
      return redirect('/confirmacion-borrado');
    }
}
