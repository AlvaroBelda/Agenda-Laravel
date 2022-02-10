<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = auth()->user()->categorias();
        return view('gestionCategorias', compact('categorias'));
    }
    public function anadir()
    {
        return view('anadirCategoria');
    }

    public function crear(Request $request)
    {
        $this->validate($request, [
            'nombreCategoria' => 'required'
        ]);
        $categoria = new Categoria();
        $categoria->nombreCategoria = $request->nombreCategoria;
        $categoria->user_id = auth()->user()->id;
        $categoria->save();
        return redirect('/gestionCategorias');
    }

    public function editar(Categoria $categoria)
    {

        if (auth()->user()->id == $categoria->user_id)
        {
            return view('editarCategoria', compact('categoria'));
        }
        else {
            return redirect('/gestionCategorias');
        }
    }

    public function modificar(Request $request, Categoria $categoria)
    {
        if(isset($_POST['borrar'])) {
            $categoria->delete();
            return redirect('/gestionCategorias');
        }
        else
        {
            $this->validate($request, [
                'nombreCategoria' => 'required'
            ]);
            $categoria->nombreCategoria = $request->nombreCategoria;
            $categoria->save();
            return redirect('/gestionCategorias');
        }
    }
}
