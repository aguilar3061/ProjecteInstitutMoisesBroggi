<?php

namespace App\Http\Controllers\API;

use App\Models\Afectat;
use App\Clases\Utilidad;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\IncidenciesHasAfectats;
use Illuminate\Database\QueryException;
use App\Http\Resources\AfectatsResource;

class AfectatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
            // "afectats": [
            //     {
            //     "id": 3,
            //     "telefon": 254656,
            //     "cip": "3",
            //     "nom": "3",
            //     "cognoms": "3",
            //     "edat": 3,
            //     "te_cip": 3,
            //     "sexes_id": 3
            //     }
            // ]

        // DB::beginTransaction();
        // try {

        //     $listaAfectados = $request->input('incidencia_has_afectats');

        //     //cojer el ultimo id de incidencias para hacer el insertrt en la relacion
        //     $incidencias = Incidencia::All();
        //     $idReal = $incidencias[sizeof($incidencias)-1]->id;

        //     foreach ($listaAfectados as $af ) {

        //         $afectat = new Afectat();

        //         $afectat->telefon=  $af['telefonAfectat'];
        //         $afectat->cip=      $af['cipAfectat'];
        //         $afectat->nom=      $af['nomAfectat'];
        //         $afectat->cognoms=  $af['cognomsAfectat'];
        //         $afectat->edat=     $af['edatAfectat'];
        //         $afectat->sexes_id= $af['sexes_idAfectat'];

        //         if($af['cipAfectat'] == null){
        //             $afectat->te_cip= false;
        //         }else{
        //             $afectat->te_cip= true;
        //         }
        //         $afectat->save();

        //         $incidencieHasAfectat = new IncidenciesHasAfectats();
        //         $incidencieHasAfectat->afectats_id= $afectat->id;
        //         $incidencieHasAfectat->incidencies_id= $idReal;

        //         $incidencieHasAfectat->save();

        //     }

        //     DB::commit();
        //     $afectat->refresh();

        //     $response = (new AfectatsResource($afectat))->response()->setStatusCode(201);

        // } catch (QueryException $ex) {

		// 	DB::rollBack();
        //     $mensaje = Utilidad::errorMessage($ex);
        //     $response = \response()->json(['error' => $mensaje], 400);
        // }




        // return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Afectat  $afectat
     * @return \Illuminate\Http\Response
     */
    public function show(Afectat $afectat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Afectat  $afectat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Afectat $afectat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Afectat  $afectat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Afectat $afectat)
    {
        //
    }
}
