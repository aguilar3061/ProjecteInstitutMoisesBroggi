
@extends('index')

@section('cuerpo')

@include('partials.mensajes')

  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%; border-color: #0edcd8 !important;">
    <div class="card-header" style="color: #2780e3; font-weight: bold; font-size:20px;">Usuario</div>
    <div class="card-body">
        <form action="{{ action([App\Http\Controllers\UsuariController::class, 'store']) }}" method="POST">
            @csrf
            <fieldset>

              <div class="form-group row">
                <label for="nombreUsuario" class="col-4 col-form-label" style="color: #d53677; font-weight: bold;">Nombre Usuario</label>
                <div class="col-8">
                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre usuario"
                value="{{ old('nombreUsuario') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="contrasena" class="col-4 col-form-label" style="color: #d53677; font-weight: bold;">Contraseña</label>
                <div class="col-8">
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="contraseña"
                value="{{ old('contrasena') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="correo" class="col-4 col-form-label" style="color: #d53677; font-weight: bold;">Correo</label>
                <div class="col-8">
                <input type="email" class="form-control" id="correo"  name="correo" placeholder="Correo"
                value="{{ old('correo') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="nombre" class="col-4 col-form-label" style="color: #d53677; font-weight: bold;">Nombre</label>
                <div class="col-8">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                value="{{ old('nombre') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="apellidos" class="col-4 col-form-label" style="color: #d53677; font-weight: bold;">Apellidos</label>
                <div class="col-8">
                <input type="text" class="form-control" id="apellidos" name="apellidos"  placeholder="Apellidos"
                value="{{ old('apellidos') }}">
                </div>
              </div>


              <div class="form-group row">
                <label for="rol" class="col-4 col-form-label" style="color: #d53677; font-weight: bold;">Rol</label>
                <div class="col-8">
                <select class="form-control" id="rol" name="rol" onchange="mostrarOnoRecursos()" >
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

              <div class="form-group row" >
                <label id="labelRecurso" for="recurs" class="col-4 col-form-label" style="display:none" style="color: #d53677; font-weight: bold;">Recurso</label>
                <div class="col-8">
                  <select class="form-control" id="recurs" name="recurs"  style="display:none">
                      @foreach ($recursos as $recurso)
                      @if ( old('recurs') == $recurso->id)
                              <option for="recurs" value="{{ $recurso->id }}">{{ $recurso->codi }}</option>
                          @else
                              <option for="recurs" value="{{ $recurso->id }}">{{ $recurso->codi }}</option>
                          @endif
                      @endforeach
                        <option id="sinAsignar"for="recurs" value="" style="display:none" selected>Sin assignar</option>

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



<script>
  function mostrarOnoRecursos() {

    if(document.getElementById("rol").value != 3){

      document.getElementById("labelRecurso").style.display='none';
      document.getElementById("sinAsignar").selected = true;
      document.getElementById("sinAsignar").style.display='block'
      document.getElementById("recurs").style.display='none';

    }else{

      document.getElementById("recurs").style.display='block';
      document.getElementById("sinAsignar").selected = false;
      document.getElementById("sinAsignar").style.display='none'
      document.getElementById("labelRecurso").style.display='block';

    }


  }
</script>
