<?php

namespace App\Http\Controllers;

use App\Models\userLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Alertant;
use App\Models\Recurs;
use App\Models\Municipi;
use App\Models\Tipus_recurs;



class UserLogController extends Controller
{
    public function login(Request $request)
    {
        $correu = $request->input('userName');
        $contrasenya = $request->input('contraseña');
        $rols_id = '1';

        $user = userLog::where('username', $correu)->first();

        if ($user !=null && Hash::check($contrasenya, $user->contrasenya)) {
            if($rols_id == $user->rols_id){
                Auth::login($user);
                $response =  view('paginas.Admin.paginaPrincipal');
            }elseif($user->rols_id == '3'){


                $recurso = Recurs::all();
                $municipios = Municipi::all();
                $alertantes = Alertant::all();
                $tipo_recurso = Tipus_recurs::all();

                Auth::login($user);
                 $response = view('paginas.Recurso.infoRecursEincidencia', compact('recurso', 'municipios', 'alertantes', 'tipo_recurso' ));
            }else{
                Auth::login($user);
                $response = app(IncidenciaController::class)->index();

            }
        }
        else {
            $request->session()->flash('error', 'Usuari o contrasenya incorrectes');
            $response = redirect('/login')->withInput();

        }

        return $response;
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


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
     * @param  \App\Models\userLog  $userLog
     * @return \Illuminate\Http\Response
     */
    public function show(userLog $userLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userLog  $userLog
     * @return \Illuminate\Http\Response
     */
    public function edit(userLog $userLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userLog  $userLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userLog $userLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userLog  $userLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(userLog $userLog)
    {
        //
    }
}
