
@extends('index')

@section('cuerpo')

@include('partials.mensajes')

  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Usuario</div>
    <div class="card-body">
        <form action="{{ action([App\Http\Controllers\UsuariController::class, 'update'], ['usuari' => $usuari->id ]) }}" method="PATCH">
            @csrf
            @method('PATCH')
            <fieldset>

              <div class="form-group row">
                <label for="nombreUsuario" class="col-4 col-form-label">Nombre Usuario</label>
                <div class="col-8">
                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre usuario" @if (old('nombreUsuario') ==null)
                    value="{{ $usuari->username }}"
                @else
                    value="{{ old('nombreUsuario') }}"
                @endif
                >
                </div>
              </div>

              <div class="form-group row">
                <label for="contrasena" class="col-4 col-form-label">Contraseña</label>
                <div class="col-8">
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="contraseña" @if (old('contrasena') ==null)
                    value="{{ $usuari->contrasenya }}"
                @else
                    value="{{ old('contrasena') }}"
                @endif
                >
                </div>
              </div>

              <div class="form-group row">
                <label for="correo" class="col-4 col-form-label">Correo</label>
                <div class="col-8">
                <input type="email" class="form-control" id="correo"  name="correo" placeholder="Correo" @if (old('correo') ==null)
                    value="{{ $usuari->email }}"
                @else
                    value="{{ old('correo') }}"
                @endif
                >
                </div>
              </div>

              <div class="form-group row">
                <label for="nombre" class="col-4 col-form-label">Nombre</label>
                <div class="col-8">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"  @if (old('nombre') ==null)
                    value="{{ $usuari->nom }}"
                @else
                    value="{{ old('nombre') }}"
                @endif
                >
                </div>
              </div>

              <div class="form-group row">
                <label for="apellidos" class="col-4 col-form-label">Apellidos</label>
                <div class="col-8">
                <input type="text" class="form-control" id="apellidos" name="apellidos"  placeholder="Apellidos" @if (old('apellidos') ==null)
                value="{{ $usuari->cognoms }}"
                @else
                    value="{{ old('apellidos') }}"
                @endif
                >
                </div>
              </div>


              <div class="form-group row">
                <label for="rol" class="col-4 col-form-label">Rol</label>
                <div class="col-8">
                <select class="form-control" id="rol" name="rol">
                    @if (old('rol') ==null)
                        @foreach ($rols as $rol)
                            @if ( $usuari->rols_id == $rol->id)
                                <option for="rol" selected value="{{ $rol->id }}">{{ $rol->nom }}</option>
                            @else
                                <option for="rol" value="{{ $rol->id }}">{{ $rol->nom }}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach ($rols as $rol)
                            @if ( old('rol') == $rol->id)
                                <option for="rol" selected value="{{ $rol->id }}">{{ $rol->nom }}</option>
                            @else
                                <option for="rol" value="{{ $rol->id }}">{{ $rol->nom }}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="recurs" class="col-4 col-form-label">Recurso</label>
                <div class="col-8">
                <select class="form-control" id="recurs" name="recurs">
                    @if (old('recurs') == null)
                        @foreach ($recursos as $recurso)
                            @if ( $usuari->recursos_id == $recurso->id)
                                <option for="recurs" selected value="{{ $recurso->id }}">{{ $recurso->codi }}</option>
                            @else
                                <option for="recurs" value="{{ $recurso->id }}">{{ $recurso->codi }}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach ($recursos as $recurso)
                            @if ( old('recurs') == $recurso->id)
                                <option for="recurs" selected value="{{ $recurso->id }}">{{ $recurso->codi }}</option>
                            @else
                                <option for="recurs" value="{{ $recurso->id }}">{{ $recurso->codi }}</option>
                            @endif
                        @endforeach
                    @endif
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
