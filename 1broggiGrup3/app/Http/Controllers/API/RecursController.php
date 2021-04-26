<?php

namespace App\Http\Controllers\API;

use App\Models\IncidenciaHasRecurso;
use App\Http\Controllers\Controller;
use App\Http\Resources\IncidenciaHasRecursoResource;
use Illuminate\Http\Request;
use App\Clases\Utilidad;
use App\Models\Incidencia;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Resources\IncidenciaResource;
use App\Models\Afectat;
use App\Models\Alertant;


class RecursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidencias_has_recursos = IncidenciaHasRecurso::with(['incidencia'])->get();
        return IncidenciaHasRecursoResource::collection($incidencias_has_recursos);
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
     * @param  \App\Models\IncidenciaHasRecurso  $incidenciaHasRecurso
     * @return \Illuminate\Http\Response
     */
    public function show(IncidenciaHasRecurso $incidenciaHasRecurso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncidenciaHasRecurso  $incidenciaHasRecurso
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, IncidenciaHasRecurso $incidenciaHasRecurso)
    public function update(Request $request, $incidencia_id, $recurs_id)
    {
     $incidenciaRecurs = IncidenciaHasRecurso::where('incidencies_id', $incidencia_id)->where('recursos_id', $recurs_id)->first();

     $incidenciaRecurs->hora_mobilitzacio = $request->input('hora_mobilitzacio');
     $incidenciaRecurs->hora_assistencia = $request->input('hora_assistencia');
     $incidenciaRecurs->hora_transport = $request->input('hora_transport');
     $incidenciaRecurs->hora_arribada_hospital = $request->input('hora_arribada_hospital');
     $incidenciaRecurs->hora_transferencia = $request->input('hora_transferencia');
     $incidenciaRecurs->hora_finalitzacio = $request->input('hora_finalitzacio');
     $incidenciaRecurs->desti = $request->input('desti');




    //  $hm = new DateTime($request->input('hora_mobilitzacio'));
    //  $hm->format('H:i:s');
    //  $incidenciaRecurs->hora_mobilitzacio = $hm;

    //  $ha = new DateTime($request->input('hora_assistencia'));
    //  $ha->format('H:i:s');
    //  $incidenciaRecurs->hora_assistencia = $ha;

    //  $htr = new DateTime($request->input('hora_transport'));
    //  $htr->format('H:i:s');
    //  $incidenciaRecurs->hora_transport = $htr;

    //  $hah = new DateTime($request->input('hora_arribada_hospital'));
    //  $hah->format('H:i:s');
    //  $incidenciaRecurs->hora_arribada_hospital = $hah;

    //  $ht = new DateTime($request->input('hora_transferencia'));
    //  $ht->format('H:i:s');
    //  $incidenciaRecurs->hora_transferencia = $ht;

    //  $hf = new DateTime($request->input('hora_finalitzacio'));
    //  $hf->format('H:i:s');
    //  $incidenciaRecurs->hora_finalitzacio = $hf;

     try
     {


         $incidenciaRecurs->save();


         $response = (new IncidenciaHasRecursoResource($incidenciaRecurs))->response()->setStatusCode(201);

     } catch (QueryException $ex) {


         $mensaje = Utilidad::errorMessage($ex);
         $response = \response()->json(['error' => $mensaje], 400);

     }

     return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncidenciaHasRecurso  $incidenciaHasRecurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncidenciaHasRecurso $incidenciaHasRecurso)
    {
        //
    }
}
