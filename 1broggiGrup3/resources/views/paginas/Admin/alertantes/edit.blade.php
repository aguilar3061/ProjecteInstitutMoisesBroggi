
@extends('index')

@section('cuerpo')

@include('partials.mensajes')

  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Alertante</div>
    <div class="card-body">
        <form action="{{ action([App\Http\Controllers\AlertantController::class, 'update'], ['alertant' => $alertant->id ]) }}" method="POST">
            @csrf
            @method('PUT')
            <fieldset>

              <div class="form-group row">
                <label for="telefono" class="col-4 col-form-label">Telefono</label>
                <div class="col-8">
                <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" @if (old('telefono') ==null)
                    value="{{ $alertant->telefon }}"
                @else
                    value="{{ old('telefono') }}"
                @endif
                >
                </div>
              </div>

              <div class="form-group row">
                <label for="nom" class="col-4 col-form-label">Nombre</label>
                <div class="col-8">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nombre" @if (old('nom') ==null)
                    value="{{ $alertant->nom }}"
                @else
                    value="{{ old('nom') }}"
                @endif
                >
                </div>
              </div>

              <div class="form-group row">
                <label for="apellidos" class="col-4 col-form-label">Apellidos</label>
                <div class="col-8">
                <input type="text" class="form-control" id="apellidos"  name="apellidos" placeholder="Apellidos" @if (old('apellidos') ==null)
                    value="{{ $alertant->cognoms }}"
                @else
                    value="{{ old('apellidos') }}"
                @endif
                >
                </div>
              </div>

              <div class="form-group row">
                <label for="direccion" class="col-4 col-form-label">Dirección</label>
                <div class="col-8">
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion"  @if (old('direccion') ==null)
                    value="{{ $alertant->adreca }}"
                @else
                    value="{{ old('direccion') }}"
                @endif
                >
                </div>
              </div>
              <div class="form-group row">
                <label for="municipi" class="col-4 col-form-label">Municipio</label>
                <div class="col-8">
                <select class="form-control" id="municipi" name="municipi">
                    @if (old('municipi') ==null)
                        @foreach ($municipis as $municipi)
                            @if ( $alertant->municipis_id == $municipi->id)
                                <option for="municipi" selected value="{{ $municipi->id }}">{{ $municipi->nom }}</option>
                            @else
                                <option for="municipi" value="{{ $municipi->id }}">{{ $municipi->nom }}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach ($municipis as $municipi)
                            @if ( old('municipi') == $municipi->id)
                                <option for="municipi" selected value="{{ $municipi->id }}">{{ $municipi->nom }}</option>
                            @else
                                <option for="municipi" value="{{ $municipi->id }}">{{ $municipi->nom }}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="tipusAlertant" class="col-4 col-form-label">Tipo alertante</label>
                <div class="col-8">
                <select class="form-control" id="tipusAlertant" name="tipusAlertant">
                    @if (old('tipusAlertant') == null)
                        @foreach ($tipusAlertants as $tipusAlertant)
                            @if ( $alertant->tipus_alertants_id == $tipusAlertant->id)
                                <option for="tipusAlertant" selected value="{{ $tipusAlertant->id }}">{{ $tipusAlertant->tipus }}</option>
                            @else
                                <option for="tipusAlertant" value="{{ $tipusAlertant->id }}">{{ $tipusAlertant->tipus }}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach ($tipusAlertants as $tipusAlertant)
                            @if ( old('tipusAlertant') == $tipusAlertant->id)
                                <option for="tipusAlertant" selected value="{{ $tipusAlertant->id }}">{{ $tipusAlertant->tipus }}</option>
                            @else
                                <option for="tipusAlertant" value="{{ $tipusAlertant->id }}">{{ $tipusAlertant->tipus }}</option>
                            @endif
                        @endforeach
                    @endif
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
