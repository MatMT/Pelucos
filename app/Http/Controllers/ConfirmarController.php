<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class ConfirmarController extends Controller
{

    public function index()
    {
        return view('auth.mensaje');
    }

    public function store(Request $request)
    {
        $token = $request->get('token');
        $usuario =  User::where('token', $token)->first();

        if (!$usuario || !$usuario->token) {
            // Mostrar mensaje de error
            $tipo = 'error';
            $alerta = 'Token no válido';
        } else {
            // Modificar a usuario confirmado
            $usuario->confirmado = true;
            $usuario->token = '';
            $usuario->save();
            // 
            $tipo = 'exito';
            $alerta = 'Cuenta confirmada exitosamente';
        }

        return view('auth.confirmar-cuenta', [
            'alerta' => $alerta,
            'tipo' => $tipo
        ]);
    }
}
