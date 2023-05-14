<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;
use Illuminate\Support\Facades\Crypt;

class usuariosController extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos del formulario de login del usuario
        $request->validate([
            'nombre_usuario' => 'required',
            'password' => 'required'
        ], [
            'nombre_usuario.required' => 'El nombre de usuario es obligatorio',
            'password.required' => 'La contraseña es obligatoria'
        ]);

        // Obtener los datos del formulario de login del usuario
        $nombre_usuario = $request->input('nombre_usuario');
        $password = $request->input('password');

        // Buscar el usuario en la base de datos
        $usuario = usuarios::where('nombre_usuario', '=', $nombre_usuario)->first();

        // Verificar si el usuario existe
        if ($usuario) {
            // Verificar si la contraseña es correcta
            if ($password == Crypt::decrypt($usuario->contrasena)) {
                // Iniciar sesión
                $request->session()->put('usuario', $usuario);
                // Redireccionar al dashboard
                return redirect()->route('index');
            } else {
                // Redireccionar al login con un mensaje de error
                return view('login')->with('error', 'La contraseña es incorrecta');
            }
        } else {
            // Redireccionar al login con un mensaje de error
            return view('login')->with('error', 'El usuario no existe');
        }

    }

    public function registro(Request $request){
        $request->validate([
            'nombre_usuario' => 'required|unique:usuarios',
            'correo' => 'required|email|unique:usuarios',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ], [
            'nombre_usuario.required' => 'El nombre de usuario es obligatorio',
            'nombre_usuario.unique' => 'El nombre de usuario ya existe',
            'correo.required' => 'El correo es obligatorio',
            'correo.email' => 'El correo no es válido',
            'correo.unique' => 'El correo ya existe',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password_confirmation.required' => 'La confirmación de la contraseña es obligatoria',
            'password_confirmation.min' => 'La confirmación de la contraseña debe tener mínimo 8 caracteres'
        ]);

        $usuario = new usuarios();
        $usuario->nombre_usuario = $request->input('nombre_usuario');
        $usuario->correo = $request->input('correo');
        $usuario->contrasena = Crypt::encrypt($request->input('password'));
        $usuario->save();

        return redirect()->route('login')->with('error', 'El usuario se registró correctamente');
    }

    public function logout(Request $request){
        $request->session()->forget('usuario');
        return redirect()->route('login');
    }
}
