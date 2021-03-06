<?php

namespace App\Http\Controllers\API;

use DateTime;
use App\Models\Afectat;
use App\Clases\Utilidad;
use App\Models\Alertant;
use App\Models\Incidencia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\IncidenciaHasRecurso;
use Illuminate\Support\Facades\Date;
use App\Models\IncidenciesHasAfectats;
use function GuzzleHttp\Psr7\try_fopen;
use Illuminate\Database\QueryException;
use App\Http\Resources\IncidenciaResource;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODAS LAS INCIDENCIAS
        // $incidencia = Incidencia::all();
        // return IncidenciaResource::collection($incidencia);

        $incidencias = Incidencia::with(['incidencia_has_recursos'])->get();
        return IncidenciaResource::collection($incidencias);

        //$incidencia = Incidencia::with()
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // {
        //     "id":2,
        //     "num_incident":2,
        //     "data":"2000-10-04",
        //     "hora":"10:10:21.0000000",
        //     "telefon_alertant":345435345,
        //     "adreca":"buena",
        //     "adreca_complement":"buena",
        //     "descripcio":"buena",
        //     "nom_metge":"buena",
        //     "tipus_incidencies_id":1,
        //     "alertants_id":1,
        //     "municipis_id":1,
        //     "usuaris_id":1
        // }



        // {
        //     "id": 13,
        //     "num_incident": 13,
        //     "data": "2000-10-10",
        //     "hora": "10:20:00",
        //     "telefon_alertant": 14234,
        //     "adreca": "kjh",
        //     "adreca_complement": "kjkj",
        //     "descripcio": "kj",
        //     "nom_metge": "kj",
        //     "tipus_incidencies_id": 1,
        //     "alertants_id": 1,
        //     "municipis_id": 1,
        //     "usuaris_id": 1,
        //     "incidencia_has_recursos": [
        //         {
        //             "recursos_id": 1,
        //             "prioritat": 3
        //         }
        //     ]
        // }
        // {
        //     "id": 18,
        //     "num_incident": 18,
        //     "data": "2000-10-10",
        //     "hora": "10:20:00",
        //     "telefon_alertant": 14234,
        //     "adreca": "kjh",
        //     "adreca_complement": "kjkj",
        //     "descripcio": "kj",
        //     "nom_metge": "kj",
        //     "tipus_incidencies_id": 1,
        //     "alertants_id": 1,
        //     "municipis_id": 1,
        //     "usuaris_id": 1,
        //     "incidencia_has_recursos": [
        //         {
        //             "recursos_id": 2,
        //             "prioritat": 3
        //         },
        //         {
        //             "recursos_id": 1,
        //             "prioritat": 3
        //         }

        //     ]
        // }

        //insertar alertante get y insert (eloquent)
        //insertar afectado insert con su relacion (eloquent)



        try {

            DB::beginTransaction();


            //$af = Alertant::with('alertants')->find($request->input('telefon_alertant'));


            if (!$request->input('alertantExist')){

                $alertant = new Alertant();
                $alertant->id =                     $request->input('idAlertant');
                $alertant->telefon=                 $request->input('telefon_alertant');
                $alertant->nom=                     $request->input('nomAlertant');
                $alertant->cognoms=                 $request->input('cognomsAlertant');
                $alertant->adreca=                  $request->input('adrecaAlertant');
                $alertant->municipis_id=            $request->input('municipis_idAlertant');
                $alertant->tipus_alertants_id=      $request->input('tipus_alertants_idAlertant');
                $alertant->save();

            }


            $incidencia = new Incidencia();

            //comprobar que no se repita ++ extra
            $incidencia->num_incident=          random_int(0, 2000);
            $incidencia->data=                  $request->input('data');
            $incidencia->hora=                  $request->input('data');
            $incidencia->telefon_alertant=      $request->input('telefon_alertant');
            $incidencia->adreca=                $request->input('adreca');
            $incidencia->adreca_complement=     $request->input('adreca_complement');
            $incidencia->descripcio=            $request->input('descripcio');
            $incidencia->nom_metge=             $request->input('nom_metge');
            $incidencia->tipus_incidencies_id=  $request->input('tipus_incidencies_id');
            if (!$request->input('alertantExist')){
                $incidencia->alertants_id=$alertant->id;
            }else{
                $incidencia->alertants_id=$request->input('idAlertant');
            }
            $incidencia->municipis_id=          $request->input('municipis_id');
            $incidencia->usuaris_id=            $request->input('usuaris_id');

            $incidencia->save();



            //   XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
            $listaRecursos = $request->input('incidencia_has_recursos');


            //insert idRecurso, idIncidencia y prioritat en incidencia_has_recurso
            foreach ($listaRecursos as $recurso ) {

                $incidenciaHasRecurso = new IncidenciaHasRecurso();
                $incidenciaHasRecurso->recursos_id= $recurso['recursos_id'];
                $incidenciaHasRecurso->incidencies_id = $incidencia->id;
                $incidenciaHasRecurso->prioritat= $recurso['prioritat'];
                $incidenciaHasRecurso->hora_activacio = new DateTime();
                $incidencia->incidencia_has_recursos()->save($incidenciaHasRecurso);

            }



            //   XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

            $listaAfectados = $request->input('incidencia_has_afectats');

            //cojer el ultimo id de incidencias para hacer el insertrt en la relacion
            $incidencias = Incidencia::All();
            $idReal = $incidencias[sizeof($incidencias)-1]->id;

            foreach ($listaAfectados as $af ) {

                if($af['afectantExist']){

                    $incidencieHasAfectat = new IncidenciesHasAfectats();

                    $afectadooo = Afectat::where('cip',$af['cipAfectat'])->first();

                    $incidencieHasAfectat->afectats_id= $afectadooo->id;
                    $incidencieHasAfectat->incidencies_id= $idReal;

                    $incidencieHasAfectat->save();

                }else{

                    $afectat = new Afectat();
                    if($af['telefonAfectat'] == "---") {
                        $afectat->telefon= 0;
                    } else{
                        $afectat->telefon=  $af['telefonAfectat'];
                    }

                    $afectat->cip=      $af['cipAfectat'];
                    $afectat->nom=      $af['nomAfectat'];
                    $afectat->cognoms=  $af['cognomsAfectat'];
                    $afectat->edat=     $af['edatAfectat'];
                    $afectat->sexes_id= $af['sexes_idAfectat'];

                    if($af['cipAfectat'] == null){
                        $afectat->te_cip= false;
                    }else{
                        $afectat->te_cip= true;
                    }
                    $afectat->save();

                    $incidencieHasAfectat = new IncidenciesHasAfectats();
                    $incidencieHasAfectat->afectats_id= $afectat->id;
                    $incidencieHasAfectat->incidencies_id= $idReal;

                    $incidencieHasAfectat->save();

                }
            }
            // $listaAfectados = $request->input('afectats');
            // foreach ($listaAfectados as $afectat ) {
            //}


            DB::commit();
            $response = (new IncidenciaResource($incidencia))->response()->setStatusCode(201);

            header("Refresh:0");

        } catch (QueryException $ex) {

			DB::rollBack();

            $mensaje = Utilidad::errorMessage($ex);
            $response = \response()->json(['error' => $mensaje], 400);
           // $request->session()->flash('error', $mensaje);
        }




        return $response;

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencia $incidencia)
    {
        //$incidencia = Incidencia::with([incidencia_has_recursos])

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
