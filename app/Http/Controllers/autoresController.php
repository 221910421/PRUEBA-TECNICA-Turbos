<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\autores;

class autoresController extends Controller
{
    public function autores(){
        $autores = autores::all();
        return view('autores.autores', ['autores' => $autores]);
    }

    public function nuevoAutor(Request $request){
        $request->validate([
            'nombre' => 'required|max:50',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.max' => 'El campo nombre no puede tener más de 50 caracteres',
        ]);

        try{
            $autor = new autores();
            $autor->nombre = $request->nombre;
            $autor->save();
            return redirect()->route('autores')->with('success', 'Autor creado correctamente');
        }catch(\Exception $ex){
            return redirect()->route('autores')->with('error', 'No se pudo crear el autor');
        }
    }

    public function editarAutor($id){
        $autor = autores::find($id);
        return view('autores.editarAutor', ['autor' => $autor]);
    }

    public function actualizarAutor(Request $request, $id){
        $request->validate([
            'nombre' => 'required|max:50',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.max' => 'El campo nombre no puede tener más de 50 caracteres',
        ]);
        try{
            $autor = autores::find($id);
            $autor->nombre = $request->nombre;
            $autor->save();
            return redirect()->route('autores')->with('success', 'Autor actualizado correctamente');
        }catch(\Exception $ex){
            return redirect()->route('autores')->with('error', 'No se pudo actualizar el autor');
        }
    }

    public function eliminarAutor($id){
        try{
            $autor = autores::find($id);
            $autor->delete();
            return redirect()->route('autores')->with('success', 'Autor eliminado correctamente');
        }catch(\Exception $ex){
            return redirect()->route('autores')->with('error', 'No se pudo eliminar el autor');
        }
    }

    public function buscarAutor(Request $request){
        $nombre = $request->nombre;
        $autores = autores::where('nombre', 'like', '%'.$nombre.'%')->get();
        return view('autores.autores', ['autores' => $autores]);
    }
}
