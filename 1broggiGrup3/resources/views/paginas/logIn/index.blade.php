
@extends('index')
@section('cuerpo')

<div class="container" style="padding-left:25%; padding-top:2%;
justify-content: center;
align-items: center;">
<div class="card border-primary mb-3" style="max-width: 30rem; ">
    <div class="card-header">Login</div>
    <div class="card-body">
        <form action="{{ action([App\Http\Controllers\UserLogController::class, 'login']) }}" method="POST">
            @csrf
            <fieldset>
                <div class="form-group" >
                    <label for="userName" class="col-4 col-form-label">Usuario</label>
                    <input class="col-5" id="userName" type="text" name="userName" step="2" style="text-align: center ">

                </div>

                <div class="form-group">
                    <label for="contraseña" class="col-4 col-form-label">Contraseña </label>
                    <input class="col-5" id="passw" type="password" name="contraseña" step="2" style="text-align: center">

                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary" id="guardar">Entrar</button>
                </div>

            </fieldset>
        </form>

    </div>
  </div>
</div>
@endsection




