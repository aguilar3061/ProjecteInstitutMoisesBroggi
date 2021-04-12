<?php

namespace App\Http\Controllers;

use App\Models\Recurs;
use App\Clases\Utilidad;
use App\Models\Tipus_recurs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class RecursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recursos = Recurs::paginate(10)->withQueryString();
        return view('paginas.Admin.recursos.index', compact('recursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoRecursos = Tipus_recurs::all();
        return view('paginas.Admin.recursos.create', compact('tipoRecursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recurs = new Recurs();

        $recurs->codi = $request->input('codiID');
        $recurs->actiu = 1;
        $recurs->tipus_recursos_id = $request->input('tipusRecurs');

        try
        {
            $recurs->save();
            $request->session()->flash('mensaje', 'Registro creado correctamente');
            $response = redirect()->action([RecursController::class, 'index']);
        }
        catch (QueryException $ex)
        {
            $mensaje = Utilidad::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([RecursController::class, 'create'])->withInput();
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recurs  $recurs
     * @return \Illuminate\Http\Response
     */
    public function show(Recurs $recurs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recurs  $recurs
     * @return \Illuminate\Http\Response
     */
    public function edit(Recurs $recur)
    {
        $tipoRecursos = Tipus_recurs::all();
        return view('paginas.Admin.recursos.create', compact('tipoRecursos', 'recur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recurs  $recurs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recurs $recur)
    {

        $recur = new Recurs();

        $recur->codi = $request->input('codiID');
        $recur->actiu = 1;
        $recur->tipus_recursos_id = $request->input('tipusRecurs');

        try
        {
            $recur->save();
            $request->session()->flash('mensaje', 'Registro actualizado correctamente');
            $response = redirect()->action([RecursController::class, 'index']);
        }
        catch (QueryException $ex)
        {
            $mensaje = Utilidad::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([RecursController::class, 'edit'])->withInput();
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recurs  $recurs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Recurs $recur)
    {
        try
        {
            $recur->delete();
            $request->session()->flash('mensaje', 'Registro borrado correctamente');
        }
        catch (QueryException $ex)
        {
            $mensaje = Utilidad::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
        }
        return redirect()->action([RecursController::class, 'index']);
    }
}
