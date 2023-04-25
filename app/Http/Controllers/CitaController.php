<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index(User $user)
    {
        // Sesión abierta
        $log = Auth()->user();

        return view('cita.index', [
            'auth' => $log
        ]);
    }
}
