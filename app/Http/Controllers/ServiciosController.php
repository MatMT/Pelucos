<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    // API
    public function index()
    {
        $servicios = Service::all();
        return  response()->json($servicios);
    }
}
