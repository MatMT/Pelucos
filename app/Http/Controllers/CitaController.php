<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\User;
use App\Models\Quote_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // API
    public function store(Request $request)
    {
        $cita = new Quote();
        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->user_id = $request->usuarioId;
        $cita->save();
        $id = $cita->id;

        // Obtener los servicios de la solicitud POST
        $idServicios = explode(",", request()->servicios);

        // Recorrer los servicios y guardar cada uno
        foreach ($idServicios as $idServicio) {
            $citaServicio = new Quote_service();
            $citaServicio->quote_id = $id;
            $citaServicio->service_id = $idServicio;
            $citaServicio->save();
        }

        return response()->json(['resultado' => 'exito']);
    }

    public function destroy(Request $request)
    {
        $cita = Quote::destroy($request->id);
        return $cita;
    }
}
