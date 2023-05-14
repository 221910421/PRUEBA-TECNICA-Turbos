<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\autores;

class autoresController extends Controller
{
    function autores(){
        $autores = autores::all();
        return view('autores', ['autores' => $autores]);
    }

    function nuevoAutor(Request $request){
        $autor = new autores;
        $autor->nombre = $request->nombre;
        $autor->save();
        return redirect()->route('autores');
    }

    function editarAutor($id){
        $autor = autores::find($id);
        return view('editarAutor', ['autor' => $autor]);
    }

    function actualizarAutor(Request $request, $id){
        try{
            $autor = autores::find($id);
            $autor->nombre = $request->nombre;
            $autor->save();
            return redirect()->route('autores')->with('success', 'Autor actualizado correctamente');
        }catch(\Exception $ex){
            return redirect()->route('autores')->with('error', 'No se pudo actualizar el autor');
        }
    }
}
