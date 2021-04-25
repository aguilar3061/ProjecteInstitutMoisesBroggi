<?php

namespace App\Http\Controllers;

use App\Clases\Utilidad;
use App\Models\Alertant;
use App\Models\Municipi;
use Illuminate\Http\Request;
use App\Models\Tipus_alertant;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class AlertantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $alertants = Alertant::paginate(10)->withQueryString();

        $request->session()->flashInput($request->input());

        return view('paginas.Admin.alertantes.index', compact('alertants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipis = Municipi::all();
        $tipusAlertants = Tipus_alertant::all();

        return view('paginas.Admin.alertantes.create', compact('municipis','tipusAlertants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alertante = new Alertant();

        $alertante->telefon = $request->input('telefono');
        $alertante->nom = $request->input('nom');
        $alertante->cognoms = $request->input('apellidos');
        $alertante->adreca = $request->input('direccion');
        $alertante->municipis_id = $request->input('municipi');
        $alertante->tipus_alertants_id = $request->input('tipusAlertant');

        try
        {
            $alertante->save();
            $request->session()->flash('mensaje', 'Registro creado correctamente');
            $response = redirect()->action([AlertantController::class, 'index']);
        }
        catch (QueryException $ex)
        {
            $mensaje = Utilidad::errorMessage($ex);
            $request->session()->flash('error', $mensaje);

            $response = redirect()->action([AlertantController::class, 'create'])->withInput();
        }


        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function show(Alertant $alertant)
    {
        // $alert = Alertant::with('afectats')->find($alertant->telefon);
        // return view()
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function edit(Alertant $alertant)
    {

        $municipis = Municipi::all();
        $tipusAlertants = Tipus_alertant::all();

        return view('paginas.Admin.alertantes.edit', compact('municipis','tipusAlertants','alertant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alertant $alertant)
    {

        $alertant->telefon = $request->input('telefono');
        $alertant->nom = $request->input('nom');
        $alertant->cognoms = $request->input('apellidos');
        $alertant->adreca = $request->input('direccion');
        $alertant->municipis_id = $request->input('municipi');
        $alertant->tipus_alertants_id = $request->input('tipusAlertant');

        try
        {
            $alertant->save();
            $request->session()->flash('mensaje', 'Registro actualizado correctamente');
            $response = redirect()->action([AlertantController::class, 'index']);
        }
        catch (QueryException $ex)
        {
            $mensaje = Utilidad::errorMessage($ex);
            $request->session()->flash('error', $mensaje);

            $response = redirect()->action([AlertantController::class, 'edit'], ['alertant' => $alertant->id ])->withInput();
        }


        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alertant  $alertant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Alertant $alertant)
    {
        try
        {
            $alertant->delete();
            $request->session()->flash('mensaje', 'Registro borrado correctamente');
        }
        catch (QueryException $ex)
        {
            $mensaje = Utilidad::errorMessage($ex);
            $request->session()->flash('error', $mensaje);

        }



        return redirect()->action([AlertantController::class, 'index']);
    }
}
