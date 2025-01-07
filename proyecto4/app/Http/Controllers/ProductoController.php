<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $listaProducto = Producto::all();
        $error = '';

        if($listaProducto == null) {
            $error = "No hay Productos disponibles";
        }

        return view('productos.index', compact('listaProducto'), ['error' => $error]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact("categorias"));
    }

    public function store(Request $request)
    {
        // Validación de formularios
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'categoria' => 'required',

        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->categoria_id = $request->categoria;

        $res = $producto->save();

        return redirect()->route('categorias.index', compact('res'));
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('productos'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', compact("categorias"), compact("producto"));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate(["nombre" => "required", "descripcion" => "required", "stock"=>"required"]);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->categoria_id = $request->categoria;
        $producto->save();

        return redirect()->route('categorias.index');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('categorias.index');
    }
}
