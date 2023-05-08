<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public static function index(Request $request)
    {
        if (!session()->has('admin')) {
            return redirect('/');
        }

        $fecha = request()->input('fecha', date('Y-m-d'));
        $fechas = explode('-', $fecha);

        if (!checkdate($fechas[1], $fechas[2], $fechas[0])) {
            return redirect('/404');
        }

        // Consultar la base de datos
        $citas = Quote::where('fecha', $fecha)->get();

        return view('admin.index', [
            'nombre' => auth()->user()->nombre,
            'citas' => $citas,
            'fecha' => $fecha,
            // Variables de la vista
            'idCita' => $idCita = '',
            'total' => $total = 0,
            'actual' => $actual = '',
            'proximo' => $proximo = ''
        ]);
    }
}
