<?php

namespace App\Http\Controllers\API;

use App\Clases\Utilidad;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $incidencia = Incidencia::all();
        return IncidenciaResource::collection($incidencia);
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
        //     "id":1,
        //     "num_incident":1,
        //     "data":"10/11/2000",
        //     "hora":"10:10:21.0000000",
        //     "telefon_alertant":345435345,
        //     "adreca":"dfgdgdfgdf",
        //     "adreca_complement":"dfgdgdfgdf",
        //     "descripcio":"elpepe",
        //     "nom_metge":"pepe",
        //     "tipus_incidencies_id":1,
        //     "alertants_id":1,
        //     "municipis_id":1,
        //     "usuaris_id":1
        // }







        $incidencia = new Incidencia();

        $incidencia->id = $request->input('id');
        $incidencia->num_incident= $request->input('num_incident');
        $incidencia->data= $request->input('data');
        $incidencia->hora= $request->input('hora');
        $incidencia->telefon_alertant= $request->input('telefon_alertant');
        $incidencia->adreca= $request->input('adreca');
        $incidencia->adreca_complement= $request->input('adreca_complement');
        $incidencia->descripcio= $request->input('descripcio');
        $incidencia->nom_metge= $request->input('nom_metge');
        $incidencia->tipus_incidencies_id= $request->input('tipus_incidencies_id');
        $incidencia->alertants_id= $request->input('alertants_id');
        $incidencia->municipis_id= $request->input('municipis_id');
        $incidencia->usuaris_id= $request->input('usuaris_id');


        try {
            
            $incidencia->save();
            $response = (new IncidenciaResource($incidencia))
                        ->response()
                        ->setStatusCode(201);

        } catch (QueryException $ex) {

            $mensaje = Utilidad::errorMessage($ex);
            $response = \response()
                        ->json(['error' => $mensaje], 400);
        }

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
