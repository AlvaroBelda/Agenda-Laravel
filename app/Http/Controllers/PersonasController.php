<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonasController extends Controller
{
    public function index()
    {
        $persona = auth()->user()->personas();
        return view('gestionPersonas', compact('persona'));
    }
    public function anadir()
    {
        return view('/anadirPersona');
    }

    public function crear(Request $request)
    {
        $this->validate($request, [
            'estrellaPersona'   => 'boolean',
            'nombrePersona'     => 'required',
            'apellidoPersona'   => 'required',
            'telefonoPersona'   => 'required',
            'categoria_id'      => 'required'
        ]);
        $persona = new Persona();
        $persona->estrellaPersona   = $request->estrellaPersona;
        $persona->nombrePersona     = $request->nombrePersona;
        $persona->apellidoPersona   = $request->apellidoPersona;
        $persona->telefonoPersona   = $request->telefonoPersona;
        $persona->categoria_id      = $request->categoria_id;
        $persona->user_id           = auth()->user()->id;
        $persona->save();
        return redirect('/gestionPersonas');
    }

    public function editar(Persona $persona)
    {

        if (auth()->user()->id == $persona->user_id)
        {
            return view('editarPersona', compact('persona'));
        }
        else {
            return redirect('/gestionPersonas');
        }
    }

    public function modificar(Request $request, Persona $persona)
    {
        if(isset($_POST['borrar'])) {
            $persona->delete();
            return redirect('/gestionPersonas');
        }
        else
        {
            $this->validate($request, [
                'estrellaPersona'   => 'boolean',
                'nombrePersona'     => 'required',
                'apellidoPersona'   => 'required',
                'telefonoPersona'   => 'required',
                'categoria_id'      => 'required'
            ]);

            $persona->estrellaPersona   = $request->estrellaPersona;
            $persona->nombrePersona     = $request->nombrePersona;
            $persona->apellidoPersona   = $request->apellidoPersona;
            $persona->telefonoPersona   = $request->telefonoPersona;
            $persona->categoria_id      = $request->categoria_id;
            $persona->save();
            return redirect('/gestionPersonas');
        }
    }

    public function modificarEstrella(Request $request, Persona $persona)
    {
        $this->validate($request, [
            'estrellaPersona'   => 'required'
        ]);

        $persona->estrellaPersona   = $request->estrellaPersona;
        $persona->save();
        return redirect('/gestionPersonas');
    }

    //dd($request->all());  Dentro de una función es parecido a debuger
}
