@extends('index')

@section('cuerpo')

@include('partials.mensajes')

  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Crear recurso</div>
    <div class="card-body">
        <form action="{{ action([App\Http\Controllers\RecursController::class, 'store']) }}" method="POST">
            @csrf
            <fieldset>

              <div class="form-group row">
                <label for="codiID" class="col-4 col-form-label">Numero de identificación</label>
                <div class="col-8">
                <input type="text" class="form-control" id="codiID" name="codiID" placeholder="Numero de identificación"
                  value="{{ old('codiID') }}">
                </div>
              </div>

              <div class="form-group row">
                <label for="tipusRecurs" class="col-4 col-form-label">Recurso</label>
                <div class="col-8">
                <select class="form-control" id="tipusRecurs" name="tipusRecurs">
                    @foreach ($tipoRecursos as $Trecurs)
                      @if ( old('tipusRecurs') == $Trecurs->id)
                        <option for="tipusRecurs" selected value="{{ $Trecurs->id }}">{{ $Trecurs->tipus }}</option>
                      @else
                        <option for="tipusRecurs" value="{{ $Trecurs->id }}">{{ $Trecurs->tipus }}</option>
                      @endif
                    @endforeach
                </select>
                </div>
              </div>
              
              <div class="text-right">
                <a href={{ url('recurs') }} class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Aceptar</button>
              </div>
            </fieldset>
          </form>
    </div>
  </div>
@endsection
