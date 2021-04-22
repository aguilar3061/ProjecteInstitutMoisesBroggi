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
    public function update(Request $request, IncidenciaHasRecurso $incidenciaHasRecurso)
    {
     //$incidenciaRecurs = IncidenciaHasRecurso::where('incidencies_id', '=', $request->input('incidencies_id'))->where('recursos_id', '=', $request->input('recursos_id'))->get();



     $incidenciaHasRecurso->hora_mobilitzacio = $request->input('hora_mobilitzacio');

     $incidenciaHasRecurso->incidencies_id = $request->input('incidencies_id');
     $incidenciaHasRecurso->recursos_id = $request->input('recursos_id');

     $incidenciaHasRecurso->hora_assistencia = $request->input('hora_assistencia');
     $incidenciaHasRecurso->hora_transport = $request->input('hora_transport');
     $incidenciaHasRecurso->hora_arribada_hospital = $request->input('hora_arribada_hospital');
     $incidenciaHasRecurso->hora_transferencia = $request->input('hora_transferencia');
     $incidenciaHasRecurso->hora_finalitzacio = $request->input('hora_finalitzacio');
     $incidenciaHasRecurso->desti = $request->input('desti');

    //  $incidencia = new Incidencia();
    //  $incidencia = $request->input('incidencia');
    //  $incidenciaHasRecurso->incidencia = $incidencia;



     try {

         DB::beginTransaction();



         $incidenciaHasRecurso->save();


         $response = (new IncidenciaHasRecursoResource($incidenciaHasRecurso))->response()->setStatusCode(201);

     } catch (QueryException $ex) {

         DB::rollBack();
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
