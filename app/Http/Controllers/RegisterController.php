<?php

namespace App\Http\Controllers;

use Model\Usuario;
use App\Models\User;
use App\Mail\Confirmar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.crear-cuenta');
    }

    public function store(Request $request)
    {
        // Validación - Se interrumpe el flujo, en caso de no cumplirse se retorna.
        $request->validate([
            'nombre' => 'required|min:2|max:20 ',
            'apellido' => 'required|min:4|max:25 ',
            'telefono' => 'required|min:8|max:8',
            'email' => 'required|email|unique:users,email|max:50',
            'password' => 'required|min:6',
        ]);

        $request->token = uniqid();

        // Creación de usuario
        User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'confirmado' => false,
            'admin' => false,
            'token' => $request->token
        ]);

        $auth = $request;

        // Autentificación
        // auth()->attempt($request->only('email', 'password'));

        // Enviar correo de registro
        Mail::to($request->email)->send(new Confirmar($auth->nombre, $auth->token));

        return redirect(route('confirmar'));
    }
}
