<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request, Redirector $redirect)
    {
        // Validación
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->remember; // Recordar la sesión y no cerrar con el navegador 
        // $remember es la variable encargado de generar una cookie encriptada del id del usuario atenticado, mientras la cookie exista la sesión permanece abierta

        // Attempt intenta coincidir las credenciales.
        if (Auth::attempt($credentials, $remember)) {
            // Regenerar la sesión del usuario para evitar "Session Fixation", regenerando el token csrf
            $request->session()->regenerate();
            // En caso de no estar autenticado y se intenta acceder a una url protegida que no sea home luego de un login exitoso se le reenvia a la url anterior a iniciar sesión

            if (auth()->user()->rol == 'admin') {
                return $redirect
                    ->intended(route('admin.index'));
            } else {
                return $redirect
                    ->intended('cita')
                    ->with('status', "You're logged in");
            }
        }
        // En caso de no funcionar la sesión manda un error
        throw ValidationException::withMessages([
            'email' => __('auth.failed')
        ]);
    }

    public function logout(Request $request, Redirector $redirect)
    {
        Auth::logout();

        // Invalida la sesión y genera una nueva con el csrf
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirección
        return $redirect->to(route('login'))->with('status', "You're logged out");
    }
}
