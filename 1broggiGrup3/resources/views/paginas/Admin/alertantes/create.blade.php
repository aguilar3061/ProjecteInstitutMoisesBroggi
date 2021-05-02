
@extends('index')

@section('cuerpo')

@include('partials.mensajes')

  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%; border-color: #0edcd8 !important;">
    <div class="card-header" style="color: #2780e3; font-weight: bold; font-size:20px;">Alertante</div>
    <div class="card-body">
        <form action="{{ action([App\Http\Controllers\AlertantController::class, 'store']) }}" method="POST">
            @csrf
            <fieldset>

              <div class="form-group row">
                <label for="telefono" class="col-4 col-form-label" style="color: #d53677; font-weight: bold;">Telefono</label>
                <div class="col-8">
                <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono"
                value="{{ old('telefono') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="nom" class="col-4 col-form-label" style="color: #d53677; font-weight: bold;">Nombre</label>
                <div class="col-8">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nombre"
                value="{{ old('nom') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="apellidos" class="col-4 col-form-label" style="color: #d53677; font-weight: bold;">Apellidos</label>
                <div class="col-8">
                <input type="text" class="form-control" id="apellidos"  name="apellidos" placeholder="Apellidos"
                value="{{ old('apellidos') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="direccion" class="col-4 col-form-label" style="color: #d53677; font-weight: bold;">Dirección</label>
                <div class="col-8">
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección"
                value="{{ old('direccion') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="municipi" class="col-4 col-form-label" style="color: #d53677; font-weight: bold;">Municipio</label>
                <div class="col-8">
                <select class="form-control" id="municipi" name="municipi">
                    @foreach ($municipis as $municipi)
                        @if ( old('municipi') == $municipi->id)
                            <option for="municipi" selected value="{{ $municipi->id }}">{{ $municipi->nom }}</option>
                        @else
                            <option for="municipi" value="{{ $municipi->id }}">{{ $municipi->nom }}</option>
                        @endif
                    @endforeach
                </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="tipusAlertant" class="col-4 col-form-label" style="color: #d53677; font-weight: bold;">Tipo alertante</label>
                <div class="col-8">
                <select class="form-control" id="tipusAlertant" name="tipusAlertant">
                    @foreach ($tipusAlertants as $tipusAlertant)
                    @if ( old('tipusAlertant') == $tipusAlertant->id)
                            <option for="tipusAlertant" selected value="{{ $tipusAlertant->id }}">{{ $tipusAlertant->tipus }}</option>
                        @else
                            <option for="tipusAlertant" value="{{ $tipusAlertant->id }}">{{ $tipusAlertant->tipus }}</option>
                        @endif
                    @endforeach
                </select>
                </div>
              </div>

              <div class="text-right">

                <a href={{ url('alertant') }} class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Aceptar</button>
              </div>
            </fieldset>
          </form>
    </div>
  </div>
@endsection
