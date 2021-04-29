<?php

namespace App\Http\Controllers;

use App\Models\Recurs;
use App\Models\Alertant;
use App\Models\Municipi;
use App\Models\Tipus_recurs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class informacionRecurso extends Controller
{
    public function index()
    {
        $recurso = Recurs::all();
        $municipios = Municipi::all();
        $alertantes = Alertant::all();
        $tipo_recurso = Tipus_recurs::all();
        $userLogued = Auth::user();

        return view('paginas.Recurso.infoRecursEincidencia', compact('recurso', 'municipios', 'alertantes', 'tipo_recurso', 'userLogued' ));
    }
}
