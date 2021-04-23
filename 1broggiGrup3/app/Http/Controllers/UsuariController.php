<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Recurs;
use App\Models\Usuari;
use App\Clases\Utilidad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class UsuariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuaris = Usuari::paginate(10)->withQueryString();

        $request->session()->flashInput($request->input());

        return view('paginas.Admin.usuarios.index', compact('usuaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rols = Rol::all();
        $recursos = Recurs::all();

        return view('paginas.Admin.usuarios.create', compact('rols','recursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuari = new Usuari();

        $usuari->username = $request->input('nombreUsuario');
        $usuari->contrasenya = Hash::make($request->input('contrasena'));
        $usuari->email = $request->input('correo');
        $usuari->nom = $request->input('nombre');
        $usuari->cognoms = $request->input('apellidos');
        $usuari->rols_id = $request->input('rol');
        $usuari->recursos_id = $request->input('recurs');

        try
        {
            $usuari->save();
            $request->session()->flash('mensaje', 'Registro creado correctamente');
            $response = redirect()->action([UsuariController::class, 'index']);
        }
        catch (QueryException $ex)
        {
            $mensaje = Utilidad::errorMessage($ex);
            $request->session()->flash('error', $mensaje);

            $response = redirect()->action([UsuariController::class, 'create'])->withInput();
        }


        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function show(Usuari $usuari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuari $usuari)
    {
        $rols = Rol::all();
        $recursos = Recurs::all();

        return view('paginas.Admin.usuarios.edit', compact('rols','recursos','usuari'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuari $usuari)
    {

        $usuari->username = $request->input('nombreUsuario');
        $usuari->contrasenya = $request->input('contrasena');
        $usuari->email = $request->input('correo');
        $usuari->nom = $request->input('nombre');
        $usuari->cognoms = $request->input('apellidos');
        $usuari->rols_id = $request->input('rol');
        $usuari->recursos_id = $request->input('recurs');

        try
        {
            $usuari->save();
            $request->session()->flash('mensaje', 'Registro actualizado correctamente');
            $response = redirect()->action([UsuariController::class, 'index']);
        }
        catch (QueryException $ex)
        {
            $mensaje = Utilidad::errorMessage($ex);
            $request->session()->flash('error', $mensaje);

            $response = redirect()->action([UsuariController::class, 'edit'],['usuari' => $usuari->id ])->withInput();
        }


        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuari  $usuari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Usuari $usuari)
    {

        try
        {
            $usuari->delete();
            $request->session()->flash('mensaje', 'Registro borrado correctamente');
        }
        catch (QueryException $ex)
        {
            $mensaje = Utilidad::errorMessage($ex);
            $request->session()->flash('error', $mensaje);

        }



        return redirect()->action([UsuariController::class, 'index']);
    }
}
