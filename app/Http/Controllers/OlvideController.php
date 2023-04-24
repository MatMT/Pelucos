<?php

namespace App\Http\Controllers;

use App\Mail\Recuperar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OlvideController extends Controller
{
    public function index()
    {
        return view('auth.olvide-password');
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'email' => 'required|email'
        ]);

        $auth = User::where('email', $request->email)->first();


        if ($auth && $auth->confirmado == "1") {
            // Generar un token nuevo
            $auth->token = uniqid();
            $auth->save(); // Base de datos

            // Alerta de exito
            $tipo = 'exito';
            $alerta = 'Revisa tu correo para restaurar';

            // Enviar correo de registro
            Mail::to($request->email)->send(new Recuperar($auth->nombre, $auth->token));
        } else {
            $tipo = 'error';
            $alerta = 'Email no registrado o no verificado';
        }

        return redirect()->route('olvide.store', [
            'alerta' => $alerta,
            'tipo' => $tipo
        ]);
    }
}
