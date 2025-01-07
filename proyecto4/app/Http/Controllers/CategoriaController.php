<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $listaCategoria = Categoria::all();
        $error = '';

        if($listaCategoria == null) {
            $error = "No hay categorias disponibles";
        }

        return view('categorias.index', compact('listaCategoria'), ['error' => $error]);
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        // Validación de formularios
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',

        ]);

        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;

        $res = $categoria->save();

        return redirect()->route('categorias.index', compact('res'));
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categorias'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate(["nombre" => "required", "descripcion" => "required"]);
        $categoria = Categoria::find($categoria->id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria = Categoria::find($categoria->id);
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
    public function productos(int $categoria_id){
        $categoria = Categoria::find($categoria_id);
        $listaProducto = $categoria->getProductos;
        return view('categorias.productoCategoria', compact('listaProducto'));
    }
}
