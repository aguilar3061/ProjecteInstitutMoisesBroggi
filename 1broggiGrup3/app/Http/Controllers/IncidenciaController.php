<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\Tipus_recurs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Municipi;
use App\Models\Provincia;
use App\Models\Recurs;
use App\Models\Tipus_alertant;
use App\Models\Tipus_Incidencia;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiporecursos = Tipus_recurs::all();
        $recursos = Recurs::all();
        $provincias = Provincia::all();
        $municipios = Municipi::all();
        $tipusalertants = Tipus_alertant::all();
        $tipusincidencies = Tipus_Incidencia::all();
        return view('paginas.incidencias.indexVue', compact('recursos','tiporecursos','provincias','municipios','tipusalertants','tipusincidencies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencia $incidencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $incidencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencia $incidencia)
    {
        //
    }
}
