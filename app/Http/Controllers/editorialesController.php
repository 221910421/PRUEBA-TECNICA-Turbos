<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\editoriales;

class editorialesController extends Controller
{
    public function editoriales()
    {
        $editoriales = editoriales::all();
        return view('editoriales', ['editoriales' => $editoriales]);
    }

    public function nuevaEditorial(Request $request)
    {

        $request->validate([
            'nombre' => 'required|max:50',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.max' => 'El campo nombre no puede tener más de 50 caracteres',
        ]);

        try {
            $editorial = new editoriales();
            $editorial->nombre = $request->nombre;
            $editorial->save();
            return redirect()->route('editoriales')->with('success', 'Editorial creada correctamente');
        } catch (\Exception $ex) {
            return redirect()->route('editoriales')->with('error', 'No se pudo crear la editorial');
        }
    }

    public function editarEditorial($id)
    {
        $editorial = editoriales::find($id);
        return view('editarEditorial', ['editorial' => $editorial]);
    }

    public function actualizarEditorial(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:50',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.max' => 'El campo nombre no puede tener más de 50 caracteres',
        ]);
        try {
            $editorial = editoriales::find($id);
            $editorial->nombre = $request->nombre;
            $editorial->save();
            return redirect()->route('editoriales')->with('success', 'Editorial actualizada correctamente');
        } catch (\Exception $ex) {
            return redirect()->route('editoriales')->with('error', 'No se pudo actualizar la editorial');
        }
    }

    public function eliminarEditorial($id)
    {
        try {
            $editorial = editoriales::find($id);
            $editorial->delete();
            return redirect()->route('editoriales')->with('success', 'Editorial eliminada correctamente');
        } catch (\Exception $ex) {
            return redirect()->route('editoriales')->with('error', 'No se pudo eliminar la editorial');
        }
    }

    public function buscarEditorial(Request $request)
    {
        $term_busqueda = $request->buscar;
        $editoriales = editoriales::where('nombre', 'like', '%' . $term_busqueda . '%')->get();
        return view('editoriales', ['editoriales' => $editoriales]);
    }
}
