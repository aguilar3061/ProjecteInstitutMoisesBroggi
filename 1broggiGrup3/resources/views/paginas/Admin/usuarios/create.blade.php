
@extends('index')

@section('cuerpo')

@include('partials.mensajes')

  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Usuario</div>
    <div class="card-body">
        <form action="{{ action([App\Http\Controllers\UsuariController::class, 'store']) }}" method="POST">
            @csrf
            <fieldset>

              <div class="form-group row">
                <label for="nombreUsuario" class="col-4 col-form-label">Nombre Usuario</label>
                <div class="col-8">
                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre usuario"
                value="{{ old('nombreUsuario') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="contrasena" class="col-4 col-form-label">Contraseña</label>
                <div class="col-8">
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="contraseña"
                value="{{ old('contrasena') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="correo" class="col-4 col-form-label">Correo</label>
                <div class="col-8">
                <input type="email" class="form-control" id="correo"  name="correo" placeholder="Correo"
                value="{{ old('correo') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="nombre" class="col-4 col-form-label">Nombre</label>
                <div class="col-8">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                value="{{ old('nombre') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="apellidos" class="col-4 col-form-label">Apellidos</label>
                <div class="col-8">
                <input type="text" class="form-control" id="apellidos" name="apellidos"  placeholder="Apellidos"
                value="{{ old('apellidos') }}">
                </div>
              </div>


              <div class="form-group row">
                <label for="rol" class="col-4 col-form-label">Rol</label>
                <div class="col-8">
                <select class="form-control" id="rol" name="rol">
                    @foreach ($rols as $rol)
                        @if ( old('rol') == $rol->id)
                            <option for="rol" selected value="{{ $rol->id }}">{{ $rol->nom }}</option>
                        @else
                            <option for="rol" value="{{ $rol->id }}">{{ $rol->nom }}</option>
                        @endif
                    @endforeach
                </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="recurs" class="col-4 col-form-label">Recurso</label>
                <div class="col-8">
                <select class="form-control" id="recurs" name="recurs">
                    @foreach ($recursos as $recurso)
                    @if ( old('recurs') == $recurso->id)
                            <option for="recurs" selected value="{{ $recurso->id }}">{{ $recurso->codi }}</option>
                        @else
                            <option for="recurs" value="{{ $recurso->id }}">{{ $recurso->codi }}</option>
                        @endif
                    @endforeach
                </select>
                </div>
              </div>

              <div class="text-right">

                <a href={{ url('usuari') }} class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Aceptar</button>
              </div>
            </fieldset>
          </form>
    </div>
  </div>
@endsection
