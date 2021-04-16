<?php

namespace App\Http\Controllers\API;

use App\Models\Afectat;
use App\Clases\Utilidad;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\IncidenciaHasRecurso;
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

        DB::beginTransaction();
        try {

            $afectat = new Afectat();

            $afectat->id= $request->input(['idAfectat']);
            $afectat->telefon= $request->input(['telefonAfectat']);
            $afectat->cip= $request->input(['cipAfectat']);
            $afectat->nom= $request->input(['nomAfectat']);
            $afectat->cognoms= $request->input(['cognomsAfectat']);
            $afectat->edat= $request->input(['edatAfectat']);

            if($request->input(['cipAfectat']) == null){
                $afectat->te_cip= false;
            }else{
                $afectat->te_cip= true;
            }

            $afectat->sexes_id= $request->input(['sexes_idAfectat']);
          
            $afectat->save();


            $incidencias = Incidencia::All();

            $idReal = $incidencias[sizeof($incidencias)-1]->id;
            
         
            $incidencieHasAfectat = new IncidenciesHasAfectats();

            $incidencieHasAfectat->afectats_id= $afectat->id;
            $incidencieHasAfectat->incidencies_id= $idReal;
    
           
            //$afectat->incidencies_has_afectats()->save($incidencieHasAfectat);
    
            $incidencieHasAfectat->save();
            
            DB::commit();
            $afectat->refresh();

            $response = (new AfectatsResource($afectat))->response()->setStatusCode(201);

        } catch (QueryException $ex) {

			DB::rollBack();
            $mensaje = Utilidad::errorMessage($ex);
            $response = \response()->json(['error' => $mensaje], 400);
        }




        return $response;
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
