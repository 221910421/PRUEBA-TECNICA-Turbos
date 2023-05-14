<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\generos;

class generosController extends Controller
{
    public function generos(){
        $generos = generos::all();
        return view('generos.generos', ['generos' => $generos]);
    }

    public function nuevoGenero(Request $request){
        $request->validate([
            'nombre' => 'required|max:50',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.max' => 'El campo nombre no puede tener más de 50 caracteres',
        ]);

        try{
            $genero = new generos();
            $genero->nombre = $request->nombre;
            $genero->save();
            return redirect()->route('generos')->with('success', 'Genero creado correctamente');
        }catch(\Exception $ex){
            return redirect()->route('generos')->with('error', 'No se pudo crear el genero');
        }
    }

    public function editarGenero($id){
        $genero = generos::find($id);
        return view('generos.editarGenero', ['genero' => $genero]);
    }

    public function actualizarGenero(Request $request, $id){
        $request->validate([
            'nombre' => 'required|max:50',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.max' => 'El campo nombre no puede tener más de 50 caracteres',
        ]);
        try{
            $genero = generos::find($id);
            $genero->nombre = $request->nombre;
            $genero->save();
            return redirect()->route('generos')->with('success', 'Genero actualizado correctamente');
        }catch(\Exception $ex){
            return redirect()->route('generos')->with('error', 'No se pudo actualizar el genero');
        }
    }

    public function eliminarGenero($id){
        try{
            $genero = generos::find($id);
            $genero->delete();
            return redirect()->route('generos')->with('success', 'Genero eliminado correctamente');
        }catch(\Exception $ex){
            return redirect()->route('generos')->with('error', 'No se pudo eliminar el genero');
        }
    }

    public function buscarGenero(Request $request){
        $generos = generos::where('nombre', 'like', '%'.$request->nombre.'%')->get();
        return view('generos.generos', ['generos' => $generos]);
    }

}
