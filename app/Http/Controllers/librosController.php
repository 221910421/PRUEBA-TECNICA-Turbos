<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\autores;
use App\Models\editoriales;
use App\Models\generos;
use App\Models\libros;

class librosController extends Controller
{
    public function libros(){
        $libros = libros::all();
        $autores = autores::all();
        return view('libros.libros', compact('libros', 'autores'));
    }

    public function nuevoLibro(){
        $autores = autores::all();
        $editoriales = editoriales::all();
        $generos = generos::all();
        return view('libros.nuevoLibro', compact('autores', 'editoriales', 'generos'));
    }

    public function guardarLibro(Request $request){
        $request->validate([
            'nombre' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'genero' => 'required',
            'stock' => 'required',
            'foto' => 'required|image',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'autor.required' => 'El campo autor es obligatorio',
            'editorial.required' => 'El campo editorial es obligatorio',
            'genero.required' => 'El campo género es obligatorio',
            'stock.required' => 'El campo stock es obligatorio',
            'foto.required' => 'El campo foto es obligatorio',
            'foto.image' => 'El campo foto debe ser una imagen',
        ]);

        try{
            $foto = $request->file('foto');
            $nombreFoto = time().'-'.$request->nombre.'.'.$foto->extension();
            $foto->move(public_path().'/img/libros/', $nombreFoto);
            $libro = new libros;
            $libro->nombre = $request->nombre;
            $libro->autor_id = $request->autor;
            $libro->editorial_id = $request->editorial;
            $libro->genero_id = $request->genero;
            $libro->stock = $request->stock;
            $libro->foto = $nombreFoto;
            $libro->save();
            return redirect()->route('libros')->with('success', 'Libro creado correctamente');
        }catch(\Exception $e){
            return redirect()->route('libros')->with('error', 'Error al crear el libro');
        }

    }

    public function verLibro($id){
        $libro = libros::find($id);
        $autores = autores::all();
        $editoriales = editoriales::all();
        $generos = generos::all();
        return view('libros.detallesLibro', compact('libro', 'autores', 'editoriales', 'generos'));
    }

    public function editarLibro($id){
        $libro = libros::find($id);
        $autores = autores::all();
        $editoriales = editoriales::all();
        $generos = generos::all();
        return view('libros.editarLibro', compact('libro', 'autores', 'editoriales', 'generos'));
    }

    public function actualizarLibro(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'genero' => 'required',
            'stock' => 'required',
            'foto' => 'image',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'autor.required' => 'El campo autor es obligatorio',
            'editorial.required' => 'El campo editorial es obligatorio',
            'genero.required' => 'El campo género es obligatorio',
            'stock.required' => 'El campo stock es obligatorio',
            'foto.image' => 'El campo foto debe ser una imagen',
        ]);

        try{
            $libro = libros::find($id);
            $libro->nombre = $request->nombre;
            $libro->autor_id = $request->autor;
            $libro->editorial_id = $request->editorial;
            $libro->genero_id = $request->genero;
            $libro->stock = $request->stock;
            if($request->hasFile('foto')){
                $foto = $request->file('foto');
                $nombreFoto = time().'-'.$request->nombre.'.'.$foto->extension();
                $foto->move(public_path().'/img/libros/', $nombreFoto);
                $libro->foto = $nombreFoto;
            }
            $libro->save();
            return redirect()->route('libros')->with('success', 'Libro actualizado correctamente');
        }catch(\Exception $e){
            return redirect()->route('libros')->with('error', 'Error al actualizar el libro');
        }
    }

    public function eliminarLibro($id){
        try{
            $libro = libros::find($id);
            $libro->delete();
            return redirect()->route('libros')->with('success', 'Libro eliminado correctamente');
        }catch(\Exception $e){
            return redirect()->route('libros')->with('error', 'Error al eliminar el libro');
        }
    }

    public function buscarLibro(Request $request){
        $libros = libros::where('nombre', 'like', '%'.$request->buscar.'%')
        ->orWhereHas('autores', function($query) use($request){
            $query->where('nombre', 'like', '%'.$request->buscar.'%');
        })
        ->orWhereHas('editoriales', function($query) use($request){
            $query->where('nombre', 'like', '%'.$request->buscar.'%');
        })
        ->orWhereHas('generos', function($query) use($request){
            $query->where('nombre', 'like', '%'.$request->buscar.'%');
        })
        ->get();
        $autores = autores::all();
        return view('libros.libros', compact('libros', 'autores'));
    }

}
