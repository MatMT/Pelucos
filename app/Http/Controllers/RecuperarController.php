<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecuperarController extends Controller
{
    public function index()
    {
        return view('auth.olvide-password');
    }
}
